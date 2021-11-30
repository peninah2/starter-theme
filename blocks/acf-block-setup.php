<?php
/**
 * Blocks
 *
 * @package      HCStarter

**/

// Create blocks
function hct_register_custom_blocks() {
	
	if( ! function_exists( 'acf_register_block_type' ) )
		return;
	
	acf_register_block_type( array(
		'name'				=> 'spacer',
		'title'				=> __( 'Spacer', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-spacer.php',
		'category'			=> 'formatting',
		'icon'				=> 'editor-expand',
		'mode'				=> 'preview',
		'keywords'			=> array( 'spacer', 'separator', 'hct-theme-blocks' ),
	));		
	
	acf_register_block_type( array(
		'name'				=> 'svg-img',
		'title'				=> __( 'SVG image', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-svg-img.php',
		'category'			=> 'formatting',
		'icon'				=> 'embed-photo',
		'mode'				=> 'preview',
		'keywords'			=> array( 'svg', 'image', 'hct-theme-blocks' ),
		'supports'		=> [
			'align'			=> true,
			'anchor'		=> false,
			'customClassName'	=> true,
			'jsx' 			=> false,
		]
	));	

}
add_action('acf/init', 'hct_register_custom_blocks' );

add_filter( 'block_categories_all', 'hct_custom_block_category', 10, 2);
function hct_custom_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'hct-theme',
				'title' => __( 'Theme Blocks', 'hct-theme-blocks' ),
			),
		)
	);
}

/*
 * Only load Featherlight scripts if team member block is present
 */

function hct_teamblock_featherlight_script() {
	
	if ( has_block( 'acf/team-member' ) ) {
		wp_enqueue_script(
			'featherlight',
			get_stylesheet_directory_uri() . '/js/featherlight.min.js',
			array( 'jquery' ),
			CHILD_THEME_VERSION,
			true
		);
	}
}
// add_action( 'wp_enqueue_scripts', 'hct_teamblock_featherlight_script' );




// Custom spacer block 
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_616d7edc6b490',
	'title' => 'Spacer',
	'fields' => array(
		array(
			'key' => 'field_616d7ee18b76b',
			'label' => 'Height',
			'name' => 'height',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'xsmall' => 'XS',
				'small' => 'S',
				'medium' => 'M',
				'large' => 'L',
				'custom' => 'Custom',
			),
			'allow_null' => 0,
			'default_value' => 'large',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_616d7f0c8b76c',
			'label' => 'Custom height (pixels)',
			'name' => 'custom_height',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_616d7ee18b76b',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array(
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_616db86a246e2',
			'label' => 'Hide on mobile?',
			'name' => 'hide_mobile',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/spacer',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;	