const mix = require('laravel-mix');

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

mix.styles([
    'resources/css/style.min.css',
    'resources/libs/animate/animate.min.css',
], 'public/css/styles.css').sourceMaps();

mix.scripts([
    'resources/libs/bootstrap/js/popper.min.js',
    'resources/libs/bootstrap/js/bootstrap.min.js',
    'resources/libs/ofi/ofi.min.js',
    'resources/libs/wowjs/wow.min.js',
    'resources/js/scripts.js',
    ], 'public/js/script.js').sourceMaps();
