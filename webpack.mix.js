let mix = require('laravel-mix');

mix.autoload({
    'quill': ['window.Quill', 'quill']
});
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

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/


mix.sass('resources/assets/admin/sass/app.scss', 'public/admin_panel/css')
    .js('resources/assets/admin/js/app.js', 'public/admin_panel/js')
    .copy('resources/assets/admin/images', 'public/admin_panel/images');
/*.js([
        `${path}jquery/dist/jquery.js`,
        `${path}bootstrap/dist/js/bootstrap.js`
    ], 'public/admin_panel/js/app.js');*/

