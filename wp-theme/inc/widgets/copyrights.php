<?php

/**
 *
 * Copyrights Widget File
 * Description: Register copyrights widget [ build custom widget ]
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Widgets;

use WP_Widget;
use WST_THEME\Inc\Traits\Singleton;


class Copyrights extends WP_Widget
{

    use Singleton;

    public function __construct()
    {

        parent::__construct(

            'copyrights', // Base ID
            'Copyrights', // Widget  Name
            ['description' => __('Display Copyrights text', 'wpstartertheme')]

        );
    }

    public function widget($args, $instance)
    {

        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;

        if (! empty($title)) {
            echo $before_title . $title . $after_title;
        }

        echo $after_widget;
    }


    public function form($instance)
    {

        if (isset($instance['title'])) {

            $title = $instance['title'];
        } else {

            $title = 'Copyrights widget';
        }

?>

        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title: ', 'wpstartertheme'); ?></label>
            <input id="<?php echo $this->get_field_name('title'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" />
        </p>

<?php

    }

    public function update($new_instance, $old_instance)
    {

        $instance = [];

        $instance['title'] = (! empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
}
