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

class Assets
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // FILTERS & ACTIONS
        add_action('wp_enqueue_scripts', [$this, 'load_styles']);
        add_action('wp_enqueue_scripts', [$this, 'load_scripts']);
    }

    public function load_styles()
    {

        wp_register_style('bulma', THEME_CSS_DIR . '/assets/bulma.css', [], false, 'all');
        wp_register_style('poppins', THEME_FONTS_DIR . '/poppins/fonts.css', [], false, 'all');
        wp_register_style('lineawesome', THEME_FONTS_DIR . '/lineawesome/all.css', [], false, 'all');
        wp_register_style('core', THEME_CSS_DIR . '/core.css', ['bulma'], filemtime(get_template_directory() . '/frontend/dist/css/core.css'), 'all');

        wp_enqueue_style('bulma');
        wp_enqueue_style('poppins');
        wp_enqueue_style('lineawesome');
        wp_enqueue_style('core');
    }

    public function load_scripts()
    {

        wp_register_script('script', THEME_JS_DIR . '/app.bundle.js', [], filemtime(get_template_directory() . '/frontend/dist/js/app.bundle.js'), 'all');

        wp_enqueue_script('script');

        // SUPPORT IE VERSIONS < 9
        wp_register_script('html5shiv', THEME_JS_DIR . '/assets/html5shiv.min.js', [], false, false);
        wp_register_script('respond', THEME_JS_DIR . '/assets/respond.min.js', [], false, false);


        wp_enqueue_script('html5shiv');
        wp_enqueue_script('respond');

        wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
        wp_script_add_data('respond', 'conditional', 'lt IE 9');

        wp_localize_script('script', 'siteConfig', [

            'ajaxUrl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('loadmore_posts_nounce'),
        ]);
    }
}
