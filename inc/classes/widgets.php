<?php

/**
 *
 * Widget File
 * Description: Register widgets
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;


class Widgets
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }


    protected function setup_hooks()
    {

        // ACTIONS & FILTERS
        add_action('widgets_init', [$this, 'register_copyrights_widget']);
    }

    public function register_copyrights_widget()
    {

        register_widget('WST_THEME\Inc\Widgets\Copyrights');
    }
}
