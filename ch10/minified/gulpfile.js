var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var minifyjs = require('gulp-uglify');
var concat = require('gulp-concat');

gulp.task('minify-css', function() {
  gulp.src('css/*.css')
    .pipe(minifycss())
    .pipe(gulp.dest('dist'));
});

gulp.task('minify-js', function() {
  gulp.src('js/*.js')
    .pipe(minifyjs())
    .pipe(gulp.dest('dist'));
});

gulp.task('concat-js', function() {
  gulp.src('dist/*.js')
    .pipe(concat('scripts.min.js'))
    .pipe(gulp.dest('dist'));
});

gulp.task('watch', function() {
  // Watch .css files
  gulp.watch('css/*.css', ['minify-css']);
  // Watch .js files
  gulp.watch('js/*.js', ['minify-js', 'concat-js']);
});

gulp.task('default', ['minify-css', 'minify-js', 'concat-js', 'watch']);