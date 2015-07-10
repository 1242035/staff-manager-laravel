var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var include = require('gulp-include');
var uglify = require('gulp-uglify');

gulp.task('sass', function() {
	return gulp.src('resources/assets/sass/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
		.pipe(sass({
			outputStyle: 'compressed'
		}))
		.pipe(sourcemaps.write('../maps'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('js', function() {
	gulp.src('resources/assets/js/app.js')
		.pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
		.pipe(sourcemaps.init())
		.pipe(include())
		.pipe(uglify({
			preserveComments: 'some'
		}))
		.pipe(sourcemaps.write('../maps'))
		.pipe(gulp.dest('public/js'));
});

gulp.task('watch', function() {
	gulp.watch('resources/assets/js/**/*.js', ['js']);
	gulp.watch('resources/assets/sass/**/*.scss', ['sass']);
});

gulp.task('default', ['watch'], function() {
	return gutil.log('Gulp is running!')
});
