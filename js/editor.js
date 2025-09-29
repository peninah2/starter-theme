wp.domReady( () => {

	// Remove spacer block as we have a custom one with more settings
	wp.blocks.unregisterBlockType( 'core/spacer' );

	wp.blocks.registerBlockStyle( 'core/media-text', [ 	
		{
			name: 'content-fit',
			label: 'Full width image, content within grid',
			isDefault: false,			
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
		},
		{
			name: 'col-lines',
			label: 'Lines between columns',
			isDefault: false,
		}
	]);
		
	
	
	wp.blocks.registerBlockStyle( 'core/cover', [ 	
		{
			name: 'cover-left',
			label: 'Align Left',
			isDefault: false,
		},
		{
			name: 'cover-right',
			label: 'Align Right',
			isDefault: false,
		},
		{
			name: 'cover-contain-top',
			label: 'Align Top',
			isDefault: false,
		},			
		{
			name: 'cover-contain-bottom',
			label: 'Align Bottom',
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

