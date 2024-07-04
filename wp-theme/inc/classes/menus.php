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

class Menus
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // ACTIONS & FILTERS
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {

        register_nav_menus([
            'primary-menu' => __('Navbar Menu', 'wpstartertheme'),
        ]);
    }

    // Get menu id by menu location
    public function get_menu_id(string $location)
    {

        $locations = get_nav_menu_locations();
        $menu_id = $locations[$location];

        // return menu_id if exists
        return ! empty($menu_id) ? $menu_id : '';
    }

    // Get menu items
    public function get_menu_items(array $menu_arr, int $menu_id)
    {

        $child_menu = [];

        if (! empty($menu_arr) && is_array($menu_arr)) {

            foreach ($menu_arr as $menu_item) {

                if ($menu_item->menu_item_parent === $menu_id) {

                    array_push($child_menu, $menu_item);
                }
            }

            // return menu items
            return $child_menu;
        }
    }
}
