wp.domReady( () => {


	// 	wp.blocks.unregisterBlockType( 'core/spacer' ); Remove spacer block in favor of custom

	wp.blocks.unregisterBlockStyle(
		'core/button',
		[ 'squared', 'fill' ]
	);
	
	wp.blocks.registerBlockStyle( 'core/group', [ 
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'flexbox',
			label: 'Flexbox',
		},	
	
	]);	

	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[ 'default', 'wide', 'dots' ],
	);

	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[ 'default', 'large' ]
	);

} );

