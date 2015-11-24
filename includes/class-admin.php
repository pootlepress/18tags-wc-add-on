<?php
/**
 * Created by PhpStorm.
 * User: Shramee Srivastav <shramee.srivastav@gmail.com>
 * Date: 27/4/15
 * Time: 5:36 PM
 */


/**
 * WooCommerce_18_Tags_Admin Class
 *
 * @class WooCommerce_18_Tags_Admin
 * @version	1.0.0
 * @since 1.0.0
 * @package	WooCommerce_18T
 */
final class WooCommerce_18_Tags_Admin extends WooCommerce_18_Tags_Abstract {

	/**
	 * The customizer control render object.
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $customizer;

	/**
	 * Called by parent::__construct
	 * Do initialization here
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function init(){

		//Customizer fields renderer
		$this->customizer = new WooCommerce_18_Tags_Customizer_Fields( $this->token, $this->plugin_path, $this->plugin_url );
		//Customize register
		add_action( 'customize_register', array( $this->customizer, 'etp_customize_register' ), 999 );
		//Filter section arguments
		add_action( $this->token . '-sections-filter-args', array( $this, 'filter_sections' ) );
		//Register the panel
		add_action( $this->token . '-customize-register', array( $this, 'create_panel' ) );
	}

	/**
	 * Filters the section arguments for making them sit in panels
	 * @param array $args Section arguments
	 * @filter wc-18-tags-sections-filter-args
	 * @return array Arguments
	 */
	public function filter_sections ( $args ) {
		$args['panel'] = 'etp-wc';
		return $args;
	}

	/**
	 * Filters the section arguments for making them sit in panels
	 * @param WP_Customize_Manager $man
	 * @filter wc-18-tags-sections-filter-args
	 */
	public function create_panel ( $man ) {
		$man->add_panel( 'etp-wc', array(
			'title' => 'WooCommerce',
			'priority' => 32,
		) );
	}

} // End class