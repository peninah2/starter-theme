<?php
/**
 * Blocks
 *
 * @package      HCStarter

**/



/**
 * Load Blocks
 */
add_action( 'init', 'hct_load_blocks' );
function hct_load_blocks() {
	
	register_block_type( get_stylesheet_directory() . '/blocks/svg' );
	register_block_type( get_stylesheet_directory() . '/blocks/spacer' );
	
}

add_action( 'wp_enqueue_scripts', 'hct_block_scripts' );
function hct_block_scripts() {	


	
}


add_filter( 'block_categories_all', 'hct_custom_block_category', 10, 2);
function hct_custom_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'hct-theme',
				'title' => __( 'Theme Blocks', 'hct-theme' ),
			),
		)
	);
}



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
				'xlarge' => 'XL',
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
		array(
			'key' => 'field_616db86a246e22',
			'label' => 'Hide on desktop?',
			'name' => 'hide_desktop',
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


// Custom SVG block since WP doesn't support SVG image code
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6243440366f50',
	'title' => 'Block: SVG image',
	'fields' => array(
		array(
			'key' => 'field_6243440802b3a',
			'label' => 'SVG code',
			'name' => 'svg_code',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/svg-img',
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
	'show_in_rest' => 0,
));

endif;		