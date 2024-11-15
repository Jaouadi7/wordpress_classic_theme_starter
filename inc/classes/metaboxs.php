<?php

/**
 *
 * Metaboxs File
 * Description: Register Metabox fields
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;

class Metaboxs
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
