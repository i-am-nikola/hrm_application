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

mix.js('resources/js/app.js', 'public/assets/js')
    .sass('resources/sass/app.scss', 'public/assets/css')
    .styles([
        'public/adminlte/plugins/fontawesome-free/css/all.min.css',
        'public/adminlte/dist/css/adminlte.min.css',
    ], 'public/assets/css/vendor.css')
    .scripts([
        'public/adminlte/plugins/jquery/jquery.min.js',
        'public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'public/adminlte/dist/js/adminlte.js',
        'public/adminlte/plugins/chart.js/Chart.min.js',
        'public/adminlte/dist/js/demo.js',
        'public/adminlte/dist/js/pages/dashboard3.js',
    ], 'public/assets/js/vendor.js')
    .copyDirectory('public/adminlte/dist/img', 'public/assets/img')
    .version()
