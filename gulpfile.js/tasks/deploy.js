// ==== DEPLOY ==== //

var gulp       = require('gulp')
  , ftp        = require('vinyl-ftp')
  , sftp       = require('gulp-sftp')
  , plugins    = require('gulp-load-plugins')({ camelize: true })
  , config     = require('../../gulpconfig').deploy
;

// Deploy via FTP
gulp.task('deploy-ftp', function () {
  var conn  = ftp.create( config.ftp.deploy );
  var globs = [ config.dist + '**/*' ];

  return gulp.src( globs, { base: config.dist, buffer: false } )
    .pipe( conn.newer( config.ftp.remotePath ) ) // only upload newer files
    .pipe( conn.dest( config.ftp.remotePath ) );
});

// Deploy via SFTP
gulp.task('deploy-sftp', function () {
  return gulp.src(config.dist+'**/*')
    .pipe(sftp(config.sftp.deploy));
});

// Watch for file changes and deploy
gulp.task('deploy-watch', function() {
  gulp.watch(config.watchFiles, ['deploy-'+config.protocol])
});

// Easily configure the protocol from `/gulpconfig.js`
gulp.task('deploy', ['deploy-'+config.protocol]);