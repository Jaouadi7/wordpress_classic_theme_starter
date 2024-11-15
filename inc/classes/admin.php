<?php

/**
 *
 * Admin File
 * Description: Customize Admin Dashboard
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;

class Admin
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // FILTERS & ACTIONS
        add_action('admin_menu', [$this, 'add_admin_menu']);
    }

    public function add_admin_menu()
    {

        // Theme options
        add_theme_page(
            __('Theme Options', 'wpstartertheme'),
            __('Theme Options', 'wpstartertheme'),
            'manage_options',
            'theme-options',
            [$this, 'theme_options_page']
        );

        // Theme Developer section
        add_menu_page(
            __('Developer', 'wpstartertheme'),
            __('Developer', 'wpstartertheme'),
            'manage_options',
            'theme-developer',
            [$this, 'developer_contact_page'],
            'dashicons-editor-code',
            110
        );

        // Submenu pages for theme developer section 
        add_submenu_page('theme-developer', 'Technical Support', 'Technical Support', 'manage_options', 'technical-support', [$this, 'developer_technical_support_section']);
    }

    public function theme_options_page()
    {
?>

        <h1><?php echo __('Theme Options', 'wpstartertheme'); ?></h1>
        <p><?php echo __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br> standard dummy text ever since the 1500s", 'wpstartertheme'); ?></p>
    <?php
    }

    public function developer_contact_page()
    {

    ?>

        <h1><?php echo __('Developer', 'wpstartertheme'); ?></h1>
        <p><?php echo __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br> standard dummy text ever since the 1500s", 'wpstartertheme'); ?></p>
<?php
    }

    public function developer_technical_support_section()
    {

        return;
    }
}
