let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/auth.js', 'public/js')
    .sass('resources/assets/sass/auth.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')

    // Markdown editor for the backend
    .copy('node_modules/trumbowyg/dist/ui/trumbowyg.css', 'public/css')
    .copy('node_modules/trumbowyg/dist/trumbowyg.js', 'public/js')
    .copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/fonts/trumbowyg');
