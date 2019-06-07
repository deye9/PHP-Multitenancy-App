var mix = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.stylus('front_end/theme/default.styl', 'front_end/theme');
mix.stylus('front_end/components/circle/VCircle.styl', 'front_end/components/circle');


// Copy the needed javascript files to the public/js folder
mix.copy([
    'node_modules/jquery/dist/jquery.min.js',
    'vendor/twbs/bootstrap/dist/js/bootstrap.min.js'
], 'public/js');

// Copy the needed css files to the public/css folder
mix.copy([
    'vendor/twbs/bootstrap/dist/css/bootstrap.min.css', 'vendor/components/font-awesome/css/fontawesome.min.css'
], 'public/css');

// Copy the needed Js file for the auth front end
mix.js('front_end/main.js', 'public/js');

mix.copyDirectory('resources/assets/js', 'public/js');
mix.copyDirectory('resources/assets/css', 'public/css');
mix.copyDirectory('node_modules/@fortawesome', 'front_end/components/@fortawesome');

if (mix.inProduction()) {
    mix.version();
    mix.disableNotifications();
} else {
    mix.browserSync({
        host: 'erp.dev',
        proxy: 'https://erp.dev',
        port: 1981,
        https: {
            key:
                '/Users/andelatsm/.valet/Certificates/erp.dev.key',
            cert:
                '/Users/andelatsm/.valet/Certificates/erp.dev.crt'
        },
        open: 'external',
        notify: true,
        reload: true,
        reloadOnRestart: true,
        proxyReq: [
            function(proxyReq) {
                proxyReq.setHeader('Access-Control-Allow-Origin', '*');
            }
        ]
    });
}
