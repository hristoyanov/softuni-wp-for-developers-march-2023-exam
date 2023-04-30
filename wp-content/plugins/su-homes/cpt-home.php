<?php
/**
 * Register a custom post type called "home".
 *
 * @see get_post_type_labels() for label keys.
 */
function softuni_home_cpt() {
	$labels = array(
		'name'                  => _x( 'Homes', 'Post type general name', 'softuni' ),
		'singular_name'         => _x( 'Home', 'Post type singular name', 'softuni' ),
		'menu_name'             => _x( 'Homes', 'Admin Menu text', 'softuni' ),
		'name_admin_bar'        => _x( 'Home', 'Add New on Toolbar', 'softuni' ),
		'add_new'               => __( 'Add New', 'softuni' ),
		'add_new_item'          => __( 'Add New Home', 'softuni' ),
		'new_item'              => __( 'New Home', 'softuni' ),
		'edit_item'             => __( 'Edit Home', 'softuni' ),
		'view_item'             => __( 'View Home', 'softuni' ),
		'all_items'             => __( 'All Homes', 'softuni' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'homes' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'       => true
	);

	register_post_type( 'home', $args );

    flush_rewrite_rules();
}
add_action( 'init', 'softuni_home_cpt' );


/**
 * Register a 'country' taxonomy for post type 'home'.
 *
 */
function softuni_home_country_taxonomy() {
    $labels = array(
		'name'              => _x( 'Country', 'taxonomy general name', 'softuni' ),
		'singular_name'     => _x( 'Country', 'taxonomy singular name', 'softuni' ),
		'search_items'      => __( 'Search Countries', 'softuni' ),
		'all_items'         => __( 'All Countries', 'softuni' ),
		'parent_item'       => __( 'Parent Country', 'softuni' ),
		'parent_item_colon' => __( 'Parent Country:', 'softuni' ),
		'edit_item'         => __( 'Edit Country', 'softuni' ),
		'update_item'       => __( 'Update Country', 'softuni' ),
		'add_new_item'      => __( 'Add New Country', 'softuni' ),
		'new_item_name'     => __( 'New Country Name', 'softuni' ),
		'menu_name'         => __( 'Country', 'softuni' ),
	);

    $args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'      => true
	);


    register_taxonomy( 'country', 'home', $args );
}
add_action( 'init', 'softuni_home_country_taxonomy' );

/**
 * Register a 'location' taxonomy for post type 'home'.
 *
 */
function softuni_home_location_taxonomy() {
    $labels = array(
		'name'              => _x( 'Location', 'taxonomy general name', 'softuni' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name', 'softuni' ),
		'search_items'      => __( 'Search Locations', 'softuni' ),
		'all_items'         => __( 'All Locations', 'softuni' ),
		'parent_item'       => __( 'Parent Location', 'softuni' ),
		'parent_item_colon' => __( 'Parent Location:', 'softuni' ),
		'edit_item'         => __( 'Edit Location', 'softuni' ),
		'update_item'       => __( 'Update Location', 'softuni' ),
		'add_new_item'      => __( 'Add New Location', 'softuni' ),
		'new_item_name'     => __( 'New Location Name', 'softuni' ),
		'menu_name'         => __( 'Location', 'softuni' ),
	);

    $args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'      => true
	);


    register_taxonomy( 'location', 'home', $args );
}
add_action( 'init', 'softuni_home_location_taxonomy' );
