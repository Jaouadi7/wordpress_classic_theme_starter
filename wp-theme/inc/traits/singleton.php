<?php

/**
 *
 * Singleton File
 * Description: to make new instance classes and provied global point of access to that instance
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Traits;

trait Singleton
{

    public function __construct() {}

    public function __clone() {}

    public function __wakeup() {}

    final public static function get_instance()
    {

        static $instance = [];
        $called_class = get_called_class();

        if (! isset($instance[$called_class])) {

            $instance[$called_class] = new $called_class;

            do_action(sprintf('wst_theme_singleton_init%s', $called_class));
        }

        return $instance[$called_class];
    }
}
