=== AWC Boilerplate ===
Contributors: Alpha Web Consult
Tested up to: 6.3
Requires at least: 6.3
Requires PHP: 7.4
Version: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Copyright: Alpha Web Consult

A full site editing theme boilerplate for theme developers.

== Guide ==

=== Folder structure ===

- Acf-blocks. Contains custom blocks using ACF PRO
- Acf-json. Contains the ACF fields created in the backend.
- Assets. Icons, JavaScript, SCSS files, and sprite svg.
- Inc. Custom functions, Shortcodes, Filters, Google Reecaptcha, Script, Setup.


functions.php -Used to enqueue styles and add theme support.
index.php     -"Silence is golden"
style.css     -Required to activate the theme.
license.txt   -GPL v2
readme.txt    -Information about the theme.
screenshot.png

=== Tooling ===

You can install the tools by opening your terminal in the themes root folder
and entering the following commands: npm install

1). To start your development and watch for changes, use npm start
Your files will be created in a dist/ folder which are the files you link to.

==== ACF ====

If you use ACF plugin for building custom blocks, follow this guide.
1). Install the ACF PRO plugin and activate it. You will need the PRO version 
to be able to create editable blocks.
2). Check the /acf-blocks folder and follow the structure of the example block.
3). Any fields you create in the admin dashboard will automatically show as 
json file inside the acf-json/ folder.


==== SCSS ====
This theme includes both human-readable SCSS inside the assets/scss and minified in the dist/ folders.
For improved performance, the theme loads the minified CSS on the front and in the editor.

To make changes to the SCSS:
1). Edit the human readable SCSS file (the .scss file in the assets/ folder)
2). For page-specific styling, create them in the assets/scss/pages/ folder and enqueue them from dist/ for the specific page.
3). To style your ACF custom blocks, use the style.scss inside the /acf-blocks folder.

To compare your code against the CSS coding standards, use the command: npm run lint:css

==== PHP ====
1). To add custom functions or edit, look into the inc/ folder.
2). Do not edit the functions.php unless you know what you are doing.
3). To register block styles or variations, look into the inc/ folder.

To compare your code against the PHP coding standards,
use the command: composer standards:check

For PHPStan analysis, use the command: composer analyze

==== JavaScript ====
The scripts are also bundled with gulp. Enqueue the minified versions where necessary.
1). Edit the JS files ending .js not .min.js.
2). To compare your code against the JavasCript coding standards,
use the command: npm run lint:js

== Changelog ==
1.0.0 Initial release

== Licence ==
AWC Boilerplate is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Resources used to build this theme ==

* Q WordPress theme (C) Ari Stathopoulos
License: GNU General Public License v2.0 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

* Full site editing starter theme by Dapo Obembe
https://alphawebconsult.com
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
