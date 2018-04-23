let mix = require('laravel-mix');

mix.autoload({
    'quill': ['window.Quill', 'quill']
});

mix.options({
    processCssUrls: false,
    imgLoaderOptions: {
        enabled: false
    }
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
    .js('resources/assets/admin/js/app.js', 'public/admin_panel/js').version()
    .copy('resources/assets/admin/images', 'public/admin_panel/images')
    .copy('resources/assets/admin/fonts', 'public/admin_panel/fonts')

    .js('resources/assets/js/app.js', 'public/web/js').version()
    .copy('resources/assets/js/chat.js', 'public/web/js')
    //.sass('resources/assets/sass/app.scss', 'public/web/css').version()
  //  .sass('resources/assets/web/sass/base.sass', 'public/web/css').version()
    .copy('resources/assets/web/css/', 'public/web/css')

    .copy('resources/assets/web/images', 'public/web/images')
    .copy('resources/assets/web/fonts', 'public/web/fonts')
    .copy('resources/assets/web/js', 'public/web/js')
    .copy('resources/assets/web/carouselengine', 'public/web/carouselengine')
    .copy('resources/assets/web/slick', 'public/web/slick')
    .minify('public/web/css/base.css').version()
    .minify('public/web/slick/slick.css').version()
    .minify('public/web/slick/slick-theme.css').version()
    .minify('public/web/js/modal.js').version()
    .js('resources/assets/web/js/flipdown.js', 'public/web/js/flipdown.min.js').version()
    .js('resources/assets/web/js/script.js', 'public/web/js/script.min.js').version();
/*.js([
        `${path}jquery/dist/jquery.js`,
        `${path}bootstrap/dist/js/bootstrap.js`
    ], 'public/admin_panel/js/app.js');*/

