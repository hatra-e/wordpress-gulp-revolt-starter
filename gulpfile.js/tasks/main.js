//
// GULP.MAIN
//



var gulp    = require('gulp'),
    plugins = require('gulp-load-plugins')({ camelize: true });

// Default
gulp.task('default', function(callback) {
    plugins.sequence(
        // Remove all files from build folder, to start with clean slate
        'clean:files',
        // Copy all files from src to build and compile Sass
        ['files', 'sass'],
        // Start BrowserSync
        'browsersync',
        // Start watching for file changes
        ['watch:files', 'watch:sass'],
        callback
    );
});