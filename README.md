# SwiftPress - Hybrid WordPress Boilerplate

As a WordPress developer, do you desire a fast WordPress site for your clients? Then SwiftPress Hybrid WordPress Boilerplate is for you. This lightweight, performance-focused WordPress boilerplate provides a solid foundation for custom WordPress theme development. Styked with SCSS and bundled with webpack.

## Who is SwiftPress Boilerplate for?

For WordPress developer who love fast website and want to be in control of their websites perform.

## Features

- 🎨 Webpack for asset bundling
- 🧩 Advanced Custom Fields (ACF) or Secure Custom Fields (SCF) support and integration
- 🔍 SEO-friendly structure
- 🔒 Security best practices
- ⚡ Performance optimized
- 💻 Developer-friendly architecture
- 🧩 Simple and straightforward build process

## Requirements

- WordPress 5.8+
- PHP 7.4+
- Node.js 14+
- npm or yarn
- ACF or SCF plugin
- SCSS

## Getting Started

### Installation

1. Clone the repository to your WordPress themes directory:

   ```bash
   cd wp-content/themes/
   git clone https://github.com/Dapo-Obembe/swiftpress.git your-theme-name
   cd your-theme-name
   ```

2. Install dependencies:

   ```bash
   npm install
   ```

3. Update `style.css` with your theme information:

   ```css
   /*
   Theme Name: Your Theme Name
   Theme URI: https://yourwebsite.com
   Author: Your Name
   Author URI: https://yourwebsite.com
   Description: Your theme description
   Version: 1.0.0
   License: GNU General Public License v2 or later
   License URI: http://www.gnu.org/licenses/gpl-2.0.html
   Text Domain: your-theme-name
   */
   ```

4. Ensure Advanced Custom Fields or SCF is installed and activated.

5. Activate the theme in the WordPress admin panel.

## Development Workflow

### Development Mode

Start the development environment with:

```bash
npm run dev
```

This will:

- Compile TailwindCSS with all classes available for development
- Watch for changes in your PHP, JS, and CSS files
- Watch for your svg icons at src/icons/ and bundle to dist/icons/sprite.svg

### Production Build

Create a production-ready build with:

```bash
npm run build
```

This will:

- Minify and optimize all assets
- Purge unused TailwindCSS classes
- Generate production CSS file in the dist/

## Theme Structure

```
your-theme-name/
|-- acf-blocks/             # Custom acf blocks you need (See the Note below this section)
|-- acf-json/               # Your ACF data stored here in JSON immediately you create them in the backend
├── dist/                   # Compiled assets (auto-generated)
│   ├── css/
│   ├── js/                 # (pending)
|   |-- icons/
├── inc/                    # PHP includes
│   ├── partials/           # Reusable functions for items like buttons, img, etc
│   ├── custom-functions/   # Custom functions that act independently of the theme templates
│   ├── google-recaptcha/   # Google recaptcha setup
│   ├── head-and-footer-codes/ # Adds codes/tags to the theme head
│   ├── post-types/         # Register all your post types
│   ├── shortcodes/         # Shortcodes used in the theme
│   ├── filters/            # All filtering actions
│   ├── setup/              # Theme setup files
│   └── template-tags/      # Template tags
├── assets/
│   ├── scss/               # SCSS source files
│   ├── js/                 # JavaScript source files
│   └── icons/              # SVG icons
│   └── fonts/              # Fonts
│   └── sprite.svg          # Sprite for your svg icons
├── template/               # Template partials for modularization
│   ├── components/         # Component template parts
│   └── frontpage/          # Files for the frontpage
├── functions.php           # Theme functions
├── index.php               # Main template file/Blog Archive
├── front-page.php          # Home page (if you set static homepage)
├── header.php              # Header template
├── footer.php              # Footer template
├── sidebar.php             # Sidebar template
├── page.php                # Page template
├── single.php              # Single post template
├── archive.php             # Archive template
├── search.php              # Search template
├── 404.php                 # 404 template
├── style.css               # Theme metadata
├── webpack.config.js       # Webpack configuration
├── package.json            # NPM dependencies and scripts
├── theme.json              # For your block editor area
└── README.md               # This file
```

### Advanced Custom Fields Integration

This boilerplate is built with ACF support in mind and includes:

- ACF JSON for version control of field groups
- Helper functions for ACF fields in the `inc/custom-functions/` directory
- Template parts that integrate with ACF flexible content fields
- Examples of ACF field usage in various components

#### ACF Field Setup

ACF Fields you create in the backend are auto-saved in the acf-json/.
Check the inc/custom-functions for the acf setup function.

#### ACF Usage Example

Check the acf-blocks/example/ for how it is used.
NOTE: WordPress also has SCF (forked from ACF). It works for it too.

### WordPress Hooks

The theme uses WordPress hooks for extensibility. Check files in `inc/filters/` and `inc/setup/` for examples of how to use action and filter hooks.

## Best Practices To Follow

### PHP

- Follow WordPress PHP coding standards
- Use namespaced functions when possible
- Validate and sanitize user input
- Use WordPress' native functions for database queries

### Advanced Custom Fields

- Store field groups in JSON for version control
- Use ACF flexible content for modular page building
- Create reusable field groups with the clone field
- Limit field visibility with conditional logic

### JavaScript

- Use modern ES6+ syntax
- Split code into modular components
- Use event delegation for better performance
- Avoid jQuery when possible (use vanilla JS)

## Performance Optimization

- TailwindCSS is purged of unused classes in production
- CSS and JavaScript are minified for production
- Proper enqueuing of scripts and styles
- Optimized asset loading
- Efficient ACF field usage and queries

## Security Considerations

- All user input is sanitized
- Admin-ajax.php endpoints are nonce-protected
- Template files are protected against direct access
- No sensitive information in public-facing files
- Google reCAPTCHA integration for forms

## Troubleshooting

### Common Issues

- **CSS not updating**: Clear browser cache or run `npm run build` again
- **PHP errors**: Check the WordPress debug log
- **Node errors**: Delete `node_modules` and run `npm install` again
- **ACF fields not showing**: Check if ACF Pro is activated and fields are properly registered

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the GPL v2 or later.

## Credits

- Built by [Dapo Obembe/Alpha Web Consult]: https://www.dapoobembe.com
- WordPress: https://wordpress.org
- Advanced Custom Fields: https://www.advancedcustomfields.com

## Contact

For support or inquiries, please contact [obembedapo@gmail.com].
# swiftpress
