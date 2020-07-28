<?php 

/**
 * Footer
 *
 * @package      HCStarter

**/


// Remove Genesis footer
remove_action('genesis_footer', 'genesis_do_footer');

// Removes footer entry meta
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Add logo to footer 
function hct_logo_footer() {
	?>
		<div class="logo-footer">
			<img src="/wp-content/themes/theme-name/images/logo_footer.png" alt="Client name logo" />
		</div>
	<?php
}
//add_action( 'genesis_footer', 'hct_logo_footer', 9 ); 

// Social menu 
function hct_social_menu() {
	
	$linkedin 	= get_field( 'linkedin', 'option' ); 
	$instagram 	= get_field( 'instagram', 'option' );
	$facebook 	= get_field( 'facebook', 'option' );
	$twitter 	= get_field( 'twitter', 'option' ); 
	
	echo '<ul class="social-media-menu">';
	
	if ( !empty( $linkedin ) ) {
		echo '<li><a href="' . $linkedin . '" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
	}
	
	if ( !empty( $instagram ) ) {
		echo '<li><a href="' . $instagram . '" target="_blank"><i class="fab fa-instagram"></i></a></li>';
	}
	
	if ( !empty( $facebook ) ) {
		echo '<li><a href="' . $facebook . '" target="_blank"><i class="fab fa-facebook"></i></a></li>';
	}
	
	if ( !empty( $twitter ) ) {
		echo '<li><a href="' . $twitter . '" target="_blank"><i class="fab fa-twitter"></i></a></li>';
	}	
	
	echo '</ul>';
}
//add_action( 'genesis_footer', 'hct_social_menu', 11 );
