var gulp = require('gulp');

gulp.task('compass-watch', function() {
	var compass = require('gulp-compass');
	return gulp.src('./sass/*.scss')
		.pipe(compass({
			task: 'watch',
			sass: './sass',
			css: './'
		}))
		.pipe(gulp.dest('./'));
});

gulp.task('default', function() {
	var compass = require('gulp-compass'),
		postcss = require('gulp-postcss'),
		autoprefixer = require('autoprefixer'),
		cleancss = require('gulp-clean-css'),
		sourcemaps = require('gulp-sourcemaps');
	return gulp.src('./sass/*.scss')
		.pipe(sourcemaps.init())
		.pipe(compass({
			sass: './sass',
			css: './'
		}))
		.pipe(postcss([ autoprefixer({
			browsers: ['last 2 versions']
		}) ]))
		.pipe(cleancss())
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./'));
});
