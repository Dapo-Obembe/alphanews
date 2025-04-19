const path = require("path");
const fs = require("fs");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const WebpackAssetsManifest = require("webpack-assets-manifest");
const SVGSpritemapPlugin = require("svg-spritemap-webpack-plugin");

// Paths
const jsPagesPath = path.resolve(__dirname, "assets/js/pages");
const scssPagesPath = path.resolve(__dirname, "assets/scss/pages");
const acfBlocksPath = path.resolve(__dirname, "acf-blocks");
const iconsPath = path.resolve(__dirname, "assets/icons");

// Function to generate JS entries for a directory
const generateJsEntries = (directory) => {
  if (!fs.existsSync(directory)) return {};

  const files = fs.readdirSync(directory).filter((file) => file.endsWith(".js"));

  const entries = {};
  files.forEach((file) => {
    const fileName = path.parse(file).name;
    entries[`js/pages/${fileName}`] = path.join(directory, file);
  });

  return entries;
};

// Function to generate SCSS entries for a directory
const generateScssEntries = (directory) => {
  if (!fs.existsSync(directory)) return {};

  const files = fs.readdirSync(directory).filter((file) => file.endsWith(".scss"));

  const entries = {};
  files.forEach((file) => {
    const fileName = path.parse(file).name;
    entries[`css/${fileName}`] = path.join(directory, file);
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

// Main entries for JS and CSS
const mainEntries = {
  "js/main": "./assets/js/main.js",
  "css/main": "./assets/scss/main.scss",
  "js/admin": "./assets/js/admin.js",
  "css/admin": "./assets/scss/admin.scss",
};

// Collect all SCSS-only entries (no corresponding JS file)
const cssOnlyEntries = Object.keys({
  ...pageScssEntries,
  ...acfBlockEntries,
}).filter((key) => key.startsWith("css/") || key.includes("/style"));

module.exports = {
  entry: {
    ...mainEntries,
    ...pageJsEntries,
    ...pageScssEntries,
    ...acfBlockEntries,
  },
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "[name].js",
    publicPath: "/dist/",
  },
  module: {
    rules: [
      {
        test: /\.scss$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader", "postcss-loader", "sass-loader"],
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
        exclude: /assets\/icons\//,
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
      filename: ({ chunk }) => `${chunk.name}.css`,
    }),
    new SVGSpritemapPlugin("assets/icons/**/*.svg", {
      output: {
        filename: "sprite.svg",
        svg4everybody: true,
      },
      sprite: {
        prefix: "",
      },
    }),
    new WebpackAssetsManifest({
      output: "manifest.json",
      publicPath: "/dist/",
    }),
    // Custom plugin to remove JS files for CSS-only entries
    {
      apply: (compiler) => {
        compiler.hooks.emit.tap("RemoveJsForCssOnlyPlugin", (compilation) => {
          const cssOnly = new Set(cssOnlyEntries); // existing collected entries
          cssOnly.add("css/main");                 // manually add main
          cssOnly.add("css/admin");                // manually add admin

          for (const name of cssOnly) {
            delete compilation.assets[`${name}.js`];
            delete compilation.assets[`${name}.js.map`];
            delete compilation.assets[`${name}.js.LICENSE.txt`];
          }
        });
      },
    },

  ],
  optimization: {
    minimize: true,
    minimizer: [new TerserPlugin(), new CssMinimizerPlugin()],
    splitChunks: false,
    runtimeChunk: false,
  },
  devtool: "source-map",
  mode: "production",
};
