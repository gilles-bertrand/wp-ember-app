<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.triptyk.eu
 * @since      1.0.0
 *
 * @package    Ember_App
 * @subpackage Ember_App/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ember_App
 * @subpackage Ember_App/public
 * @author     gilles BERTRAND <gilles@triptyk.eu>
 */
class Ember_App_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action('getMetaEmber',array($this,'getMetaEmber'));
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		$cssfiles=scandir(dirname(__FILE__).'/dist/assets/');
		foreach ($cssfiles as $file_name) {
			if(strpos($file_name,'.css')){
				wp_enqueue_style($this->plugin_name,plugin_dir_url( __FILE__ ) . 'dist/assets/'.$file_name,array(),$this->version,'all');
			}
		}

		// wp_enqueue_style( $this->plugin_name.'vendor', plugin_dir_url( __FILE__ ) . 'dist/assets/vendor-d41d8cd98f00b204e9800998ecf8427e.css', array(), $this->version, 'all' );
		// wp_enqueue_style( $this->plugin_name.'app', plugin_dir_url( __FILE__ ) . 'dist/assets/wp-ember-plugin-d41d8cd98f00b204e9800998ecf8427e.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		$jsfiles=scandir(dirname(__FILE__).'/dist/assets/');
		foreach ($jsfiles as $file_name) {
			if(strpos($file_name,'.js')){
				wp_enqueue_script($this->plugin_name.'-'.$file_name,plugin_dir_url( __FILE__ ) . 'dist/assets/'.$file_name,'',$this->version,true);
			}
		}
	}

	/**
	 * Public function find ember environement html and place it in our template
	 */
	public function getMetaEmber(){

		$metas = get_meta_tags(plugin_dir_url( __FILE__ ) . 'dist/index.html');
		foreach ($metas as $meta => $value) {
			if(strpos($meta,'config/environment') !== false){
				print '<meta name="'.$meta.'" content="'.$value.'">';
			}
		}
	}

		/**
	 * Creating custom Ember  app page template
	 *
	 * @since    1.0.0
	 */
	public function ember_app_template( $template ) {
		$my_page = get_option('plugin_name_page');
		$file_name = 'ember-app-page-template.php';
    if ( $my_page && is_page( $my_page ) ) {
        if ( locate_template( $file_name ) ) {
            $template = locate_template( $file_name );
        } else {
            // Template not found in theme's folder, use plugin's template as a fallback
            $template = plugin_dir_path( __FILE__ ) . $file_name;
        }
    }
    return $template;
	}
}
