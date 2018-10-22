const mix = require('laravel-mix');

require('laravel-mix-tailwind');
require('laravel-mix-purgecss');


mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/VueApp.js', 'public/js')
   .sass('resources/sass/app.sass', 'public/css')
   .tailwind();


if (mix.inProduction()) {
    mix.purgeCss().version();
}
