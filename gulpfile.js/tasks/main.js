// ==== MAIN ==== //

var gulp        = require('gulp')
  , plugins     = require('gulp-load-plugins')({ camelize: true })
  , runSequence = require('run-sequence')
;

// Default
gulp.task('default', function(callback) {
    runSequence(
      'build'
    , 'browsersync'
    , 'watch'
    , callback);
});

// Auto-sync with server
gulp.task('autosync', function(callback) {
    runSequence(
      'default'
    , 'deploy-watch'
    , callback);
});

// Build a working copy of the theme
gulp.task('build', ['svg', 'images', 'scripts', 'styles', 'theme']);

// Dist task chain: wipe -> build -> clean -> copy -> compress images
// NOTE: this is a resource-intensive task!
gulp.task('dist', ['images-optimize']);
