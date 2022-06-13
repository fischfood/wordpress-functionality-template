<?php
/**
 * Plugin Name: Client Functionality
 * Description: Modifications and functionality for the Client site
 * Version:     1.0.0
 * Author:      Brian Fischer / FischFood
 * Author URI:  https://brianfischer.me
 * Text Domain: client-text-domain
 *
 * @package Client_Functionality
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Globals
 */

if ( ! defined( 'CLIENT_VERSION' ) ) {
	define( 'CLIENT_VERSION', '1.0.0' );
}

// Define the main plugin file to make it easy to reference in subdirectories.
if ( ! defined( 'CLIENT_FILE' ) ) {
	define( 'CLIENT_FILE', __FILE__ );
}

if ( ! defined( 'CLIENT_PATH' ) ) {
	define( 'CLIENT_PATH', trailingslashit( __DIR__ ) );
}

if ( ! defined( 'CLIENT_PLUGIN_PATH' ) ) {
	define( 'CLIENT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'CLIENT_PLUGIN_URL' ) ) {
	define( 'CLIENT_PLUGIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}

if ( ! defined( 'CLIENT_PLUGIN_NAME' ) ) {
	define( 'CLIENT_PLUGIN_NAME', esc_html__( 'Client Functionality', 'client-text-domain' ) );
}

// Setup
require_once 'library/CMB2-init.php';
require_once 'includes/functions.php';

// Shortcodes
require_once 'includes/frontend/shortcodes.php';
require_once 'includes/frontend/modifications.php';

// Post Types
require_once 'includes/admin/post-types/example.php';

// Meta
require_once 'includes/admin/meta/global.php';

// ------------- //

$client_functions  = new Client_Functions();

$client_shortcodes = new Client_Shortcodes();
$client_modifications  = new Client_Modifications(); // Modifying the Genesis Base

$client_PT_example = new Client_PT_Example();
$client_meta_global = new Client_Meta_Global();
