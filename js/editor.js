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
	
	wp.blocks.registerBlockStyle( 'core/button', [ 	
		{
			name: 'slug',
			label: 'Name',
			isDefault: true,			
		}
	
	]);		
	
	
	wp.blocks.registerBlockStyle( 'core/cover', [ 	
		{
			name: 'cover-half-left',
			label: 'Image 50% Left',
			isDefault: false,
		},
		{
			name: 'cover-half-right',
			label: 'Image 50% Right',
			isDefault: false,
		},
		{
			name: 'cover-contain-top',
			label: 'Align image top',
			isDefault: false,
		},			
		{
			name: 'cover-contain-bottom',
			label: 'Align image bottom',
			isDefault: false,
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

