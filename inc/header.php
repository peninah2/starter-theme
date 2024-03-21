<?php 

/**
 * Header 
 *
 * @package      HCStarter

**/

add_theme_support( 'genesis-menus', array( 'primary' => __( 'Desktop Menu', 'genesis' ) ) );

 // Repositions primary navigation menu to header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );


// Adding custom menus
add_action( 'after_setup_theme', 'hct_register_nav_menu', 0 );
function hct_register_nav_menu(){
	register_nav_menus( array(
		'mobile_menu'  => __( 'Responsive', 'text_domain' ),
	) );
}

// Sets up separate menu location for responsive
add_action('genesis_header', 'hct_responsive_menu_button', 11 );
function hct_responsive_menu_button() {
	
	//echo '<button href="#" class="menu-toggle"><span class="toggle-icon"></span></button>'; 
	echo '<button href="#" class="menu-toggle"><span></span> <span></span> <span></span> <span></span></button>'; 
	
	wp_nav_menu( array( 
		'theme_location' => 'mobile_menu', 
		'container' => 'nav', 
		'container_class' => 'mobile-menu-wrap', 
		'menu_class' => 'genesis-nav-menu mobile-menu',
		) 
	);
	
}

// Puts logo in as file 
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action( 'genesis_header', 'hct_site_title' );
function hct_site_title() {
	?>
	<h1 itemprop="headline" class="site-title">
		<a href="<?php echo network_site_url( '/' ); ?>">
			<span class="site-name"><?php echo get_bloginfo( 'name' ); ?></span>	

			<div class="site-logo">
				----- Enter logo path or svg -----
			</div>	
		</a>
	</h1>

	<?php 
}