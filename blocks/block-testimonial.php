<?php
/**
 * Testimonial
 *
 * @package      Client
**/

$testimonial	= get_field( 'testimonial' );
$highlight		= get_field( 'highlight' ); 
$client			= get_field( 'client' ); 
$orientation	= get_field( 'orientation' );


$orientation_class 	= '';
$flex_class			= '';

if ( $orientation == 'two-col' ) {
	
	$orientation_class .= 'two-col-testimonial'; 
	$flex_class 	   .= 'flex-half';

}
?>

<blockquote class="testimonial <?php echo $orientation_class; ?> overflow load-hidden fadeIn">
	
	<div class="flexbox col-1280">
	
		<div class="testimonial-highlight <?php echo $flex_class; ?> flex-item overflow">
			
			<h3><?php echo $highlight; ?></h3>
		</div>
		
		<div class="testimonial-body <?php echo $flex_class; ?> flex-item overflow">
			<div>
				<span>&ldquo;</span><?php echo $testimonial; ?><span>&rdquo;</span>
			</div>
			<cite><h5>&mdash; <?php echo $client; ?></h5></cite>
		</div>
	</div>

</blockquote>