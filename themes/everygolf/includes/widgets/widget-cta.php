<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EveryGolf_CTA_Widget extends WP_Widget {
    public function __construct()
    {
        $everygolf_cta_widget_ops = array(
            'classname' => 'cta-widget',
            'description' => esc_html__('Widget hiển thị tiêu đề và các nút kêu gọi hành động.', 'everygolf'),
        );

        parent::__construct('cta-widget', 'My Theme: CTA Widget', $everygolf_cta_widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ): void {
        echo $args['before_widget'];

        $menu  = !empty($instance['menu']) ? absint($instance['menu']) : '';

        if ( ! empty( $instance['title'] ) ) {
            $allowed_tags = array(
                'br' => array(),
            );
            echo $args['before_title'] . wp_kses( $instance['title'], $allowed_tags ) . $args['after_title'];
        }

        if ( !empty($menu) && is_nav_menu($menu) ) :
    ?>
        <div class="title-btn wow fadeInUp">
            <?php
            wp_nav_menu(array(
                'menu' => $menu,
                'container' => false,
                'items_wrap' => '%3$s',
                'fallback_cb' => false,
                'depth' => 1,
                'walker' => new EveryGolf_CTA_Menu_Walker(),
            ));
            ?>
        </div>
    <?php
        endif;

        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    function form( $instance ): void {
        $allowed_html = array(
            'br' => array(),
        );

        $defaults = array(
            'title' => wp_kses( __( "Let's choose <br>your service", "everygolf" ), $allowed_html )
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        // get nav menu
        $menu = !empty($instance['menu']) ? $instance['menu'] : '';
        $menus = wp_get_nav_menus();
    ?>
        <!-- Title Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php esc_html_e( 'Tiêu đề:', 'everygolf' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>

        <!-- Nav -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('menu')); ?>">Chọn menu hiển thị:</label>

            <select class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('menu')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('menu')); ?>"
            >
                <option value="">-- <?php esc_html_e( 'Chọn menu', 'everygolf' ); ?> --</option>

                <?php foreach ( $menus as $nav ): ?>
                    <option value="<?php echo esc_attr( $nav->term_id ); ?>" <?php selected( $menu, $nav->term_id ); ?>>
                        <?php echo esc_html( $nav->name ); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
    <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    function update( $new_instance, $old_instance ): array {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? wp_kses_post($new_instance['title']) : '';
        $instance['menu'] = (!empty($new_instance['menu'])) ? absint($new_instance['menu']) : '';

        return $instance;
    }
}

// Register social widget
function everygolf_register_cta_widget(): void {
    register_widget( 'EveryGolf_CTA_Widget' );
}

add_action( 'widgets_init', 'everygolf_register_cta_widget' );

// custom walker for CTA menu
class EveryGolf_CTA_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0): void
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', array_filter($classes));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $attributes  = ' class="btn btn-icon-right"';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $output .= '<a' . $attributes . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '<span><i class="icon-arrow-right"></i></span>';
        $output .= '</a>';
    }
}