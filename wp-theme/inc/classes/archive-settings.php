<?php

/**
 *
 * Archive Settings File
 * Description: Set Archive Settings
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;

class Archive_settings
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // FILTERS & ACTIONS

        add_filter('pre_get_posts', [$this, 'change_archive_posts_per_page']);
    }


    public function change_archive_posts_per_page($query)
    {

        if ($query->is_archive && ! is_admin() && $query->is_main_query()) {

            $query->set('posts_per_page', strval(12));
        } elseif (! empty($query->query_vars['s']) && ! is_admin()) {

            // For search result page only
            $query->set('posts_per_page', strval(6));
        }

        return $query;
    }
}
