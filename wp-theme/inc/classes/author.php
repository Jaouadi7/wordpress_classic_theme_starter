<?php

/**
 *
 * Author File
 * Description: Author Features
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;

class Author
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // FILTERS & ACTIONS

    }

    // Checks to see if the specified user id has a uploaded the image via wp_admin
    public function is_avatar_uploaded_via_wp_admin($gravatar_url)
    {

        $parsed_url = wp_parse_url($gravatar_url);

        $query_args = ! empty($parsed_url['query']) ? $parsed_url['query'] : '';

        // If query args is empty means, user has uploaded gravatar.
        return empty($query_args);
    }

    // Check if the gravatar is uploaded returns true.
    public function has_gravatar($user_email)
    {

        $gravatar_url = get_avatar_url($user_email);

        if ($this->is_avatar_uploaded_via_wp_admin($gravatar_url)) {
            return true;
        }

        $gravatar_url = sprintf('%s&d=404', $gravatar_url);

        // Make a request to $gravatar_url and get the header
        $headers = @get_headers($gravatar_url);

        // If request status is 200, which means user has uploaded the avatar on gravatar site
        return preg_match("|200|", $headers[0]);
    }
}
