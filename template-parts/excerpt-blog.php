<?php 


?>


<li class="single-post-excerpt">
	<div class="latest-post">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</div>
	<div class="recent-posts-content">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<h6><?php echo get_the_date(); ?></h6>
		<div>
			<?php the_excerpt(); ?>
			<br />
		</div>
	</div>
	<a href="<?php the_permalink(); ?>" class="button read-more-recent">Read more</a>
</li>