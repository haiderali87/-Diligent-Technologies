<?php
// inc/post-types.php
if ( ! function_exists( 'dt_register_services_cpt' ) ) {
    function dt_register_services_cpt() {

        $labels = array(
            'name'                  => _x( 'Services', 'Post Type General Name', 'diligent-technologies-theme' ),
            'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'diligent-technologies-theme' ),
            'menu_name'             => __( 'Services', 'diligent-technologies-theme' ),
            'name_admin_bar'        => __( 'Service', 'diligent-technologies-theme' ),
            'add_new'               => __( 'Add New', 'diligent-technologies-theme' ),
            'add_new_item'          => __( 'Add New Service', 'diligent-technologies-theme' ),
            'edit_item'             => __( 'Edit Service', 'diligent-technologies-theme' ),
            'new_item'              => __( 'New Service', 'diligent-technologies-theme' ),
            'view_item'             => __( 'View Service', 'diligent-technologies-theme' ),
            'view_items'            => __( 'View Services', 'diligent-technologies-theme' ),
            'search_items'          => __( 'Search Services', 'diligent-technologies-theme' ),
            'not_found'             => __( 'No services found', 'diligent-technologies-theme' ),
            'not_found_in_trash'    => __( 'No services found in Trash', 'diligent-technologies-theme' ),
            'all_items'             => __( 'All Services', 'diligent-technologies-theme' ),
            'archives'              => __( 'Service Archives', 'diligent-technologies-theme' ),
            'attributes'            => __( 'Service Attributes', 'diligent-technologies-theme' ),
            'featured_image'        => __( 'Service Image', 'diligent-technologies-theme' ),
            'set_featured_image'    => __( 'Set service image', 'diligent-technologies-theme' ),
            'remove_featured_image' => __( 'Remove service image', 'diligent-technologies-theme' ),
            'use_featured_image'    => __( 'Use as service image', 'diligent-technologies-theme' ),
            'insert_into_item'      => __( 'Insert into service', 'diligent-technologies-theme' ),
            'uploaded_to_this_item' => __( 'Uploaded to this service', 'diligent-technologies-theme' ),
        );

        $args = array(
            'label'                 => __( 'Service', 'diligent-technologies-theme' ),
            'description'           => __( 'Services offered by the company.', 'diligent-technologies-theme' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 10,
            'menu_icon'             => 'dashicons-hammer',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => true,
            'query_var'             => true,
            'rewrite'               => array(
                'slug'       => 'services',
                'with_front' => false,
            ),
            'capability_type'       => 'post',
            'has_archive'           => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
        );

        register_post_type( 'services', $args );
    }
    add_action( 'init', 'dt_register_services_cpt' );
}
