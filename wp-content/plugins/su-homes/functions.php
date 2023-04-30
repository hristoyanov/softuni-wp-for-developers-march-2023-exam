<?php

/**
 * Plugin resourse enqueus
 */
function su_homes_enqueue_scripts() {
	wp_enqueue_script( 'softuni-script', plugins_url( 'assets/scripts/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'softuni-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'su_homes_enqueue_scripts' );

/**
 * Like functionality for Home CPT
 *
 * @return void
 */
function su_home_like_item() {
	$home_id = esc_attr( $_POST['home_id'] );

	$like_number = get_post_meta( $home_id, 'likes', true );

    if ( empty( $like_number ) ) {
        update_post_meta( $home_id, 'likes', 1 );
    } else {
        $like_number = $like_number + 1;
        update_post_meta( $home_id, 'likes', $like_number );
    }

    wp_die();
}
add_action( 'wp_ajax_nopriv_su_home_like_item', 'su_home_like_item' );
add_action( 'wp_ajax_su_home_like_item', 'su_home_like_item' );


/**
 * Update views count post meta
 *
 * @param [type] $home_id
 * @return void
 */
function su_homes_update_home_views_count( $id ) {
    if ( empty( $id ) ) {
        return;
    }
    // if ( ! is_single( 'job' ) ) {
    //     return;
    // }

    $visit_count = get_post_meta( $id, 'visits_count', true );

    if ( ! empty( $visit_count ) ) {
        $visit_count = $visit_count + 1;

        update_post_meta( $id, 'visits_count', $visit_count );
    } else {
        update_post_meta( $id, 'visits_count', 1 );
    }
}

/**
 * Add current year to content
*
* @param [type] $content
* @return void
*/
function add_current_year_to_content( $content ) {
    if ( get_post_type() == 'page' ) {
        $year = date( 'Y' );
        return $content . "<p>Data for: {$year}. (From basic filter)</p>" ;
    }
    return $content;
}
add_filter( 'the_content', 'add_current_year_to_content', 10 );
