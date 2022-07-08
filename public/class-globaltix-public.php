<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://youtube.com/hrace009
 * @since      1.0.0
 *
 * @package    Globaltix
 * @subpackage Globaltix/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Globaltix
 * @subpackage Globaltix/public
 * @author     Harris Marfel <hrace009@gmail.com>
 */
class Globaltix_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->globaltix_settings = get_option('globaltix_settings');

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
		 * defined in Globaltix_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Globaltix_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/globaltix-public.css', array(), $this->version, 'all' );

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
		 * defined in Globaltix_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Globaltix_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/globaltix-public.js', array( 'jquery' ), $this->version, false );

	}

	public function postAuth()
	{
		$args = array(
			'headers' => array(
				'Content-Type' => 'application/json'
			),
			'body' => json_encode( array(
				'username' => $this->globaltix_settings['username'],
				'password' => $this->globaltix_settings['password']
			) )
		);

		$request = wp_remote_post( GLOBALTIX_API . 'api/auth/login', $args );
		$body = wp_remote_retrieve_body($request);

		return json_decode( $body );
	}

	public function getProductList( )
	{
		$args = array(
			'headers' => array(
				'Accept-Version: 1.0',
                'Authorization: Bearer ',
			),
			'body' => array(
				'country' => 'Singapore',
			)
		);

		$request = wp_remote_get( GLOBALTIX_API . 'api/product/list?countryId=1&cityIds=all&categoryIds=all&searchText=&page=1&lang=en', $args );
		$response_code = wp_remote_retrieve_response_code( $request );
		$body = wp_remote_retrieve_body($request);

		return json_decode( $response_code );
	}

	/**
	 * Register the shortcode for the public-facing side of the site.
	 *
	 * @return string $output
	 * @since    1.0.0
	 * @author     Harris Marfel <hrace009@gmail.com>
	 */
	public function ProductList()
	{
		ob_start();
		$product = $this->getProductList();
		dd($product);
		require_once GLOBALTIX_DIR . 'public/partials/globaltix-public-display.php';
		return ob_get_clean();
	}

}
