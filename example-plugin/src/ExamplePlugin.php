<?php

namespace ExamplePlugin\Controllers;

use ExamplePlugin\Controllers\Admin\ExamplePluginAdmin;
use ExamplePlugin\Controllers\Front\ExamplePluginPublic;
use ExamplePlugin\Core\HookLoader;
use ExamplePlugin\Core\Multilangual;


/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 */
class ExamplePlugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @access   protected
	 * @var      HookLoader $loader Maintains and registers all hooks for the plugin.
	 */
	protected HookLoader $loader;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 */
	private function load_dependencies() {
		$this->loader = new HookLoader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 */
	private function set_locale() {

		$plugin_i18n = new Multilangual();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run() {
		$this->loader->run();
	}


	/**
	 * Register all the hooks related to the admin area functionality of the plugin.
	 */
	private function define_admin_hooks() {

		$plugin_admin = new ExamplePluginAdmin();

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all the hooks related to the public-facing functionality of the plugin.
	 */
	private function define_public_hooks() {

		$plugin_public = new ExamplePluginPublic();

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}
}
