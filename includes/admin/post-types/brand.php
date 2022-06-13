<?php
/**
 * Client Post Type
 *
 * Creates a post type for Brands
 *
 * @package Client_Functionality
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Client_PT_Brand {

	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'cmb2_admin_init', array( $this, 'cmb2_brand_meta' ) );
	}

	function init() {
		register_post_type( 'client_brand', array(
			'labels'              => array(
				'name'               => _x( 'Brands', 'client-text-domain' ),
				'singular_name'      => _x( 'Brand', 'client-text-domain' ),
				'add_new'            => __( 'Add New Brand', 'client-text-domain' ),
				'add_new_item'       => __( 'Add New Brand', 'client-text-domain' ),
				'edit_item'          => __( 'Edit Brand', 'client-text-domain' ),
				'new_item'           => __( 'New Brand', 'client-text-domain' ),
				'all_items'          => __( 'View All Brands', 'client-text-domain' ),
				'view_item'          => __( 'View Brand', 'client-text-domain' ),
				'search_items'       => __( 'Search Brands', 'client-text-domain' ),
				'not_found'          => __( 'No Brands Found', 'client-text-domain' ),
				'not_found_in_trash' => __( 'No Brands found in Trash', 'client-text-domain' ),
				'menu_name'          => __( 'Brands', 'client-text-domain' ),
			),
			'public'              => true,
			'exclude_from_search' => false,
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			'show_in_rest'        => true,
			'has_archive'         => false,
			'show_in_nav_menus'   => true,
			'menu_icon'           => 'dashicons-tag',
			'rewrite'             => array(
				'slug'       => 'brands',
				'with_front' => false,
				'feeds'      => null,
			),
		) );

		register_taxonomy( 'client_brand_type', array( 'client_brand' ), array(
			'labels'             => array(
				'name'              => _x( 'Brand Types', 'taxonomy general name' ),
				'singular_name'     => _x( 'Brand Type', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Brand Types', 'client-text-domain' ),
				'all_items'         => __( 'All Brand Types', 'client-text-domain' ),
				'parent_item'       => __( 'Parent Brand Type', 'client-text-domain' ),
				'parent_item_colon' => __( 'Parent Brand Type:', 'client-text-domain' ),
				'edit_item'         => __( 'Edit Brand Type', 'client-text-domain' ),
				'update_item'       => __( 'Update Brand Type', 'client-text-domain' ),
				'add_new_item'      => __( 'Add New Brand Type', 'client-text-domain' ),
				'new_item_name'     => __( 'New Brand Type Name', 'client-text-domain' ),
				'menu_name'         => __( 'Brand Types', 'client-text-domain' ),
			),
			'show_in_menu'       => true,
			'show_in_nav_menus'  => false,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'show_in_quick_edit' => true,
			'show_tagcloud'      => false,
			'hierarchical'       => true,
			'rewrite'            => array(
				'slug'       => 'brand-type',
				'with_front' => false,
				'feeds'      => null,
			),
		) );
	}

	function cmb2_brand_meta() {

		$cmb2_brand_meta = new_cmb2_box( array(
			'id'           => 'client_brand_meta',
			'title'        => __( 'Brand Information',  'client-text-domain' ),
			'object_types' => array( 'client_brand' ),
			'context'      => 'side',
			'priority'     => 'high',
			'show_names'   => true,
		) );

		$cmb2_brand_meta->add_field( array(
			'name' => __( 'External URL', 'client-text-domain' ),
			'id'   => '_brand_url',
			'type' => 'text_url',
		) );
	}

}
