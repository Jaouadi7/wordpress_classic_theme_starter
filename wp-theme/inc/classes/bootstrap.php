<?php

/**
 *
 * Bootstraps the theme
 * Description: initializes the theme by setting up essential theme classes
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;

class Bootstrap
{

    use Singleton;

    protected function __construct()
    {
        // LOAD CLASSES
        Assets::get_instance();
        Menus::get_instance();
        Woocommerce::get_instance();
        Sidebars::get_instance();
        Widgets::get_instance();
        Patterns::get_instance();
        CPT::get_instance();
        Taxonomies::get_instance();
        Metaboxs::get_instance();

        // ADD ACTIONS & FILTERS FUNCTION
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // ACTIONS & FILTERS
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    // ADD THEME SUPPORT FEATURES FUNCTION
    public function setup_theme()
    {

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('widgets');
        add_theme_support('align-wide');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5',  ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);
        add_editor_style(THEME_CSS_DIR . '/editor.css');
        add_theme_support('wp-block-styles');
        add_theme_support('custom-logo', ['header-text' => ['site-title', 'site-description'], 'height' => 'auto', 'width' => '100%', 'flex-height' => true, 'flex-width' => true]);
        add_theme_support('custom-background', ['default-color' => '#FFF', 'default-image' => '', 'default-repeat' => 'no-repeat']);
        add_image_size('featured-thumbnail', 353, 233, true);
        remove_theme_support('core-block-patterns');
        add_theme_support('woocommerce');
    }
}
