<?php

/**
 * Template tags file
 * Description: Helper Functions
 * @package wpstartertheme
 *
 */

// Custom post thumbnail with lazy loading attribute
function get_the_post_custom_thumbnail(int $post_id = get_the_ID(),  string $size = 'featured-image', array $additional_attr = [])
{

    $custom_the_post_thumbnail = '';

    if (has_post_thumbnail($post_id)) {

        $default_attr = [
            'loading' => 'lazy'
        ];

        $attrs = array_merge($default_attr, $additional_attr);

        $custom_the_post_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size, false, $attrs);
    }

    return $custom_the_post_thumbnail;
}
