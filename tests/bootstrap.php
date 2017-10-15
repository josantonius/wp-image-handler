<?php 
/**
 * Save images to WordPress.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/WP_Image
 * @since      1.0.2
 */

$loader = require __DIR__ . '/../src/bootstrap.php';

$loader->add('Josantonius\WP_Image\Test', __DIR__);

define('WP_CORE_DIR', '/tmp/wordpress/');

define('WP_TESTS_DIR', '/tmp/wordpress-tests-lib');

require_once WP_TESTS_DIR . '/includes/functions.php';

function _manually_load_environment() {

    switch_theme('twentyseventeen');

    //require __DIR__ . '/sample-plugin.php';
}

tests_add_filter('muplugins_loaded', '_manually_load_environment');

require_once WP_TESTS_DIR . '/includes/bootstrap.php';

