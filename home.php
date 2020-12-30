<?php 

/*
 * Use custom loop for blog archive
 */


remove_action( 'genesis_loop', 'genesis_do_loop' ); 

add_action( 'genesis_loop', 'hct_custom_blog_loop' );
function hct_custom_blog_loop() {
	
	
	if ( have_posts() ) {
	
		echo '<ul>';
		
		while ( have_posts() ) {
			the_post(); 
			
			get_template_part( 'template-parts/excerpt-blog' );
			
		}
		
		echo '</ul>';
		
	}
	
	do_action( 'genesis_after_endwhile' );
	
	wp_reset_postdata();
	

}


