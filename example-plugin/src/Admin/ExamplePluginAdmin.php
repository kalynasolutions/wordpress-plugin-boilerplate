<?php

namespace ExamplePlugin\Controllers\Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 */
class ExamplePluginAdmin {

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'example-admin-css', plugin_dir_url( __FILE__ ) . 'assets/admin/css/example-admin.css', [], null, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'example-admin-js', plugin_dir_url( __FILE__ ) . 'assets/admin/js/example-admin.js', [ 'jquery' ], null, true );

	}

}
