<?php

/**
 *
 * Custom Post Type File
 * Description: Register Custom Post types
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;

class CPT
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // ACTIONS & FILTERS


        // METHODS
    }
}
