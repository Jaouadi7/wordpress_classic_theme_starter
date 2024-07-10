<?php

/**
 *
 * Block patterns File
 * Description: Register theme blocks
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Patterns\Banner;
use WST_THEME\Inc\Traits\Singleton;


class Patterns
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }


    public function setup_hooks()
    {

        // ACTIONS & FILTERS
        add_action('init', [$this, 'register_block_categories']);
        add_action('init', [$this, 'register_block_patterns']);
    }

    public function register_block_categories()
    {

        $pattern_categories = ['theme' => __('Theme', 'wpstartertheme')];

        if (! empty($pattern_categories) && is_array($pattern_categories)) {

            foreach ($pattern_categories as $pattern_category => $pattern_category_label) {

                register_block_pattern_category($pattern_category, ['label' => $pattern_category_label]);
            }
        }
    }

    public function register_block_patterns()
    {

        Banner::get_instance()->register();
    }
}
