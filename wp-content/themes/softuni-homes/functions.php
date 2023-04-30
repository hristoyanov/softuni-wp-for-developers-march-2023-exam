<?php

/**
 * This function takes care of handling the assets with enqueue
 *
 * @return void
 */

function su_homes_assets() {
    wp_enqueue_style( 'softuni-homes', get_stylesheet_directory_uri() . '/css/master.css', array(), filemtime(  get_template_directory() . '/css/master.css' ) );
}
add_action( 'wp_enqueue_scripts', 'su_homes_assets' );


/**
 * Register header/footer menus
 *
 * @return void
 */
function su_homes_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'softuni' ),
        'footer_menu'  => __( 'Footer Menu', 'softuni' ),
    ) );
}
add_action( 'after_setup_theme', 'su_homes_register_nav_menu', 0 );

/**
 * Filter for oldschool page/post editing
 *
 * @return void
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
remove_filter( 'the_content', 'wpautop' );

?>
