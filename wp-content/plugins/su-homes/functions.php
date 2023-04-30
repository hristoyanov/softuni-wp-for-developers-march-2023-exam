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

    $visit_count = get_post_meta( $id, 'visits_count', true );

    if ( ! empty( $visit_count ) ) {
        $visit_count = $visit_count + 1;

        update_post_meta( $id, 'visits_count', $visit_count );
    } else {
        update_post_meta( $id, 'visits_count', 1 );
    }
}
