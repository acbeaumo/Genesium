var gulp = require('gulp');

gulp.task('watch', function() {
	var compass = require('gulp-compass');
	gulp.src('./sass/style.scss')
		.pipe(compass({
			task: 'watch',
			sass: './sass',
			css: './dist'
		}))
		.pipe(gulp.dest('./dist'));
});

gulp.task('styles', function() {
	var compass = require('gulp-compass'),
		postcss = require('gulp-postcss'),
		autoprefixer = require('autoprefixer'),
		cleancss = require('gulp-clean-css');
	gulp.src('./sass/style.scss')
		.pipe(compass({
			sass: './sass',
			css: './dist'
		}))
		.pipe(postcss([ autoprefixer({
			browsers: ['last 2 versions']
		}) ]))
		.pipe(cleancss())
		.pipe(gulp.dest('./dist'));
});

gulp.task('scripts', function() {
	var concat = require('gulp-concat'),
		rename = require('gulp-rename'),
		uglify = require('gulp-uglify');
	gulp.src('./scripts/*.js')
        .pipe(concat('scripts.js'))
		.pipe(gulp.dest('./dist/js'))
		.pipe(rename('scripts.min.js'))
		.pipe(uglify())
        .pipe(gulp.dest('./dist/js'));
});

gulp.task('default', ['styles', 'scripts']);
