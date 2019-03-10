<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.triptyk.eu
 * @since      1.0.0
 *
 * @package    Ember_App
 * @subpackage Ember_App/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ember_App
 * @subpackage Ember_App/includes
 * @author     gilles BERTRAND <gilles@triptyk.eu>
 */
class Ember_App_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        $app_page = get_option('plugin_name_page');
      if (!$app_page||FALSE === get_post_status( $app_page )) {
          // Create post/page object
          error_log('page creation');
          $my_new_page = array(
              'post_title' => 'EMBER App Page',
              'post_content' => '',
              'post_status' => 'publish',
              'post_type' => 'page',
              'post_name'=>'ember-app-page'
          );
          // Insert the post into the database
          $app_page = wp_insert_post( $my_new_page );
          update_option('plugin_name_page',$app_page);
      }
    add_rewrite_rule('ember-app-page/?([^/]*)', 'index.php?pagename=ember-app-page', 'top');
    flush_rewrite_rules();
    }
    


}


function test_init(){
    
}
