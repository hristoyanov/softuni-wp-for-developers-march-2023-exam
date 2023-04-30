<?php
$post_meta = get_post_meta( get_the_ID() );
$visits = get_post_meta( get_the_ID(), 'visits_count', true );
$likes = get_post_meta( get_the_ID(), 'likes', true );
?>
<div class="property-card">
    <div class="property-primary">
        <?php $visits = get_post_meta( get_the_ID(), 'visits_count', true ); ?>
        <h2 class="property-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="property-meta">
            <span class="meta-location"><?php echo get_the_terms( get_the_ID(), 'location' )[0]->name; ?></span>
            <span class="meta-total-area">| Total area: <?php echo $post_meta['area'][0]; ?> sq.m</span>
        </div>
        <div>
            <?php the_content(); ?>
        </div>
        <div class="property-details">
            <span class="property-price">Price per sq. m: <?php echo $post_meta['price_currency'][0]; echo ' '; echo $post_meta['price'][0]; ?></span>
            <span class="property-date">Posted on: <?php the_date(); ?></span>
            <span class="property-date">| Views: <?php if ( boolval( $visits ) == false ): echo '0'; else: echo $visits; endif; ?></span>
            <span class="property-date">| Likes: <?php if ( boolval( $likes ) == false ): echo '0'; else: echo $likes; endif; ?></span>
        </div>
    </div>
    <div class="property-image">
        <div class="property-image-box">
            <!-- <img src="images/bedroom.jpg" alt="property image"> -->
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

<?php su_homes_update_home_views_count( get_the_ID() );
