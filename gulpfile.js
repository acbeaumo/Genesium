'use strict';

var gulp = require('gulp');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

gulp.task('styles', function() {
	var processors = [
		autoprefixer({
			'browsers': ['last 2 versions']
		}),
		cssnano({
			'discardUnused': false,
			'mergeIdents': false,
			'reduceIdents': false,
			'zindex': false
		})
	];
	return gulp.src('./sass/**/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss(processors))
		.pipe(gulp.dest('./dist'));
});

gulp.task('scripts', function() {
	gulp.src('./scripts/**/*.js')
        .pipe(concat('scripts.js'))
		.pipe(gulp.dest('./dist/js'))
		.pipe(rename('scripts.min.js'))
		.pipe(uglify())
        .pipe(gulp.dest('./dist/js'));
});

gulp.task('watch', function() {
	gulp.watch('./sass/**/*.scss', ['styles']);
	gulp.watch('./scripts/**/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);
