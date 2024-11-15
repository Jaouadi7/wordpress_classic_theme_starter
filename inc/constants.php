<?php

/**
 *
 * Constants File
 * Description: This file is to define the theme constant variable
 * @package wpstartertheme
 *
 */

! defined('DEVELEPMENT_MODE') && define('DEVELEPMENT_MODE', TRUE);
! defined('THEME_CSS_DIR') && define('THEME_CSS_DIR', untrailingslashit(get_template_directory_uri() . '/frontend/dist/css'));
! defined('THEME_JS_DIR') && define('THEME_JS_DIR', untrailingslashit(get_template_directory_uri() . '/frontend/dist/js'));
! defined('THEME_FONTS_DIR') && define('THEME_FONTS_DIR', untrailingslashit(get_template_directory_uri() . '/frontend/dist/fonts'));
! defined('THEME_IMAGES_DIR') && define('THEME_IMAGES_DIR', untrailingslashit(get_template_directory_uri() . '/frontend/dist/imgs'));
