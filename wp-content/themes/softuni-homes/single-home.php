<?php get_header();

if ( have_posts() ) :
	while( have_posts() ) :
		the_post();
        $post_meta = get_post_meta( get_the_ID() ); ?>
        <div class="property-card">
            <div class="property-primary">
                <?php $visits = get_post_meta( get_the_ID(), 'visits_count', true ); ?>
                <h2 class="property-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="property-meta">
                    <span class="meta-location">Location: <?php echo get_the_terms( get_the_ID(), 'location' )[0]->name; ?></span>
                    <span class="meta-total-area">| Total area: <?php echo $post_meta['area'][0]; ?> sq.m</span>
                </div>
                <div>
                    <?php the_content(); ?>
                </div>
                <div class="property-details">
                    <span class="property-price">Price: <?php echo $post_meta['price_currency'][0]; echo ' '; echo $post_meta['price'][0]; ?></span>
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

    endwhile;
endif; ?>

<?php get_footer();
