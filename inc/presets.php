<?php
/**
 * Presets (colors, fonts)
 *
 * @package      HCStarter
**/


// -- Disable custom font sizes
add_theme_support( 'disable-custom-font-sizes' );

// -- Editor Font Styles
// -- Editor Font Styles
add_theme_support( 'editor-font-sizes', array(
	array(
		'name'      => __( 'Small', 'theme-name' ),
		'shortName' => __( 'S', 'theme-name' ),
		'size'      => 14,
		'slug'      => 'small'
	),

	array(
		'name'      => __( 'Medium', 'theme-name' ),
		'shortName' => __( 'M', 'theme-name' ),
		'size'      => 20,
		'slug'      => 'medium'
	),

	array(
		'name'      => __( 'Medium-Large', 'theme-name' ),
		'shortName' => __( 'ML', 'theme-name' ),
		'size'      => 22,
		'slug'      => 'med-large'
	),		
	
	array(
		'name'      => __( 'Large', 'theme-name' ),
		'shortName' => __( 'L', 'theme-name' ),
		'size'      => 24,
		'slug'      => 'large'
	),
	
	array(
		'name'      => __( 'Extra Large', 'theme-name' ),
		'shortName' => __( 'XL', 'theme-name' ),
		'size'      => 30,
		'slug'      => 'xlarge'
	),	
	
) );

// -- Disable Custom Colors
// add_theme_support( 'disable-custom-colors' );

// -- Editor Color Palette
add_theme_support( 'editor-color-palette', array(

	array(
		'name'  => __( 'White', 'theme-name' ),
		'slug'  => 'white',
		'color' => '#ffffff',
	),
	
	array(
		'name'  => __( 'Grey', 'theme-name' ),
		'slug'  => 'grey',
		'color' => '#ddd',
	),

	array(
		'name'  => __( 'Black', 'theme-name' ),
		'slug'  => 'black',
		'color' => '#111',
	),
	
) );


//add_theme_support( 'disable-custom-gradients' );

function hct_custom_gradients() {
	add_theme_support(
		'editor-gradient-presets',
		array(
		
			array(
				'name'     => __( 'Vertical grey-white', 'theme-name' ),
				'gradient' => 'linear-gradient(0deg, rgba(255,255,255,1) 50%, rgba(222,222,222,1) 50%)',
				'slug'     => 'vertical-grey-white'
			)
      
		)
	);
}
add_action('after_setup_theme', 'hct_custom_gradients');



/**
 * Editor layout class
 * @link https://www.billerickson.net/change-gutenberg-content-width-to-match-layout/
 *
 * @param string $classes
 * @return string
 */
function ea_editor_layout_class( $classes ) {
    $screen = get_current_screen();
    if( ! $screen->is_block_editor() )
      return $classes;

    $layout = false;
    $post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;

    // Get post-specific layout
    if( $post_id )
      $layout = genesis_get_custom_field( '_genesis_layout', $post_id );

    // If no post-specific layout, use site-wide default
    elseif( empty( $layout ) )
      $layout = genesis_get_option( 'site_layout' );

    $classes .= ' ' . $layout . ' ';
    return $classes;
}
add_filter( 'admin_body_class', 'ea_editor_layout_class' );
