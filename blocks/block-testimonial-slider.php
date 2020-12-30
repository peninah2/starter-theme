<?php
/**
 * Testimonial slider
 *
 * @package      HCStarter
**/
	
if( have_rows('testimonials') ):

	echo '<div class="testimonial-slider swiper-container">';
	echo '<div class="swiper-wrapper">';
    while( have_rows('testimonials') ) : the_row();
	

		$author			= get_sub_field('author');
        $testimonial 	= get_sub_field('testimonial');
		
		?>
		
		<div class="swiper-slide">
			<div class="flexbox align-content-center justify-content-center flex-direction-column has-text-align-center narrow centered" height="100%">			
				<div class="testimonial-text has-font-size-medium"><?php echo $testimonial; ?><br /><br /></div>
			
				<?php if( !empty( $author ) )
					echo '<p class="no-margin"><strong>' . $author . '</strong></p>';
				?>
				
			</div>
		</div>
		<?php
		
		if ( is_admin() ) {
			break;
		}
		
    endwhile;
	
	echo '</div>';
	echo '<div class="swiper-button-next"></div> <div class="swiper-button-prev"></div>';
	echo '</div>';
else :
endif;