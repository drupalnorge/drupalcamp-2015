var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var livereload = require('gulp-livereload');

gulp.task('scss', function() {
  gulp.src('scss/style.scss')
  .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed',
      errLogToConsole: true,
      error: function(err) {
        console.log(err);
      }
    }))
    .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
    //.pipe(sourcemaps.write())
    .pipe(gulp.dest('build/css'));
});

// Watch
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch(['build/**/*']).on('change', function() {
    var args = arguments;
    setTimeout(function() {
      livereload.changed.apply(this, args);
    }, 200);
  });
  // Watch .scss files
  gulp.watch(['scss/**/*.scss'], ['default']);

});

gulp.task('default', ['scss']);
