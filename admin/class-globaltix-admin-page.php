<?php
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
class GlobaltixPage extends Globaltix_Admin {

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
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	public function __construct( $plugin_name, $version)
	{
		parent::__construct($plugin_name, $version);
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->globaltix_settings = get_option('globaltix_settings');
	}

	/**
	 * Load partial page dashboard
	 *
	 * @since   1.0.0
	 * @access  public
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	public function Admin()
	{

		require_once(GLOBALTIX_DIR . 'admin/partials/globaltix-admin-display.php');

	}

	/**
	 * Render settings for username field
	 *
	 * @since   1.0.0
	 * @access  public
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	public function globaltix_settings_username_render()
	{
		printf(
			'<input type="text" name="globaltix_settings_username[username]" id="username" value="%s" style="width: 450px;" placeholder="' . __('Your Globaltix Username, eg. you@email.com', 'globaltix') . '" %s >',
			isset($this->globaltix_settings['username']) ? esc_attr($this->globaltix_settings['username']) : '', 'enabled'
		);
	}

	/**
	 * Render settings for password field
	 *
	 * @since   1.0.0
	 * @access  public
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	public function globaltix_settings_password_render()
	{
		printf(
			'<input type="password" name="globaltix_settings_password[password]" id="password" value="%s" style="width: 450px;" placeholder="' . __('Your Globaltix Password, eg. secrepassword', 'globaltix') . '" %s >',
			isset($this->globaltix_settings['password']) ? esc_attr($this->globaltix_settings['password']) : '', 'enabled'
		);
	}

	/**
	 * Render settings for emailsettings field
	 *
	 * @param array $input
	 * @return  array $sanitary_values
	 * @since   1.0.0
	 * @access  public
	 * @author  Harris Marfel <hrace009@gmail.com>
	 */
	public function globaltix_settings_page_sanitize($input)
	{
		$sanitary_values = array();

		if (isset($input['username'])) {
			$sanitary_values['username'] = strtolower(sanitize_text_field($input['username']));
		}
		if (isset($input['password'])) {
			$sanitary_values['password'] = strtolower(sanitize_text_field($input['password']));
		}

		return $sanitary_values;
	}
}