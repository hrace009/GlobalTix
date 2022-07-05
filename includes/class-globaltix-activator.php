<?php

/**
 * Fired during plugin activation
 *
 * @link       https://youtube.com/hrace009
 * @since      1.0.0
 *
 * @package    Globaltix
 * @subpackage Globaltix/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Globaltix
 * @subpackage Globaltix/includes
 * @author     Harris Marfel <hrace009@gmail.com>
 */
class Globaltix_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate(): void {
		$globaltix = new Globaltix();
		register_activation_hook(__FILE__, $globaltix->add_api_page());
	}

}
