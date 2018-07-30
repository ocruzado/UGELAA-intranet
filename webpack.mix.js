const mix = require('laravel-mix');
//
// mix.autoload({
//     jquery: ['$', 'window.jQuery', 'jQuery']
//     // moment: 'moment'
// });

mix
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/table.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/table.scss', 'public/css')
    .webpackConfig({
        resolve: {
            modules: [
                'node_modules'
            ],
            alias: {
                jquery: 'jquery/src/jquery'
            }
        }
    }).sourceMaps();