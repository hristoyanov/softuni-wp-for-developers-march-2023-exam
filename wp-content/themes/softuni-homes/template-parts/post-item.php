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
            <span class="property-date">Posted on: <?php the_date(); ?></span>
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
</li>