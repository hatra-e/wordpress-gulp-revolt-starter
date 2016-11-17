// ==== THEME ==== //

var gulp        = require('gulp')
  , plugins     = require('gulp-load-plugins')({ camelize: true })
  , config      = require('../../gulpconfig').theme
;

// Copy PHP source files to the `build` folder
gulp.task('theme-php', function() {
  return gulp.src(config.php.src)
    .pipe(plugins.changed(config.php.dest))
    .pipe(gulp.dest(config.php.dest));
});

// Copy CSS source files to the `build` folder
gulp.task('theme-css', function() {
  return gulp.src(config.css.src)
    .pipe(plugins.changed(config.css.dest))
    .pipe(gulp.dest(config.css.dest));
});

// Copy JS source files to the `build` folder
gulp.task('theme-js', function() {
  return gulp.src(config.js.src)
    .pipe(plugins.changed(config.js.dest))
    .pipe(gulp.dest(config.js.dest));
});

// Copy JS source files to the `build` folder
gulp.task('theme-fonts', function() {
  return gulp.src(config.fonts.src)
    .pipe(plugins.changed(config.fonts.dest))
    .pipe(gulp.dest(config.fonts.dest));
});

// Copy everything under `src/languages` indiscriminately
gulp.task('theme-lang', function() {
  return gulp.src(config.lang.src)
    .pipe(plugins.changed(config.lang.dest))
    .pipe(gulp.dest(config.lang.dest));
});

// Copy misc files
gulp.task('theme-misc', function() {
  return gulp.src(config.misc.src)
    .pipe(plugins.changed(config.misc.dest))
    .pipe(gulp.dest(config.misc.dest));
});

// All the theme tasks in one
gulp.task('theme', ['theme-lang', 'theme-php', 'theme-css', 'theme-js', 'theme-fonts', 'theme-misc']);
