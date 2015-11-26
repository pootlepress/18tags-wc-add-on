<?php
/**
 * Plugin Name:			WooCommerce for 18 Tags
 * Plugin URI:			http://www.pootlepress.com/wc-18-tags/
 * Description:			Customize the design of every element of your Eighteen tags website
 * Version:				2.0.0
 * Author:				pootlepress
 * Author URI:			http://pootlepress.com/
 * Requires at least:	4.0.0
 * Tested up to:		4.3.1
 *
 * Text Domain: wc-18-tags
 * Domain Path: /languages/
 *
 * @package WooCommerce_18T
 * @category Core
 * @author Shramee Srivastav <shramee.srivastav@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'WC18T_URL', plugin_dir_url( __FILE__ ) );
define( 'WC18T_PATH', plugin_dir_path( __FILE__ ) );
define( 'WC18T_VERSION', '1.0.0' );

/** Including abstract class */
require_once 'includes/class-abstract.php';

/** Including variables and function */
require_once 'includes/vars-n-funcs.php';

/** Including customizer class */
require_once 'includes/class-customizer-fields.php';

/** Including public class */
require_once 'includes/class-public.php';

/** Including admin class */
require_once 'includes/class-admin.php';

/** Including WooCommerce styling class */
require_once 'includes/class-woocommerce.php';

/**
 * Returns the main instance of WooCommerce_18T to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object WooCommerce_18T
 */
function WC18T() {
	return WooCommerce_18T::instance();
} // End WC18T()

WC18T();

/**
 * Main WooCommerce_18T Class
 *
 * @class WooCommerce_18T
 * @version	1.0.0
 * @since 1.0.0
 * @package	WooCommerce_18T
 * @author Shramee Srivastav <shramee.srivastav@gmail.com>
 */
final class WooCommerce_18T {
	/**
	 * WooCommerce_18T The single instance of WooCommerce_18T.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	public static $url;

	/**
	 * The token.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $token;

	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $version;

	/**
	 * The admin object.
	 * @var     WooCommerce_18_Tags_Admin
	 * @access  public
	 * @since   1.0.0
	 */
	public $admin;

	/**
	 * The public object.
	 * @var     WooCommerce_18_Tags_Public
	 * @access  public
	 * @since   1.0.0
	 */
	public $public;

	/**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 */
	public function __construct() {
		$this->token		= 'wc-18-tags';
		$this->plugin_url	= WC18T_URL;
		$this->plugin_path	= WC18T_PATH;
		$this->version		= WC18T_VERSION;
		self::$url			= $this->plugin_url;

		add_action( 'plugins_loaded', array( $this, 'setup' ) );
	}

	/**
	 * Setup all the things.
	 * Only executes if Eighteen tags or a child theme using Eighteen tags as a parent is active and the extension specific filter returns true.
	 * Child themes can disable this extension using the wc_18_tags_enabled filter
	 * @return void
	 */
	public function setup() {
		if ( class_exists( 'WooCommerce' ) ) {
			//Setting admin object
			$this->admin = new WooCommerce_18_Tags_Admin( $this->token, $this->plugin_path, $this->plugin_url );

			//Setting public object
			$this->public = new WooCommerce_18_Tags_Public( $this->token, $this->plugin_path, $this->plugin_url );
			$this->ext_plugins();
		}
	}

	/**
	 * Main WooCommerce_18T Instance
	 *
	 * Ensures only one instance of WooCommerce_18T is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see WooCommerce_18T()
	 * @return WooCommerce_18T instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) )
			self::$_instance = new self();
		return self::$_instance;
	} // End instance()

	public function ext_plugins() {
		if ( ! class_exists( 'Eighteen_Tags_Product_Sharing' ) ) {
			require 'includes/product-sharing/product-sharing.php';
		}
		if ( ! class_exists( 'WC_pif' ) ) {
			require 'includes/woocommerce-product-image-flipper/image-flipper.php';
		}
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	}
} // End Class
