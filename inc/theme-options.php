<?php
// inc/theme-options.php
if ( ! function_exists( 'dt_register_acf_options_page' ) ) {
    function dt_register_acf_options_page() {
        if ( function_exists( 'acf_add_options_page' ) ) {
            acf_add_options_page( array(
                'page_title' => __( 'Theme Options', 'diligent-technologies-theme' ),
                'menu_title' => __( 'Theme Options', 'diligent-technologies-theme' ),
                'menu_slug'  => 'dt-theme-options',
                'capability' => 'manage_options',
                'redirect'   => false,
            ) );
        }
    }
    add_action( 'acf/init', 'dt_register_acf_options_page' );
}
