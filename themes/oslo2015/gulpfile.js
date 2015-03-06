var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');

gulp.task('scss', function() {
  gulp.src('static/css/scss/style.scss')
    .pipe(sass({
      outputStyle: 'compressed',
      errLogToConsole: true,
      error: function(err) {
        console.log(err);
      }
    }))
    .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
    .pipe(gulp.dest('static/css'));
});

gulp.task('default', ['scss']);
