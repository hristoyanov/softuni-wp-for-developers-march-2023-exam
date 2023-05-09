<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="property-meta">
        </div>
        <div>
            <?php the_content(); ?>
        </div>
        <div class="property-details">
            <span class="property-date">Posted on: <?php echo get_the_date(); ?></span>
            <span>| By: <?php the_author_posts_link(); ?></span>
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
</li>