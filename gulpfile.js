// Load our plugins
var	gulp			=	require('gulp'),
	sass			=	require('gulp-ruby-sass'),  // Our sass compiler
	notify			=	require('gulp-notify'), // Basic gulp notificatin using OS
	minifycss		=	require('gulp-minify-css'), // Minification
	rename			=	require('gulp-rename'), // Allows us to rename our css file prior to minifying 
	autoprefixer	=	require('gulp-autoprefixer'), // Adds vendor prefixes for us
	browserSync		=	require('browser-sync'); // Sends php, js, img and css updates to browser for us

// Our browser-sync task.  

gulp.task('browser-sync', function() {
	var files = [
		'**/*.php'
	];

	browserSync.init(files, {
		proxy: 'localhost/'
	});
});


// Our 'styles' tasks, which handles our sass actions such as compliling and minification

gulp.task('styles', function() {
	return sass('assets/sass/', {
			style: 'expanded',
			lineNumbers: true,
			container: 'susanstripes',
			sourcemap: true
		})
		.on('error', notify.onError(function(error) {
			return "Error: " + error.message;
		}))
		.pipe(autoprefixer({ 
			browsers: ['last 2 versions', 'ie >= 8']
		})) // our autoprefixer - add and remove vendor prefixes using caniuse.com
		.pipe(gulp.dest('assets/css')) // Location of our app.css file
		.pipe(browserSync.reload({stream:true})) // CSS injection when app.css file is written
		.pipe(rename({suffix: '.min'})) // Create a copy version of our compiled app.css file and name it app.min.css
		.pipe(minifycss({
			keepSpecialComments:0
		})) // Minify our newly copied app.min.css file
		.pipe(gulp.dest('assets/css')) // Save app.min.css onto this directory	
		.pipe(browserSync.reload({stream:true})) // CSS injection when app.min.css file is written
		.pipe(notify({
			message: "Styles task complete!"
		}));
});

gulp.task('deploy', function() {
	var files = [
		'assets/components/modernizr/modernizr.js',
		'assets/components/fastclick/lib/fastclick.js',
		'assets/components/foundation/js/foundation.min.js',
		'assets/components/components-font-awesome/css/**/*',
		'assets/components/components-font-awesome/fonts/**/*',
		'assets/css/*', 
		'inc/**.*',
		'js/**/*.js',
		'languages/**.*',
		'layouts/**.*',
		'page-templates/**/*',
		'screenshot.png',
		'*.php',
		'style.css'];

	var dest = '/var/www/html/theme-dev/wp-content/themes/susanstripes';

	return gulp.src(files, {base:"."})
	        .pipe(gulp.dest(dest));
});

// Our default gulp task, which runs 'styles' when a sass file changes.  This is task is executed by typing 'gulp' on the Terminal
gulp.task('default', ['styles', 'deploy'], function() {
	// Watch our sass files and run 'styles' task when changes are made
	//gulp.watch('assets/sass/**/*.scss', ['styles']);
})
