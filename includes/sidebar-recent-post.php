<?php
// Register and load the widget
function exdos_load_recent_posts_widget() {
    register_widget('Exdos_Recent_Post');
}
add_action('widgets_init', 'exdos_load_recent_posts_widget');

// Creating the widget
class Exdos_Recent_Post extends WP_Widget {

    function __construct() {
        parent::__construct(
            'exdos_recent_post', // Base ID
            __('Exdos Recent Posts', 'exdos'), // Name
            array('description' => __('A widget to display recent posts with customization options.', 'exdos')) // Args
        );
    }

    // The front-end display of the widget
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $post_count = !empty($instance['post_count']) ? $instance['post_count'] : 5;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Query recent posts
        $recent_posts = new WP_Query(array(
            'posts_per_page' => $post_count,
            'post_status' => 'publish',
        ));

        if ($recent_posts->have_posts()) {
            echo '<ul class="exdos-recent-posts">';
            while ($recent_posts->have_posts()) {
                $recent_posts->the_post();
                echo '<li>';
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                if ($show_date) {
                    echo '<span class="post-date">' . get_the_date() . '</span>';
                }
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>' . __('No recent posts found.', 'exdos') . '</p>';
        }

        wp_reset_postdata();
        echo $args['after_widget'];
    }

    // Widget backend form
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'exdos');
        $post_count = !empty($instance['post_count']) ? $instance['post_count'] : 5;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;
        ?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'exdos'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<p>
    <label
        for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of posts to show:', 'exdos'); ?></label>
    <input class="tiny-text" id="<?php echo $this->get_field_id('post_count'); ?>"
        name="<?php echo $this->get_field_name('post_count'); ?>" type="number" step="1" min="1"
        value="<?php echo esc_attr($post_count); ?>" size="3" />
</p>
<p>
    <input class="checkbox" type="checkbox" <?php checked($show_date, true); ?>
        id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
    <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date?', 'exdos'); ?></label>
</p>
<?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['post_count'] = (!empty($new_instance['post_count'])) ? absint($new_instance['post_count']) : 5;
        $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }
}