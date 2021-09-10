<?php

namespace ExamplePlugin\Core;

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 */
class HookLoader {

	/**
	 * The array of actions registered with WordPress.
	 */
	private array $actions = [];

	/**
	 * The array of filters registered with WordPress.
	 */
	private array $filters = [];

	/**
	 * The array of shortcodes registered with WordPress.
	 */
	private array $shortcodes = [];

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @param  string  $hook  The name of the WordPress action that is being registered.
	 * @param  object  $component  A reference to the instance of the object on which the action is defined.
	 * @param  string  $callback  The name of the function definition on the $component.
	 * @param  int  $priority  Optional. The priority at which the function should be fired. Default is 10.
	 * @param  int  $accepted_args  Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->actions[] = [
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		];
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @param  string  $hook  The name of the WordPress filter that is being registered.
	 * @param  object  $component  A reference to the instance of the object on which the filter is defined.
	 * @param  string  $callback  The name of the function definition on the $component.
	 * @param  int  $priority  Optional. The priority at which the function should be fired. Default is 10.
	 * @param  int  $accepted_args  Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter( string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1 ) {
		$this->filters[] = [
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		];
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @param  string  $tag
	 * @param  object  $component  A reference to the instance of the object on which the filter is defined.
	 * @param  string  $callback  The name of the function definition on the $component.
	 */
	public function add_shortcode( string $tag, object $component, string $callback ) {
		$this->shortcodes[] = [
			'tag'       => $tag,
			'component' => $component,
			'callback'  => $callback,
		];
	}

	/**
	 * Register the filters and actions with WordPress.
	 */
	public function run() {

		foreach ( $this->actions as $action ) {
			add_action( $action[ 'hook' ], [ $action[ 'component' ], $action[ 'callback' ] ], $action[ 'priority' ], $action[ 'accepted_args' ] );
		}

		foreach ( $this->filters as $filter ) {
			add_filter( $filter[ 'hook' ], [ $filter[ 'component' ], $filter[ 'callback' ] ], $filter[ 'priority' ], $filter[ 'accepted_args' ] );
		}

		foreach ( $this->shortcodes as $shortcode ) {
			add_shortcode( $shortcode[ 'tag' ], [ $shortcode[ 'component' ], $shortcode[ 'callback' ] ] );
		}

	}

}
