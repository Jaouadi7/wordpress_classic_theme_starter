<?php

/**
 * Header File 
 * @package wpstartertheme
 *
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title><?php bloginfo('name') ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="theme-color" content="#c99b69">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- SOCIAL MEDIA METATAG  -->

    <!-- FACEBOOK OPEN GRAPH -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://website.local">
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:image" content="<?= get_template_directory_uri() . "/screenshot.png"; ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <!-- / END FACEBOOK OPEN GRAPH -->

    <!-- TWITTER ( X ) CARD -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@site_account">
    <meta name="twitter:creator" content="@individual_account">
    <meta name="twitter:url" content="https://website.local">
    <meta name="twitter:title" content="<?php bloginfo('name') ?>">
    <meta name="twitter:description" content="<?php bloginfo('description') ?>">
    <meta name="twitter:image" content="<?= get_template_directory_uri() . "/screenshot.png"; ?>">
    <!-- / END TWITTER ( X ) CARD  -->

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php

    function_exists('wp_body_open') ? wp_body_open() : do_action('wp_body_open');
