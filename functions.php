<?php

/**
 * Functions File 
 * @package wpstartertheme
 *
 */

require_once(untrailingslashit(get_template_directory() . '/inc/constants.php'));
require_once(untrailingslashit(get_template_directory() . '/inc/helpers/autoloader.php'));
require_once(untrailingslashit(get_template_directory() . '/inc/helpers/template-tags.php'));

// THEME CLASSES
function get_theme_instance()
{
    \WST_THEME\Inc\Classes\Bootstrap::get_instance();
}

get_theme_instance();
