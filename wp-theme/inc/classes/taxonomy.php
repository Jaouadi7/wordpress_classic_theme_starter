<?php

/**
 *
 * Taxonomy File
 * Description: Register taxomonoy for CPT
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;


class Taxonomy
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }


    protected function setup_hooks()
    {

        // ACTIONS & FILTERS
    }
}
