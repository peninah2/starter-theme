<?php 

/**
 * Header 
 *
 * @package      HCStarter

**/

add_theme_support( 'genesis-menus', array( 'primary' => __( 'Desktop Menu', 'genesis' ) ) );
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );


// Adding custom menus
add_action( 'after_setup_theme', 'hct_register_nav_menu', 0 );
function hct_register_nav_menu(){
	register_nav_menus( array(
		'mobile_menu'  => __( 'Responsive', 'text_domain' ),
	) );
}

// Setup header
add_action( 'genesis_header', 'hct_header' );
function hct_header() {
	?>
	<h1 itemprop="headline" class="site-title">
		<a href="<?php echo network_site_url( '/' ); ?>">
			<span class="site-name"><?php echo get_bloginfo( 'name' ); ?></span>	
			<img src="../images/logo.svg" alt="<?php echo get_bloginfo( 'name' ); ?> logo" />
		</a>
	</h1>

	<?php 
	
	genesis_do_nav();

//  Use if want to include a block in the header	
//	$block_content = '<!-- wp:block {"ref": 1} /-->';    
//   echo '<div class="desktop">' . do_blocks($block_content) . '</div>';
	?>

	<?php echo '<button href="#" class="menu-toggle"><span></span> <span></span> <span></span> <span></span></button>'; ?>
	
	<nav class="mobile-menu-wrap">
		<?php 
			 wp_nav_menu( array( 'theme_location' => 'mobile_menu', 'menu_class' => 'genesis-nav-menu mobile-menu',	) );
		//	 echo do_blocks($block_content);
		?>
	</nav>
	
	<?php 
}
