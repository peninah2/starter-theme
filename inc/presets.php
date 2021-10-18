<?php
/**
 * Presets (colors, fonts)
 *
 * @package      HCStarter
**/


// -- Disable custom font sizes
// add_theme_support( 'disable-custom-font-sizes' );

// -- Disable Custom Colors
// add_theme_support( 'disable-custom-colors' );

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
