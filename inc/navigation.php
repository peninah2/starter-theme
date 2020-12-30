<?php
/**
 * Navigation
 *
 * @package      HCStarter

**/ 
 
 add_theme_support( 'genesis-menus', array( 'primary' => 'Primary Navigation Menu', 'secondary' => 'Secondary Navigation Menu' ) );
 

 // Repositions primary navigation menu to header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

// Reduces secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'hct_secondary_menu_args' );
function hct_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;

}


// Adding custom menus
// add_action( 'after_setup_theme', 'hct_register_nav_menu', 0 );
function hct_register_nav_menu(){
	register_nav_menus( array(
		'footer_menu_1'  => __( 'Footer 1', 'text_domain' ),
		'footer_menu_2'  => __( 'Footer 2', 'text_domain' ),
		'mobile_menu'  => __( 'Responsive', 'text_domain' ),
	) );
}

// If using separate menu for responsive menu
// add_action('genesis_header', 'hct_responsive_menu_button', 11 );
function hct_responsive_menu_button() {
	
	echo '<a href="#" class="menu-toggle"><span class="toggle-icon"></span></a>'; 
	
	wp_nav_menu( array( 
		'theme_location' => 'mobile_menu', 
		'container' => 'nav', 
		'container_class' => 'mobile-menu-wrap flexbox align-items-center justify-content-center', 
		'menu_class' => 'genesis-nav-menu mobile-menu',
		) 
	);
	
}


// Scroll to top 
function hct_scroll_top() {
	?>
	<a href="#" class="button scroll-top" id="scroll-top">
 		<i class="arrow up"></i>
	</a>
	<?php
}
add_action( 'genesis_after_content', 'hct_scroll_top' );
