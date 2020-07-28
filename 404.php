<?php
/**
 * 404 error template
 */

//* Remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'hct_genesis_404' );
function hct_genesis_404() {

		echo  '<article class="entry"><div class="post hentry">';

		echo '<div class="wp-block-group alignfull" style="text-align:center;"><div class="wp-block-group__inner-container">';

		printf( '<h1 class="entry-title">%s</h1>', __( 'That page isn\'t here.', 'genesis' ) );

		echo '<p>Try checking the menu above, or, <a href="/contact">contact us.</a></p>';
		
		echo '</div></div>';
		echo '</article></div>';

}

genesis();
