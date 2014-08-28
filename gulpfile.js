var gulp = require('gulp'),
    concat = require('gulp-concat'),
    minifyCSS = require('gulp-minify-css'),
    coffee = require('gulp-coffee'),
    gutil = require('gulp-util');

gulp.task('stylesheets', function () {
    gulp.src([
        './public/src/vendor/bootstrap/dist/css/bootstrap.min.css',
        './public/src/vendor/font-awesome/css/font-awesome.min.css',
        './public/css/project.css'
    ])
    .pipe(concat('all.css'))
    .pipe(minifyCSS({removeEmpty: true, keepSpecialComments: 0}))
    .pipe(gulp.dest('./public/dist/'))
});

gulp.task('coffee', function() {
    gulp.src([
        './public/src/app/*.coffee',
        './public/src/app/*/*.coffee'
    ])
    .pipe(coffee({bare: true}).on('error', gutil.log))
    .pipe(gulp.dest('./public/dist/'))
});

gulp.task('default', ['stylesheets', 'coffee']);