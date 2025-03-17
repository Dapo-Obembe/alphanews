const path = require("path");
const fs = require("fs");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const WebpackAssetsManifest = require("webpack-assets-manifest");

// Paths
const jsPagesPath = path.resolve(__dirname, "assets/js/pages");
const scssPagesPath = path.resolve(__dirname, "assets/scss/pages");
const acfBlocksPath = path.resolve(__dirname, "acf-blocks");

// Function to generate JS entries for a directory
const generateJsEntries = (directory) => {
  if (!fs.existsSync(directory)) return {};

  const files = fs
    .readdirSync(directory)
    .filter((file) => file.endsWith(".js"));

  const entries = {};
  files.forEach((file) => {
    const fileName = path.parse(file).name;
    entries[`pages/${fileName}`] = path.join(directory, file); // Ensure only JS in 'js' folder
  });

  return entries;
};

// Function to generate SCSS entries for a directory
const generateScssEntries = (directory) => {
  if (!fs.existsSync(directory)) return {};

  const files = fs
    .readdirSync(directory)
    .filter((file) => file.endsWith(".scss"));

  const entries = {};
  files.forEach((file) => {
    const fileName = path.parse(file).name;
    entries[`css/${fileName}`] = path.join(directory, file); // Ensure only SCSS in 'css' folder
  });

  return entries;
};

// SCSS and JS entries
const pageJsEntries = generateJsEntries(jsPagesPath);
const pageScssEntries = generateScssEntries(scssPagesPath);

// ACF Block SCSS and JS entries
const acfBlockEntries = fs
  .readdirSync(acfBlocksPath)
  .filter((block) => fs.statSync(path.join(acfBlocksPath, block)).isDirectory())
  .reduce((entries, block) => {
    const blockPath = path.join(acfBlocksPath, block);
    const stylePath = path.join(blockPath, "style.scss");
    const scriptPath = path.join(blockPath, "script.js");

    if (fs.existsSync(stylePath)) {
      entries[`acf-blocks/${block}/style`] = stylePath;
    }
    if (fs.existsSync(scriptPath)) {
      entries[`acf-blocks/${block}/script`] = scriptPath;
    }

    return entries;
  }, {});

module.exports = {
  entry: {
    main: ["./assets/scss/main.scss", "./assets/js/main.js"], // Main JS and SCSS entry points
    admin: ["./assets/scss/admin.scss", "./assets/js/admin.js"], // Admin JS and SCSS entry points
    ...pageJsEntries, // Add only JS files
    ...pageScssEntries, // Add only SCSS files
    ...acfBlockEntries, // ACF block JS and SCSS
  },
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "js/[name].js", // JS files go into dist/js/
    publicPath: "/dist/",
  },
  module: {
    rules: [
      {
        test: /\.scss$/i,
        use: [
          MiniCssExtractPlugin.loader, // Extract SCSS to CSS
          "css-loader",
          "postcss-loader",
          "sass-loader",
        ],
      },
      {
        test: /\.js$/i,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.(png|jpe?g|gif|svg)$/i,
        type: "asset/resource",
        generator: {
          filename: "images/[name][ext]",
        },
      },
      {
        test: /\.(woff(2)?|eot|ttf|otf)$/i,
        type: "asset/resource",
        generator: {
          filename: "fonts/[name][ext]",
        },
      },
    ],
  },
  plugins: [
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: (pathData) => {
        // Ensure CSS goes to dist/css/ folder
        if (pathData.chunk.name === "main") {
          return "css/main.css";
        }
        if (pathData.chunk.name === "admin") {
          return "css/admin.css";
        }

        // Handle page-specific CSS
        if (pathData.chunk.name.startsWith("pages/")) {
          return `css/${pathData.chunk.name.replace("pages/", "")}.css`; // Proper path for pages CSS
        }

        return "css/[name].css"; // Default case for other CSS files
      },
    }),
    new WebpackAssetsManifest({
      output: "manifest.json",
      publicPath: "/dist/",
    }),
  ],
  optimization: {
    minimize: true,
    minimizer: [new TerserPlugin(), new CssMinimizerPlugin()],
  },
  devtool: "source-map",
  mode: "production",
};
