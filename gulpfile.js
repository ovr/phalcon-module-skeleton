var gulp = require('gulp'),
    concat = require('gulp-concat'),
    minifyCSS = require('gulp-minify-css');

gulp.task('stylesheets', function () {
    gulp.src([
        './public/src/vendor/bootstrap/dist/css/bootstrap.min.css',
        './public/css/project.css'
    ])
    .pipe(concat('all.css'))
    .pipe(minifyCSS({removeEmpty: true, keepSpecialComments: 0}))
    .pipe(gulp.dest('./public/dist/'))
});

gulp.task('default', ['stylesheets']);