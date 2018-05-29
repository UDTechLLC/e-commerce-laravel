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
  .js('resources/assets/admin/js/app.js', 'public/admin_panel/js')
  .copy('resources/assets/admin/images', 'public/admin_panel/images')
  .copy('resources/assets/admin/fonts', 'public/admin_panel/fonts')

  .js('resources/assets/js/app.js', 'public/web/js').version()
  .copy('resources/assets/js/chat.js', 'public/web/js')
  .sass('resources/assets/sass/app.scss', 'public/web/css').version()
  .sass('resources/assets/web/sass/base.sass', 'public/web/css').version()
  .copy('resources/assets/web/css/', 'public/web/css')
  .copy('resources/assets/web/images', 'public/web/images')
  .copy('resources/assets/web/fonts', 'public/web/fonts')
  .copy('resources/assets/web/js', 'public/web/js')
  .copy('resources/assets/web/carouselengine', 'public/web/carouselengine')
  .copy('resources/assets/web/slick', 'public/web/slick')
  .babel('public/web/css/base.css', 'public/web/css/base.css')
  .babel('public/web/slick/slick-theme.css', 'public/web/slick/slick-theme.css')
  .babel('public/web/js/modal.js', 'public/web/js/modal.js')
  .babel('public/web/js/script.js', 'public/web/js/script.js');

/*.js([
 `${path}jquery/dist/jquery.js`,
 `${path}bootstrap/dist/js/bootstrap.js`
 ], 'public/admin_panel/js/app.js');*/

