<?php

/**
 *
 * Banner Block File
 * Description: Register banner block pattern [ build custom block pattern ]
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Patterns;

use WST_THEME\Inc\Traits\Singleton;


class Banner
{

    use Singleton;

    public function __construct() {}

    public function register()
    {

        if (function_exists('register_block_pattern')) {

            register_block_pattern(

                'theme/banner',

                [
                    'title' => __('Banner', 'wpstartertheme'),
                    'description' => __('Display Banner text section', 'wpstartertheme'),
                    'categories' => ['theme'],
                    'content' => $this->build()
                ]

            );
        }
    }

    public function build()
    {

        ob_start();

        get_template_part('template_parts/patterns/banner');

        $banner_content = ob_get_contents();

        ob_clean();

        return $banner_content;
    }
}
