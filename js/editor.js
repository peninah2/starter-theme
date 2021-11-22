wp.domReady( () => {

	// Remove spacer block as we have a custom one with more settings
	wp.blocks.unregisterBlockType( 'core/spacer' );

	wp.blocks.registerBlockStyle( array('core/heading', 'core/paragraph'), [ 	
		{
			name: 'sans',
			label: 'Sans',
		},
		{
			name: 'serif',
			label: 'Serif',
			isDefault: true,
		},	
	
	]);	
	
	wp.blocks.unregisterBlockStyle(
		'core/button',
		[ 'squared', 'fill' ]
	);

	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[ 'default', 'wide', 'dots' ],
	);


	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[ 'default', 'large' ]
	);

} );

