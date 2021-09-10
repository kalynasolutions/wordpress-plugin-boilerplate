<?php

/**
 * The plugin bootstrap file
 *
 * Plugin Name:       Example Plugin
 * Plugin URI:        http://example-plugin.test
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Artur Khylskyi
 * Author URI:        http://example-author.test
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       example-plugin
 * Domain Path:       /languages
 */

use ExamplePlugin\Controllers\ExamplePlugin;
use ExamplePlugin\Core\ActivationManager;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Autoload classes
 */
require_once 'vendor/autoload.php';

/**
 * Register activation hooks
 */
register_activation_hook( __FILE__, [ ActivationManager::class, 'activate' ] );
register_deactivation_hook( __FILE__, [ ActivationManager::class, 'deactivate' ] );
register_uninstall_hook( __FILE__, [ ActivationManager::class, 'uninstall' ] );

/**
 * Begins execution of the plugin.
 */
function run_example_plugin() {

	$plugin = new ExamplePlugin();
	$plugin->run();

}

run_example_plugin();
