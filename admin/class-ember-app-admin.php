<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.triptyk.eu
 * @since      1.0.0
 *
 * @package    Ember_App
 * @subpackage Ember_App/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ember_App
 * @subpackage Ember_App/admin
 * @author     gilles BERTRAND <gilles@triptyk.eu>
 */
class Ember_App_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

/**
 *  The options name to be used in this plugin
 * 
 *  @since 		1.0.0
 *  @access 	private
 *  @var 					string		$option_name		Option name of this plugin
 */
private $option_name='ember_app';


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ember_App_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ember_App_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ember-app-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ember_App_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ember_App_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ember-app-admin.js', array( 'jquery' ), $this->version, false );

	}


	public function add_menu_page() {
	
		$this->plugin_screen_hook_suffix = add_menu_page(
			__( 'Ember app Settings', 'ember-app' ),
			__( 'Ember App', 'ember-app' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	}

public function register_settings(){
	add_settings_section(
		$this->option_name . '_general',
		__( 'General', 'outdated-notice' ),
		array( $this, $this->option_name . '_general_cb' ),
		$this->plugin_name
	);

	add_settings_field(
		$this->option_name . '_URI',
		__( 'Ember app URL', 'ember_app' ),
		array( $this, $this->option_name . '_uri_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_uri' )
	);

	// add_settings_field(
	// 	$this->option_name . '_day',
	// 	__( 'Post is outdated after', 'outdated-notice' ),
	// 	array( $this, $this->option_name . '_day_cb' ),
	// 	$this->plugin_name,
	// 	$this->option_name . '_general',
	// 	array( 'label_for' => $this->option_name . '_day' )
	// );

	register_setting( $this->plugin_name, $this->option_name . '_uri', array( $this, $this->option_name ) );
	// register_setting( $this->plugin_name, $this->option_name . '_day', 'intval' );
}

/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function ember_app_general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'outdated-notice' ) . '</p>';
	}

	public function ember_app_uri_cb() {
		$uri = get_option($this->option_name.'_uri');
		?>
			<fieldset>
				<label>
					<input type="text" name="<?php echo $this->option_name . '_uri' ?>" id="<?php echo $this->option_name . '_uri' ?>" value="<?php $uri ?>">
					Insert the URL for your ember app
				</label>
			</fieldset>
		<?php
	}
	
	// public function ember_app_day_cb() {
	// 	echo '<input type="text" name="' . $this->option_name . '_day' . '" id="' . $this->option_name . '_day' . '"> '. __( 'days', 'outdated-notice' );
	// }

/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/ember-app-admin-display.php';
	}
}
