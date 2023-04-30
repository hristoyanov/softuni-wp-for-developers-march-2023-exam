<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<ul class="properties-listing">
		<?php while( have_posts() ) : the_post();
			get_template_part( 'template-parts/home', 'item' );
		endwhile; ?>
</ul>
	<?php posts_nav_link();
	endif; ?>
		
<?php get_footer(); ?>
