<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://youtube.com/hrace009
 * @since      1.0.0
 *
 * @package    Globaltix
 * @subpackage Globaltix/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Globaltix
 * @subpackage Globaltix/admin
 * @author     Harris Marfel <hrace009@gmail.com>
 */
class Globaltix_Admin {

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
	 * The Globaltix settings field of this plugin.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string $globaltix_settings The current PW settings field of this plugin.
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	private $globaltix_settings;

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
		$this->globaltix_settings = get_option('globaltix_settings');

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
		 * defined in Globaltix_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Globaltix_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/globaltix-admin.css', array(), $this->version, 'all' );

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
		 * defined in Globaltix_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Globaltix_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/globaltix-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register plugin Admin menu side bar.
	 *
	 * @since   1.0.0
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	public function admin_menu()
	{
		$GlobaltixPage = new GlobaltixPage($this->plugin_name, $this->version);
		add_menu_page(__('Globaltix', 'globaltix'), __('Globaltix', 'globaltix'), 'manage_options', 'globaltix', array(
			&$GlobaltixPage,
			'Admin'
		));
	}

	/**
	 * init settings in admin page.
	 *
	 * @since   1.0.0
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	public function globaltix_settings_init()
	{
		$PluginAdminPage = new GlobaltixPage($this->plugin_name, $this->version);
		register_setting('globaltix_settings_pluginPage', 'globaltix_settings', array(
			&$PluginAdminPage,
			'globaltix_settings_page_sanitize'
		));
		add_settings_section('globaltix_settings_pluginPage_section', '', '', 'globaltix_settings_pluginPage');
		add_settings_field('username', __('Username', 'globaltix'), array(
			&$PluginAdminPage,
			'globaltix_settings_username_render'
		), 'globaltix_settings_pluginPage', 'globaltix_pluginPage_section');
		add_settings_field('password', __('Password', 'globaltix'), array(
			&$PluginAdminPage,
			'globaltix_settings_password_render'
		), 'globaltix_settings_pluginPage', 'globaltix_pluginPage_section');
	}
}
