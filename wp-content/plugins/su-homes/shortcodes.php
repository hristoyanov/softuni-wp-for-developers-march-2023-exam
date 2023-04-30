<?php

/**
 * Shortcode for displaying a single home post/item. Needs a post ID
 *
 */
function get_single_home( $atts = [], $content = null) {
    $newATTS = shortcode_atts(
        [
        'id' => '',
        ],
        $atts
    );
    $post = get_post( $newATTS['id'] );
    var_dump($post);
    var_dump($post->post_content);
    ob_start(); ?>

 
    <div class="property-card">
        <div class="property-primary">
            <?php $visits = get_post_meta( $post->id, 'visits_count', true ); ?>
            <h2 class="property-title">
                <a href="<?php $post->permalink; ?>"><?php $post->post_content; ?></a>
            </h2>
            <div class="property-meta">
                <span class="meta-location">Ovcha Kupel, Sofia</span>
                <span class="meta-total-area">Total area: 91.65 sq.m</span>
            </div>
            <div class="property-details">
                <span class="property-price">€ 100,815</span>
                <span class="property-date">Posted on: <?php the_date(); ?></span>
                <span class="property-date">| Views: <?php echo $visits; ?></span>
                <span class="property-date">| Likes: <?php echo get_post_meta( get_the_ID(), 'likes', true ); ?></span>
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
    <a id="<?php echo get_the_ID(); ?>" class="button like-button" href="#">Like</a>

    <?php su_homes_update_home_views_count( get_the_ID() );

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
