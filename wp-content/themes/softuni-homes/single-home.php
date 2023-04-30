<?php get_header();

if ( have_posts() ) :
	while( have_posts() ) :
		the_post();
        $post_meta = get_post_meta( get_the_ID() );
        $visits = get_post_meta( get_the_ID(), 'visits_count', true );
        $likes = get_post_meta( get_the_ID(), 'likes', true );
        $args = array(
            'post_type'			=> 'home',
            'post_status'		=> 'publish',
            'orderby'			=> 'date',
            'order'				=> 'DESC',
            'posts_per_page' => 3,
            'post__not_in' => array( get_the_ID() )
        );
        $query = new WP_Query( $args ); ?>
        <div class="property-single">
            <main class="property-main">
                <div class="property-card">
                    <div class="property-primary">
                        <header class="property-header">
                            <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="property-meta">
                                <span class="meta-location"><?php echo get_the_terms( get_the_ID(), 'location' )[0]->name; ?></span>
                                <span class="meta-total-area">Price: <?php echo $post_meta['price'][0]; echo $post_meta['price_currency'][0];?>/sq.m</span>
                            </div>

                            <div class="property-details grid">
                                <div class="property-details-card">
                                    <div class="property-details-card-title">
                                        <h3>Rooms</h3>
                                    </div>
                                    <div class="property-details-card-body">
                                        <ul>
                                            <li>2 Bedrooms</li>
                                            <li>1 Bathroom</li>
                                            <li>1 Living room</li>
                                            <li>Separated kitchen</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-details-card">
                                    <div class="property-details-card-title">
                                        <h3>Additional Details</h3>
                                    </div>
                                    <div class="property-details-card-body">
                                        <ul>
                                            <li>Floor: 6</li>
                                            <li>Elevator/Lift</li>
                                            <li>Brick-built</li>
                                            <li>Electricity</li>
                                            <li>Water Supply</li>
                                            <li>Heating</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                
                        </header>

                        <div class="property-body">
                            <?php echo the_content(); ?>
                        </div>
                    </div>
                </div>
            </main>
            <aside class="property-secondary">
                <div class="property-image property-image-single">
                    <div class="property-image-box property-image-box-single">
                        <?php if ( has_post_thumbnail() ) :  ?>
                            <?php the_post_thumbnail( 'job-thumbnail' ); ?>
                        <?php else : ?>
                            <img src="images/bedroom.jpg" alt="property image">
                        <?php endif; ?>
                    </div>
                </div>
                <a href="#" id="<?php echo get_the_ID(); ?>" class="button button-wide like-button">Like the property</a>
                <div class="property-date">Total Likes: <?php if ( boolval( $likes ) == false ): echo '0'; else: echo $likes; endif; ?></div>
                <div class="property-date">Total Views: <?php if ( boolval( $visits ) == false ): echo '0'; else: echo $visits; endif; ?></div>
            </aside>
            <?php su_homes_update_home_views_count( get_the_ID() ); ?>
        </div>

        <h2 class="section-heading">Other similar properties:</h2>
        <?php if ( $query->have_posts() ) : ?>
            <ul class="properties-listing">
                <?php while ( $query->have_posts() ) : $query->the_post();
                    get_template_part( 'template-parts/home', 'item' );
                endwhile;
                wp_reset_postdata(); ?>
            </ul>
        <?php endif;
    endwhile;
endif; ?>

<?php get_footer(); ?>
