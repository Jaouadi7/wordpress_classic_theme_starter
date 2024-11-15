<?php

/**
 * Template tags file
 * Description: Helper Functions
 * @package wpstartertheme
 *
 */

// Custom post thumbnail with lazy loading attribute
function theme_get_the_post_thumbnail(int|null $post_id = null,  string $size = 'featured-image', array $additional_attr = [])
{

    if ($post_id === null) {
        $post_id = get_the_ID();
    }

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

// get the excerpt [ loop posts ]
function theme_get_the_post_excerpt(int $length = 50)
{

    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $length);
    $excerpt = substr($excerpt, 0, strpos($excerpt, '')) . '[...]';

    return $excerpt;
}

// More read button [ loop posts ]
function theme_get_the_post_read_more_btn()
{

    $read_more = sprintf('<a class="button read-more-btn" href="%1$s">%2$s</a>', get_permalink(get_the_ID()), __('Read More', 'wpstartertheme'));

    return $read_more;
}


// Pagination 
function theme_pagination() {}
