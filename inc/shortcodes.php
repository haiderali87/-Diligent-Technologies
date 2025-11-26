<?php
// inc/shortcodes.php
if ( ! function_exists( 'dt_services_shortcode' ) ) {
    function dt_services_shortcode( $atts ) {
        $atts = shortcode_atts( array(
            'count'    => 6,
            'category' => '',
            'layout'   => 'grid', // grid | list
        ), $atts, 'services' );

        $args = array(
            'post_type'      => 'services',
            'posts_per_page' => intval( $atts['count'] ),
        );

        if ( ! empty( $atts['category'] ) ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'service-category',
                    'field'    => 'slug',
                    'terms'    => array_map( 'trim', explode( ',', $atts['category'] ) ),
                ),
            );
        }

        $q = new WP_Query( $args );
        ob_start();

        if ( $q->have_posts() ) {
            if ( $atts['layout'] === 'grid' ) {
                echo '<div class="row row-cols-1 row-cols-md-3 g-4 dt-services-grid">';
            } else {
                echo '<div class="dt-services-list">';
            }

            while ( $q->have_posts() ) {
                $q->the_post();
                // Minimal markup here — use template part in theme later
                echo '<div class="col">';
                  echo '<div class="card h-100">';
                    if ( has_post_thumbnail() ) {
                        echo '<a href="'.esc_url( get_permalink() ).'">';
                        the_post_thumbnail( 'medium', array( 'class' => 'card-img-top img-fluid' ) );
                        echo '</a>';
                    }
                    echo '<div class="card-body">';
                      echo '<h5 class="card-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h5>';
                      echo '<p class="card-text">'.wp_kses_post( wp_trim_words( get_the_excerpt() ?: get_the_content(), 25 ) ).'</p>';
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>' . esc_html__( 'No services found', 'diligent-technologies-theme' ) . '</p>';
        }

        wp_reset_postdata();
        return ob_get_clean();
    }
    add_shortcode( 'services', 'dt_services_shortcode' );
}
