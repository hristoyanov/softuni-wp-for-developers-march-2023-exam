<?php get_header();

if ( have_posts() ) :
	while( have_posts() ) :
		the_post(); ?>
        <div class="property-card">
            <div class="property-primary">
                <?php $visits = get_post_meta( get_the_ID(), 'visits_count', true ); ?>
                <h2 class="property-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="property-meta">
                    <span class="meta-location">Ovcha Kupel, Sofia</span>
                    <span class="meta-total-area">Total area: 91.65 sq.m</span>
                </div>
                <div class="property-details">
                    <span class="property-price">€ 100,815</span>
                    <span class="property-date">Posted on: <?php the_date(); ?></span>
                    <span class="property-date">| Views: <?php echo $visits; ?></span>
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

        <?php su_homes_update_home_views_count( get_the_ID() );

    endwhile;
endif; ?>

<?php get_footer();
