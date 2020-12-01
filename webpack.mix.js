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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/front/main/jquery-3.3.1.slim.min.js', 'public/js/front/main')
    .js('resources/js/front/main/popper.min.js', 'public/js/front/main')
    .js('resources/js/front/main/bootstrap.min.js', 'public/js/front/main')
    .js('resources/js/front/main/main.js', 'public/js/front/main')

    .js('resources/js/admin/dashboard.js', 'public/js/admin')
    .js('resources/js/admin/permissions/index.js', 'public/js/admin/permissions')
    .js('resources/js/admin/permissions/data-row.js', 'public/js/admin/permissions')

    .js('resources/js/admin/calendarEvent/index.js', 'public/js/admin/calendarEvent')
    .js('resources/js/admin/calendarEvent/data-row.js', 'public/js/admin/calendarEvent')
    .js('resources/js/admin/calendarEvent/modal.js', 'public/js/admin/calendarEvent')
    
    .sass('resources/sass/app.scss', 'public/css');
