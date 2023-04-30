<?php

/**
 * Shortcode for displaying a single home post/item. Needs a post ID
 *
 */
function get_single_home( $atts = [], $content = null) {
    global $post;
    $newATTS = shortcode_atts(
        [
        'id' => '',
        ],
        $atts
    );
    $post = get_post( $newATTS['id'] );
    $post_meta = get_post_meta( $post->ID );
    ob_start(); ?>
    <div class="property-card">
        <div class="property-primary">
            <?php $visits = $post_meta['visits_count'][0]; ?>
            <h2 class="property-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="property-meta">
                <span class="meta-location">Location: <?php echo get_the_terms( $post->ID, 'location' )[0]->name; ?></span>
                <span class="meta-total-area">| Total area: <?php echo $post_meta['area'][0]; ?> sq.m</span>
            </div>
            <div>
                <?php the_content(); ?>
            </div>
            <div class="property-details">
                <span class="property-price">Price: <?php echo $post_meta['price_currency'][0]; echo ' '; echo $post_meta['price'][0]; ?></span>
                <span class="property-date">Posted on: <?php echo get_the_date(); ?></span>
                <span class="property-date">| Views: <?php echo $visits; ?></span>
                <span class="property-date">| Likes: <?php echo $post_meta['likes'][0]; ?></span>
            </div>
        </div>
        <div class="property-image">
            <div class="property-image-box">
                <!-- <img src="images/bedroom.jpg" alt="property image"> -->
                <div class="logo-box">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        } else {
                            echo '<img src="https://i.imgur.com/ZbILm3F.png" alt="default thumbnail">';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <a id="<?php echo $post->ID; ?>" class="button like-button" href="#">Like</a>

    <?php su_homes_update_home_views_count( $post->ID );
    return ob_get_clean();
}
add_shortcode('get_single_home', 'get_single_home');

function softuni_display_username() {
    $output = '';

    if ( is_user_logged_in() == true ) {
        $current_user = wp_get_current_user();
        $user_display_name = $current_user->data->display_name;
        $output = 'Hello, ' . $user_display_name . ', enjoy the article!';
    }

    return $output;
}
add_shortcode( 'display_username', 'softuni_display_username' );
