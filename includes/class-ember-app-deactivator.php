<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://www.triptyk.eu
 * @since      1.0.0
 *
 * @package    Ember_App
 * @subpackage Ember_App/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *à
 * @since      1.0.0
 * @package    Ember_App
 * @subpackage Ember_App/includes
 * @author     gilles BERTRAND <gilles@triptyk.eu>
 */
class Ember_App_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$pageToDelete= get_page_by_title('EMBER App Page');
		wp_delete_post( $pageToDelete->ID);
		delete_option('plugin_name_page');
		error_log("remove plugin");
	}

}
