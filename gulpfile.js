var elixir = require('laravel-elixir');

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify');

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
        'bootstrap.css',
        'fontawesome.css'
    ], './public/css/libs.css')

        .scripts([
            'jquery-3.3.1.js',
            'bootstrap.js'
        ], './public/js/libs.js')


});

gulp.task('icons', function() {
    return gulp.src('node_modules/@fontawesome/fontawesome-free/webfonts/*')
        .pipe(gulp.dest(dist+'/assets/webfonts/'));
});
