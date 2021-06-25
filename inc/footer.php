<?php 

/**
 * Footer
 *
 * @package      HCStarter


 Footer options: 
 
 - If design has fat footer and the sections are even, use widgets
 - If sections are not even, use function below and adjust as needed


**/


// add_theme_support( 'genesis-footer-widgets', 3 );


// Remove Genesis footer
remove_action('genesis_footer', 'genesis_do_footer');

// Removes footer entry meta
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


// Custom footer
//add_action( 'genesis_footer', 'hct_custom_footer', 9 ); 

function hct_custom_footer() {
	?>
	<div class="flexbox stack-1280">
		
		<div class="logo-footer flex-1 flex-item">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo/logo.svg" alt="COMPANY NAME logo" />
		</div>
		
		<div class="flex-1 flex-item">
			<?php wp_nav_menu( array( 'theme_location' => 'footer_menu_1', 'menu_class' => 'footer-menu genesis-nav-menu', ) ); ?>
		</div>
		
		<div class="flex-1 flex-item">
			<?php wp_nav_menu( array( 'theme_location' => 'footer_menu_2', 'menu_class' => 'footer-menu footer-menu-2 genesis-nav-menu', ) ); ?>
		</div>
		
		<div class="flex-2 flex-item">
			<?php gravity_form( 1, false, false, false, '', true ); ?>
		</div>
		
	</div>
	<?php
}

// Social menu 
// Requires adding social media links to options page via ACF
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

