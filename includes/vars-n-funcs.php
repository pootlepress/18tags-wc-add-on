<?php
/**
 * Created by PhpStorm.
 * User: Shramee Srivastav <shramee.srivastav@gmail.com>
 * Date: 3/5/15
 * Time: 7:53 PM
 */

/**
 * Supported control types
 * * text
 * * checkbox
 * * radio (requires choices array in $args)
 * * select (requires choices array in $args)
 * * dropdown-pages
 * * textarea
 * * color
 * * image
 * * sf-text
 * * sf-heading
 * * sf-divider
 *
 * sf- prefixed controls are arbitrary eighteen-tags controls
 *
 * NOTE : sf-text control doesn't show anything if description is not set but
 * in WooCommerce_18_Tags_Customizer_Fields class we assign it to label
 * if not set ;)
 *
 */
$wc_18_tags_customizer_fields = array(
	//Shop
	array(
		'id'        => 'wc-shop-layout',
		'label'     => 'Shop layout',
		'section'   => 'Shop',
		'type'    => 'radio',
		'choices' => array(
			''        => 'Default',
			'full'    => 'Full width',
			'masonry' => 'Masonry',
		),
	),
	array(
		'id'        => 'wc-shop-columns',
		'label'     => 'Product columns',
		'section'   => 'Shop',
		'type'    => 'select',
		'default' => 3,
		'choices' => array_combine( range( 1, 5 ), range( 1, 5 ) ),
	),
	array(
		'id'        => 'wc-shop-products',
		'label'     => 'Products per page',
		'section'   => 'Shop',
		'type'    => 'select',
		'default' => 12,
		'choices' => array_combine( range( 1, 50 ), range( 1, 50 ) ),
	),
	array(
		'id'        => 'wc-shop-alignment',
		'label'     => 'Product alignment',
		'section'   => 'Shop',
		'type'    => 'select',
		'choices' => array(
			'center' => 'Center',
			'left'   => 'Left',
			'right'  => 'Right',
		),
	),
	array(
		'id'        => 'wc-prod-flip-img',
		'label'     => 'Flip product images',
		'section'   => 'Shop',
		'type'    => 'checkbox',
	),
	array(
		'id'        => 'wc-hide-cat-prod-count',
		'label'     => 'Hide product count on categories',
		'section'   => 'Shop',
		'type'    => 'checkbox',
	),
	array(
		'id' => 'wc-display-product-results-count',
		'label' => 'Display product results count',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id' => 'wc-display-product-sorting',
		'label' => 'Display product sorting',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id' => 'wc-display-product-image',
		'label' => 'Display product image',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id' => 'wc-display-product-title',
		'label' => 'Display product title',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id' => 'wc-display-sale-flash',
		'label' => 'Display sale flash',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id' => 'wc-display-rating',
		'label' => 'Display rating',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id' => 'wc-display-price',
		'label' => 'Display price',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id' => 'wc-display-add-to-cart',
		'label' => 'Display add to cart button',
		'section' => 'Shop',
		'default' => 1,
		'type' => 'checkbox',
	),
	array(
		'id'      => 'hide-wc-breadcrumbs-wc',
		'label'   => 'Hide breadcrumbs on WooCommerce pages',
		'section' => 'Shop',
		'type'    => 'checkbox',
	),
	array(
		'id'        => 'wc-mob-store-sep',
		'section'   => 'Shop',
		'type'      => 'sf-divider',
	),
	array(
		'id' => 'wc-mob-store',
		'label' => 'Enable sweet mobile store styling',
		'section' => 'Shop',
		'type' => 'checkbox',
	),
	array(
		'id'        => 'wc-infinite-scroll-sep',
		'section'   => 'Shop',
		'type'      => 'sf-divider',
	),
	array(
		'id' => 'wc-infinite-scroll',
		'label' => 'Infinite scroll',
		'section' => 'Shop',
		'type' => 'checkbox',
	),
	array(
		'id'        => 'wc-success-color-sep',
		'section'   => 'Shop',
		'type'      => 'sf-divider',
	),
	array(
		'id'        => 'wc-success-bg-color',
		'label'     => 'Success message background color',
		'section'   => 'Shop',
		'type'      => 'color',
	),
	array(
		'id'        => 'wc-success-text-color',
		'label'     => 'Success message text color',
		'section'   => 'Shop',
		'type'      => 'color',
	),
	array(
		'id'        => 'wc-info-color-sep',
		'section'   => 'Shop',
		'type'      => 'sf-divider',
	),
	array(
		'id'        => 'wc-info-bg-color',
		'label'     => 'Info message background color',
		'section'   => 'Shop',
		'type'      => 'color',
	),
	array(
		'id'        => 'wc-info-text-color',
		'label'     => 'Info message text color',
		'section'   => 'Shop',
		'type'      => 'color',
	),
	array(
		'id'        => 'wc-error-color-sep',
		'section'   => 'Shop',
		'type'      => 'sf-divider',
	),
	array(
		'id'        => 'wc-error-bg-color',
		'label'     => 'Error message background color',
		'section'   => 'Shop',
		'type'      => 'color',
	),
	array(
		'id'        => 'wc-error-text-color',
		'label'     => 'Error message text color',
		'section'   => 'Shop',
		'type'      => 'color',
	),

	//Product details
	array(
		'id'        => 'wc-product-layout',
		'label'     => 'Layout',
		'section'   => 'Product Details',
		'type'    => 'radio',
		'choices' => array(
			'' => 'Default',
			'full' => 'Full width',
		),
	),
	array(
		'id'      => 'hide-wc-breadcrumbs-product',
		'label'   => 'Hide breadcrumbs',
		'section' => 'Product Details',
		'type'    => 'checkbox',
	),
	array(
		'id'        => 'wc-prod-share-icons',
		'label'     => 'Show product sharing icons',
		'section'   => 'Product Details',
		'type'    => 'checkbox',
	),
	array(
		'id'      => 'wc-product-tabs',
		'label'   => 'Display product tabs',
		'default' => true,
		'section' => 'Product Details',
		'type'    => 'checkbox',
	),
	array(
		'id'      => 'wc-rel-product',
		'label'   => 'Display related products',
		'default' => true,
		'section' => 'Product Details',
		'type'    => 'checkbox',
	),
	array(
		'id'      => 'wc-product-meta',
		'label'   => 'Display product meta',
		'default' => true,
		'section' => 'Product Details',
		'type'    => 'checkbox',
	),

	// Checkout
	array(
		'id'      => 'hide-wc-breadcrumbs-checkout',
		'label'   => 'Hide breadcrumbs on Cart and Checkout pages',
		'section' => 'Checkout',
		'type'    => 'checkbox',
	),
	array(
		'id' => 'wc-co-distraction-free',
		'label' => 'Enable distraction free Cart and Checkout',
		'section' => 'Checkout',
		'type' => 'checkbox',
	),
);