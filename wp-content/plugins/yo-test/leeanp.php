<?php namespace YoTest;
/**
 * Plugin Name: Moxie YoTest
 * Description: Barebones modular WordPress plugin.
 * Version: 0.1.0
 * Author: Moxie
 * Author URI: http://getmoxied.net
 * Text Domain: yotest
 */

// General constants.
define( 'YOTEST_PLUGIN_NAME', 'YoTest Plugin' );
define( 'YOTEST_PLUGIN_VERSION', '0.1.0' );
define( 'YOTEST_MINIMUM_WP_VERSION', '4.3.1' );
define( 'YOTEST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'YOTEST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'YOTEST_TEXT_DOMAIN', 'yotest' );

// Load Composer autoloader.
require_once YOTEST_PLUGIN_DIR . 'vendor/autoload.php';

// Run the plugin setup.
require_once YOTEST_PLUGIN_DIR . 'PluginSetup.php';
$class_name = __NAMESPACE__ . '\\PluginSetup';
register_activation_hook( __FILE__, array( $class_name, 'maybe_deactivate' ) );
register_deactivation_hook( __FILE__, array( $class_name, 'flush_rewrite_rules' ) );
$class_name::init();
