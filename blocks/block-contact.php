<?php 

/**
 * Contact
 *
 * @package      Client
**/

$email			= get_field( 'email' );
$email_encoded 	= antispambot( $email );

$phone			= get_field( 'phone' ); 
$phone_encoded	= antispambot( $phone );

$instagram_handle	= get_field( 'instagram' ); 
$instagram_link		= get_field( 'instagram', 'option' );

if ( is_admin() ) {
	?>
		Phone: <?php echo $phone; ?><br>
		Email: <?php echo $email; ?><br>
		Instagram: <?php echo $instagram_handle; ?>
	
	<?php
}

else {

	
	?>
	
		<div class="has-text-align-center">
			Phone: <?php echo $phone; ?><br>
			Email: <?php echo $email; ?><br>
			Instagram: <?php echo $instagram_handle; ?>
		</div>
		
	<?php
}


	




