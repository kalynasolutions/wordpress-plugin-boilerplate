<?php

namespace ExamplePlugin\Controllers\Front;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 */
class ExamplePluginPublic {

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'example-public-css', plugin_dir_url( __FILE__ ) . 'assets/public/css/example-public.css', [], null, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'example-public-js', plugin_dir_url( __FILE__ ) . 'assets/public/js/example-public.js', [ 'jquery' ], null, true );

	}

}
