gulp = require('gulp')
minifyCSS = require('gulp-minify-css')
$ = require('gulp-load-plugins')()

gulp.task 'stylesheets', ->
  gulp.src [
    './public/src/vendor/bootstrap/dist/css/bootstrap.min.css',
    './public/src/vendor/font-awesome/css/font-awesome.min.css',
    './public/css/project.css'
  ]
  .pipe $.concat('all.css')
  .pipe minifyCSS({removeEmpty: true, keepSpecialComments: 0})
  .pipe gulp.dest('./public/dist/')

gulp.task 'coffee', ->
  gulp.src([
    './public/src/app/*.coffee',
    './public/src/app/*/*.coffee'
  ])
  .pipe($.coffee(bare: true))
  .pipe(gulp.dest(out + '/js/'))


gulp.task 'default', ['stylesheets', 'coffee']
