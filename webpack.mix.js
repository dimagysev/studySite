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

/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/

mix.js('resources/js/pinc/src/main.js','public/pinc/js');

/*mix.scripts([
    'public/pinc/js/main.js',
    'public/pinc/js/jquery.prettyPhoto.js',
    'public/pinc/js/jquery.colorbox-min.js',
], 'public/pinc/js/bundle.js');*/
mix.scripts([
    'public/pinc/js/main.js',
    'resources/js/pinc/src/assets/jquery.prettyPhoto.js',
    'resources/js/pinc/src/assets/jquery.colorbox-min.js',
], 'public/pinc/js/bundle.js');
