<?php
/**
 * Client Global Meta
 *
 * Creates global post meta
 *
 * @package Client_Functionality
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Client_Meta_Global {

	public function __construct() {
		add_action( 'cmb2_admin_init', array( $this, 'cmb2_register_options_submenu_for_client' ) );
	}

	public function cmb2_register_options_submenu_for_client() {

		$cmb_client_information = new_cmb2_box(
			array(
				'id'           => 'cmb2_options_client_information_submenu_page',
				'title'        => esc_html__( 'Site Information', 'client-text-domain' ),
				'object_types' => array( 'options-page' ),
				'option_key'   => 'client_information',
				'parent_slug'  => 'options-general.php',
			)
		);

		$cmb_client_information->add_field(
			array(
				'name'             => esc_html__( 'Home Header Color', 'client-text-domain' ),
				'id'               => '_client_example_meta',
				'type'             => 'text',
			)
		);
	}
}
