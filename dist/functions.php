<?php

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesium' );
define( 'CHILD_THEME_URL', 'https://github.com/acbeaumo/Genesium' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'genesium_enqueue_scripts_styles' );
function genesium_enqueue_scripts_styles() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Lato:400,400italic,700,700italic' );
	wp_enqueue_style('font-awesome', '//opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css');
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.min.js', ['jquery'], '1.0.0', true );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form'] );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', ['404-page', 'drop-down-menu', 'headings', 'search-form', 'skip-links'] );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom header
add_theme_support( 'custom-header', [
	'width'           => 476,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
] );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add Image Sizes
add_image_size( 'featured-image', 720, 400, true );

//* Rename primary and secondary navigation menus
add_theme_support( 'genesis-menus' , ['primary' => 'Main Menu', 'secondary' => 'Footer Menu'] );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'genesium_secondary_menu_args' );
function genesium_secondary_menu_args ( $args ) {
	if ( $args['theme_location'] === 'secondary' ) {
		$args['depth'] = 1;
	}
	return $args;
}

/* Footer modifications */
add_filter( 'genesis_footer_creds_text', 'genesium_footer_creds_text' );
function genesium_footer_creds_text( $editthecredit ) {
	return '© ' . date('Y') . ' Companyname';
}

/* Enable hide label option for Gravity Forms */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
