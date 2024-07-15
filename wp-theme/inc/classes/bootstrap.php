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
        Admin::get_instance();
        Assets::get_instance();
        Menus::get_instance();
        Woocommerce::get_instance();
        Sidebars::get_instance();
        Widgets::get_instance();
        Patterns::get_instance();
        CPT::get_instance();
        Taxonomies::get_instance();
        Metaboxs::get_instance();
        Archive_settings::get_instance();

        // ADD ACTIONS & FILTERS FUNCTION
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // ACTIONS & FILTERS
        $this->cleanup_wp_installation();
        $this->fix_wp_issues();
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    // Remove unused wp features
    public function cleanup_wp_installation()
    {

        // Remove emoji support
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        // If not need blog feature and remove RSS links
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'feed_links', 2);

        // Remove wp-embed
        add_action('wp_footer', function () {
            wp_dequeue_script('wp-embed');
        });

        add_action('wp_enqueue_scripts', function () {

            // Remove block library css
            wp_dequeue_script('wp-block-library');
            wp_enqueue_style('comment-reply');
        });

        // Note: These following lines need put in wp-config.php
        // define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true ); // skip add other wp default themes
        // define( 'WP_POST_REVISIONS', 5 ); // Set default number revisions for posts
        //define('EMPTY_TRASH_DAYS', 7); // set number days to automatically empty the trash

    }

    public function fix_wp_issues()
    {

        // Fix url fuzzy matching for deleting posts
        add_filter('redirect_cononical', function ($redirect_url) {

            return is_404() ? false : $redirect_url;
        });
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
