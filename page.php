<?php
//* This file handles pages.

/* Pre-Footer */
add_action( 'genesis_before_footer', 'product_index_loop', 0 );
function product_index_loop() {
	$query_args = [
		'post_type'			=> 'page',
		'name'				=> '_pre-footer',
	];
	$the_query = new WP_Query( $query_args );
	if ( $the_query->have_posts() ) { ?>
		<div class="pre-footer">
			<div class="wrap">
				<?php while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo apply_filters( 'the_content', $the_query->post->post_content );
				} ?>
			</div>
		</div>
	<?php }
}

genesis();
