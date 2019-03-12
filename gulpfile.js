var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')

        .styles([
        'all.css',
        'bootstrap.ccs',
        'fontawesome.css'
    ], '.public/css/libs.css')

        .scripts([
            'jquery-3.3.1.js',
            'bootstrap.js'
        ], '.public/js/libs.js')
});
