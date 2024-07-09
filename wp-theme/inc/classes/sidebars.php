<?php

/**
 *
 * Assets File
 * Description: Register the frontend scripts & styles
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;

class Sidebars
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // ACTIONS & FILTERS
        add_action('widgets_init', [$this, 'register_theme_sidebars']);
    }

    public function register_theme_sidebars()
    {

        // register default sidebar
        register_sidebar([
            'name' => __('Default Sidebar', 'wpstartertheme'),
            'id' => 'default-sidebar',
            'before_widget' => '<div class="default-sidebar-container">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="sidebar-title">',
            'after_title' => '</h4>'
        ]);
    }
}
