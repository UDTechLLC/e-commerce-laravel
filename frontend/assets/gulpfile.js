var gulp 			= require( 'gulp' ),
    browserSync    	= require('browser-sync'),
    autoprefixer    = require('gulp-autoprefixer'),
 	sass 			= require( 'gulp-sass' );



gulp.task('browser-sync', function() {
    browserSync({
        port: 5000,
        server: {
            baseDir: "../"
        },
        open: true,
        notify: false
		//
    });
});

gulp.task( 'sass', function() {
	gulp.src('./sass/*.sass')
		.pipe( sass().on( 'error', sass.logError ) )
        .pipe(autoprefixer(['last 15 versions']))
		.pipe( gulp.dest( './css' ) )
        .pipe(browserSync.reload({stream: true}));
});

gulp.task( 'watch', ['sass', 'browser-sync'], function() {
	gulp.watch( './sass/**/*.sass', [ 'sass' ] );
	gulp.watch( '../*.html', browserSync.reload);
	gulp.watch( './js/*.js', browserSync.reload);
});


gulp.task('default', ['watch']);
//var gcmq = require( 'gulp-group-css-media-queries' )