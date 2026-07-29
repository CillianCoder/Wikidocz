<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Loads modular includes from inc/ directory.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once get_stylesheet_directory() . '/inc/admin-init.php';
require_once get_stylesheet_directory() . '/inc/template-tags.php';
require_once get_stylesheet_directory() . '/inc/filters.php';
require_once get_stylesheet_directory() . '/inc/nav.php';
require_once get_stylesheet_directory() . '/inc/related-posts.php';
require_once get_stylesheet_directory() . '/inc/template-functions.php';