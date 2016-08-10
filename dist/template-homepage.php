<?php
/*
 * Template Name: Homepage
 */

add_filter('body_class', function ($classes) {
	$classes[] = 'transparent-header';
	return $classes;
});

genesis();
