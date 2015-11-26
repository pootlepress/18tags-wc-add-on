<?php
/**
 * Created by PhpStorm.
 * User: Shramee Srivastav <shramee.srivastav@gmail.com>
 * Date: 27/4/15
 * Time: 5:36 PM
 */


/**
 * WooCommerce_18_Tags_Public Class
 *
 * @class WooCommerce_18_Tags_Public
 * @version	1.0.0
 * @since 1.0.0
 * @package	WooCommerce_18T
 */
final class WooCommerce_18_Tags_Public extends WooCommerce_18_Tags_Abstract {

	public static $desktop_css = '';

	public static $mobile_css = '';

	/** @var WooCommerce_18_Tags_WooCommerce Instance */
	public $woocommerce_styles;

	protected $header;

	/**
	 * Called by parent::__construct
	 * Do initialization here
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function init(){

		//Enqueue scripts and styles
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_styles' ), 999 );
		//Add plugin classes to body
		add_filter( 'body_class', array( $this, 'body_class' ) );
		//Products per page
		add_filter( 'eighteen_tags_products_per_page', array( $this, 'products_per_page' ), 999 );

		add_filter( 'eighteen-tags-wc-prod-share-icons', array( $this, 'product_sharing' ) );
		add_filter( 'eighteen-tags-wc-flip-prod-img', array( $this, 'product_img_flip' ) );
	}

	public function product_sharing() {
		return $this->get( 'wc-prod-share-icons' );
	}

	public function product_img_flip() {
		return $this->get( 'wc-prod-flip-img' );
	}

	/**
	 * Enqueue CSS and custom styles.
	 * @since   1.0.0
	 * @return  void
	 */
	public function scripts_styles() {

		wp_enqueue_script( 'etp-script', $this->plugin_url . '/assets/js/public.js', array( 'etp-skrollr' ), '1.0.0', true );
		wp_enqueue_script( 'jquery-masonry' );

		$this->woocommerce_styles = new WooCommerce_18_Tags_WooCommerce( $this->token, $this->plugin_path, $this->plugin_url );

		$this->features();

		$css = "/*-----STOREFRONT PRO-----*/";
		$css .= $this->woocommerce_styles->styles();
		$css .= '@media only screen and (min-width: 768px) {' . self::$desktop_css . '}';
		$css .= '@media only screen and (max-width: 768px) {' . self::$mobile_css  . '}';
		wp_add_inline_style( 'etp-styles', $css );

	}

	public function features() {

		// Infinite scroll
		if ( $this->get( 'wc-infinite-scroll' ) ) {
			add_action( 'woocommerce_before_shop_loop', array( $this, 'infinite_scroll_wrapper' ), 7 );
			add_action( 'woocommerce_after_shop_loop', array( $this, 'infinite_scroll_wrapper_close' ), 50 );
			wp_enqueue_script( 'jscroll', $this->plugin_url . '/assets/js/jquery.jscroll.min.js', array( 'jquery' ) );
		}

	}

	/**
	 * Specifies the number of products on the shop page
	 * @param int $num Number of products per page
	 * @return int Number of products per page
	 * @filter eighteen_tags_products_per_page
	 * @since 1.0.0
	 */
	public function products_per_page( $num ) {
		$per_page = $this->get( 'wc-shop-products' );

		if ( $per_page ) {
			return $per_page;
		} else {
			return $num;
		}
	}

	/**
	 * WooCommerce for 18 Tags Body Class
	 * Adds a class based on the extension name and any relevant settings.
	 */
	public function body_class( $classes ) {
		$classes[] = 'wc-18-tags-active';
		return $classes;
	}

	/**
	 * Infinite scroll wrapper
	 * @return void
	 */
	function infinite_scroll_wrapper() {
		echo '<div class="scroll-wrap">';
	}

	/**
	 * Infinite scroll wrapper close
	 * @return void
	 */
	function infinite_scroll_wrapper_close() {
		echo '</div>';
	}
} // End class