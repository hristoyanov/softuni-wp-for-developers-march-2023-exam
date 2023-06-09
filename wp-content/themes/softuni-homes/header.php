<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php get_bloginfo( 'title' ); ?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="site-wrapper">
		<header class="site-header">
            <?php if ( is_home() ) : ?>
			    <h1 class="site-title">
                    <a href="<?php echo esc_url( get_home_url() ); ?>">Properties Offers</a>
                </h1>
            <?php else : ?>
                <p class="site-title">
                    <a href="<?php echo esc_url( get_home_url() ); ?>">Properties Offers</a>
                </p>
            <?php endif;
            if ( is_user_logged_in() ) : ?>
            <div class="user-info">
                Logged in as:
                <span><?php echo wp_get_current_user()->display_name; ?></span>
            </div>
            <?php endif; ?>
		</header>
        
        <div class="header-nav-menu">
            <?php
            if ( has_nav_menu( 'primary_menu' ) ) :
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary_menu',
                    )
                );
            endif;
            ?>
        </div>