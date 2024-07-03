<?php

/**
 *
 * Autolder Helper File
 * Description: Autoload theme classes
 * @package wpstartertheme
 *
 */


namespace WST_THEME\Inc\Helpers;

function autoloader($resource = '')
{


    $resource_path  = false;
    $namespace_root = 'WST_THEME\\';
    $resource       = trim($resource, '\\');

    if (empty($resource) || strpos($resource, '\\') === false || strpos($resource, $namespace_root) !== 0) {
        return;
    }

    $resource = str_replace($namespace_root, '', $resource);

    $path = explode(
        '\\',
        str_replace('_', '-', strtolower($resource))
    );


    if (empty($path[0]) || empty($path[1])) {
        return;
    }

    $directory = '';
    $file_name = '';

    if ('inc' === $path[0]) {

        switch ($path[1]) {

            case 'traits':
                $directory = 'traits';
                $file_name = trim(strtolower($path[2]));
                break;

            default:
                $directory = 'classes';
                $file_name = trim(strtolower($path[2]));
                break;
        }

        $resource_path = sprintf('%s/inc/%s/%s.php', untrailingslashit(get_template_directory()), $directory, $file_name);
    }

    $is_valid_file = validate_file($resource_path);

    if (! empty($resource_path) && file_exists($resource_path) && (0 === $is_valid_file || 2 === $is_valid_file)) {
        require_once($resource_path); // phpcs:ignore
    }
}

spl_autoload_register('\WST_THEME\Inc\Helpers\autoloader');
