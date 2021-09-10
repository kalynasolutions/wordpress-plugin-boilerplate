<?php

namespace ExamplePlugin\Core;

/**
 * Define the internationalization functionality.
 */
class Multilangual {


	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'example-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}


}
