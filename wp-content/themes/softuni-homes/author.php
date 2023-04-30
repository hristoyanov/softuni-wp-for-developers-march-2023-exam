<?php
get_header();
global $post;
$author_id = get_post_field( 'post_author', $post->ID );
$author_name = get_the_author_meta( 'display_name', $author_id ); ?>
<h1>All posts by <?php echo $author_name; ?></h1>
<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'author' => $author_id
);

$query = new WP_Query($args);

if ( $query->have_posts() ) : ?>
    <ul class="properties-listing">
	<?php while ( $query->have_posts() ) : $query->the_post();
		get_template_part( 'template-parts/post', 'item' );
    endwhile;
    wp_reset_postdata(); ?>
    </ul>
<?php endif;

get_footer(); ?>