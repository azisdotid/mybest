const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 const tailwindcss = require('tailwindcss')
mix.js('resources/js/app.js', 'public/js','public/assets/src/js/app.js', 'public/assets/dist_t/js')
.sass('public/assets/src/sass/app.scss', 'public/assets/dist/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);
    
if (mix.inProduction()) {
    mix.version();
}
mix.js('public/assets/src/js/app.js', 'public/assets/dist_t/js')
    .sass('public/assets/src/sass/app.scss', 'public/assets/dist_t/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .autoload({
        'jquery': ['$', 'window.jQuery', 'jQuery']
    })
    .copyDirectory('public/assets/src/json', 'public/assets/dist_t/json')
    .copyDirectory('public/assets/src/fonts', 'public/assets/dist_t/fonts')
    .copyDirectory('public/assets/src/images', 'public/assets/dist_t/images')
    .copyDirectory('node_modules/slick-carousel/slick/ajax-loader.gif', 'public/assets/dist_t/css')
    .copyDirectory('node_modules/summernote/dist/font/summernote.woff', 'public/assets/dist_t/fonts/summernote')
    .browserSync({
        proxy: 'midone.test',
        files: ['src/**/*.*']
    });
