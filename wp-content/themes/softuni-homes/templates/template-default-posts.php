<?php
/* Template Name: Default Posts Template */
?>

<?php get_header();
the_content();

$args = array(
	'post_type'			=> 'post',
	'post_status'		=> 'publish',
	'orderby'			=> 'date',
	'order'				=> 'DESC',
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <ul class="properties-listing">
	<?php while ( $query->have_posts() ) : $query->the_post();
		get_template_part( 'template-parts/post', 'item' );
    endwhile;
    wp_reset_postdata(); ?>
    </ul>
<?php endif;

get_footer(); ?>
