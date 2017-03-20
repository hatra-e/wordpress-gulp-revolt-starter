// ==== SVG ==== //

var gulp        = require('gulp')
  , svgSprite   = require('gulp-svg-sprite')
  , plugins     = require('gulp-load-plugins')({ camelize: true })
  , config      = require('../../gulpconfig').svg
;

gulp.task('svg', function() {
    gulp.src(config.src)
      .pipe(svgSprite(config.svgSprite))
      .pipe(gulp.dest(config.dest));
});