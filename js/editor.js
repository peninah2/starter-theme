wp.domReady( () => {

	// Remove spacer block as we have a custom one with more settings
	wp.blocks.unregisterBlockType( 'core/spacer' );

	wp.blocks.registerBlockStyle( 'core/heading', [ 	
		{
			name: 'main',
			label: 'Main',
		},
		{
			name: 'secondary',
			label: 'Secondary',
			isDefault: true,
		}
	]);
	
	wp.blocks.registerBlockStyle( 'core/paragraph', [ 
		{
			name: 'main',
			label: 'Main',
			isDefault: true,			
		},
		{
			name: 'secondary',
			label: 'Secondary',
		}
	
	]);	
	
	wp.blocks.registerBlockStyle( 'core/button', [ 	
		{
			name: 'slug',
			label: 'Name',
			isDefault: true,			
		}
	
	]);		
	
	
	wp.blocks.registerBlockStyle( 'core/columns', [ 	
		{
			name: 'col-wide',
			label: 'Wide gap between columns',
			isDefault: false,
		},
		{
			name: 'col-spread',
			label: 'Spread columns',
			isDefault: false,
		},
		{
			name: 'col-no-space',
			label: 'No space between',
			isDefault: false,
		}
	]);
		
	
	
	wp.blocks.registerBlockStyle( 'core/cover', [ 	
		{
			name: 'cover-left',
			label: 'Align Image Left',
			isDefault: false,
		},
		{
			name: 'cover-right',
			label: 'Align Image Right',
			isDefault: false,
		},
		{
			name: 'cover-contain-top',
			label: 'Align Image Top',
			isDefault: false,
		},			
		{
			name: 'cover-contain-bottom',
			label: 'Align Image Bottom',
			isDefault: false,
		},	
	
	]);	
	
	wp.blocks.unregisterBlockStyle(
		'core/button',
		[ 'squared', 'fill' ]
	);

	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[ 'dots' ],
	);


	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[ 'default', 'large' ]
	);

} );

