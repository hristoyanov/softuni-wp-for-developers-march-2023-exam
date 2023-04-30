<?php get_header(); ?>

<ul class="properties-listing">
	<?php if ( have_posts() ) :
		while( have_posts() ) : the_post();
			get_template_part( 'template-parts/home', 'item' );
		endwhile;
		posts_nav_link();
	endif; ?>
</ul>
		
<?php get_footer(); ?>
