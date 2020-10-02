<?php 

function custom_post_types() {
    $labels = array(
        'name'                => _x( 'Slider Posts', 'Post Type General Name' ),
        'singular_name'       => _x( 'Slider Post', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Slider Posts' ),
        'parent_item_colon'   => __( 'Parent Slider Post' ),
        'all_items'           => __( 'All Slider Posts' ),
        'view_item'           => __( 'View Slider Post' ),
        'add_new_item'        => __( 'Add New Slider Post' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Slider Post' ),
        'update_item'         => __( 'Update Slider Post' ),
        'search_items'        => __( 'Search Slider Post' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    $args = array(
        'label'               => __( 'slider_post_type' ),
        'description'         => __( 'Slider Post Description' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'menu_icon'			  => 'dashicons-id-alt',
    );
    register_post_type( 'slider_post_type', $args );
}
add_action( 'init', 'custom_post_types');

