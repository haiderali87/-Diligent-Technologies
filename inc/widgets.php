<?php
// inc/widgets.php
if ( ! class_exists( 'DT_Services_Widget' ) ) {
    class DT_Services_Widget extends WP_Widget {

        public function __construct() {
            parent::__construct(
                'dt_services_widget',
                __( 'Services List', 'diligent-technologies-theme' ),
                array( 'description' => __( 'List of recent services', 'diligent-technologies-theme' ) )
            );
        }

        public function widget( $args, $instance ) {
            echo $args['before_widget'];

            $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Our Services', 'diligent-technologies-theme' );
            echo $args['before_title'] . esc_html( $title ) . $args['after_title'];

            $count = ! empty( $instance['count'] ) ? intval( $instance['count'] ) : 5;
            $q = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => $count ) );

            if ( $q->have_posts() ) {
                echo '<ul class="list-unstyled">';
                while ( $q->have_posts() ) {
                    $q->the_post();
                    printf(
                        '<li><a href="%1$s">%2$s</a></li>',
                        esc_url( get_permalink() ),
                        esc_html( get_the_title() )
                    );
                }
                echo '</ul>';
            } else {
                echo '<p>' . esc_html__( 'No services found', 'diligent-technologies-theme' ) . '</p>';
            }
            wp_reset_postdata();

            echo $args['after_widget'];
        }

        public function form( $instance ) {
            $title = isset( $instance['title'] ) ? $instance['title'] : __( 'Our Services', 'diligent-technologies-theme' );
            $count = isset( $instance['count'] ) ? intval( $instance['count'] ) : 5;
            ?>
            <p>
                <label><?php esc_html_e( 'Title:' ); ?></label>
                <input class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
            </p>
            <p>
                <label><?php esc_html_e( 'Number of services:' ); ?></label>
                <input class="tiny-text" name="<?php echo esc_attr($this->get_field_name('count')); ?>" value="<?php echo esc_attr($count); ?>">
            </p>
            <?php
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['count'] = intval( $new_instance['count'] );
            return $instance;
        }
    }

    add_action( 'widgets_init', function(){
        register_widget( 'DT_Services_Widget' );
    } );
}
