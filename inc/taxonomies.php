<?php
// inc/taxonomies.php
if ( ! function_exists( 'dt_register_service_category_taxonomy' ) ) {
    function dt_register_service_category_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Service Categories', 'taxonomy general name', 'diligent-technologies-theme' ),
            'singular_name'              => _x( 'Service Category', 'taxonomy singular name', 'diligent-technologies-theme' ),
            'search_items'               => __( 'Search Service Categories', 'diligent-technologies-theme' ),
            'all_items'                  => __( 'All Service Categories', 'diligent-technologies-theme' ),
            'parent_item'                => __( 'Parent Category', 'diligent-technologies-theme' ),
            'parent_item_colon'          => __( 'Parent Category:', 'diligent-technologies-theme' ),
            'edit_item'                  => __( 'Edit Category', 'diligent-technologies-theme' ),
            'update_item'                => __( 'Update Category', 'diligent-technologies-theme' ),
            'add_new_item'               => __( 'Add New Category', 'diligent-technologies-theme' ),
            'new_item_name'              => __( 'New Category Name', 'diligent-technologies-theme' ),
            'menu_name'                  => __( 'Service Categories', 'diligent-technologies-theme' ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
            'show_in_rest'          => true,
            'rewrite'               => array( 'slug' => 'service-category' ),
        );

        register_taxonomy( 'service-category', array( 'services' ), $args );
    }
    add_action( 'init', 'dt_register_service_category_taxonomy' );
}
