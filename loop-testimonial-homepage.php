<?php

// WRAPPER
echo "<div class=\"slide slide{$slide_count} testimonial_rotator_slide hreview itemreviewed item {$has_image} cf-tr\">\n";
echo '<div class="testimonial_rotator_slide_inner">';

// DESCRIPTION
echo "<div class=\"text testimonial_rotator_description\">\n";

echo "<blockquote class=\"testimonial_rotator_quote _text-l\">\n";
echo wpautop( do_shortcode( get_the_content('') ) );
// AUTHOR INFO
if( $cite AND $show_author )
{
	echo "<footer class=\"testimonial_rotator_author_info cf-tr\">\n";
	echo '<cite>' . $cite . '</cite>';
	echo "</footer>\n";				
}
echo "</blockquote>\n";

echo "</div>\n";

// POST THUMBNAIL
if ( $has_image AND $show_image ) echo "<div class=\"testimonial_rotator_img img\">" . get_the_post_thumbnail( get_the_ID(), $img_size) . "</div>\n";

echo "</div>\n";
echo "</div>\n";