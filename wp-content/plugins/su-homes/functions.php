<?php

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
    
    if ( metadata_exists( 'home', $id, 'views_count' ) ) {
        $view_count = get_post_meta( $id, 'views_count', true );
    } else {
        $view_count = 0;
    }

    update_post_meta( $id, 'views_count', $view_count++ );
}
