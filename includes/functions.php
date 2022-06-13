<?php
/**
 * Client Functionality Functions
 *
 * @package Client_Functionality
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Client_Functions {

	/**
	 * Client_Functions constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );

		//add_action( 'wp_head', [ $this, 'add_header_scripts' ] );
		//add_action( 'wp_body_open', [ $this, 'add_body_scripts' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'wp_enqueue_admin_styles' ] );
		add_action( 'after_setup_theme', [ $this, 'remove_admin_bar' ] );

		add_filter( 'gform_confirmation_anchor', '__return_true' );
	}

	public function init() {
		register_nav_menus(
			array(
				'social' => esc_html__( 'Social', 'client-text-domain' ),
			)
		);
	}

	public function add_header_scripts() {
		ob_start(); ?>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
					new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
		<!-- End Google Tag Manager -->

		<?php
		$scripts = ob_get_contents();
		ob_end_clean();

		echo $scripts;

	}

	public function add_body_scripts() {
		ob_start(); ?>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXXX"
		                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<?php
		$body_scripts = ob_get_contents();
		ob_end_clean();

		echo $body_scripts;
	}

	public function wp_enqueue_scripts() {

		if ( is_admin() ) {
			return;
		}

		wp_register_script( 'client-js', CLIENT_PLUGIN_URL . 'js/client.js', [], CLIENT_VERSION, true );
		wp_enqueue_script( 'client-js' );

	}

	public function wp_enqueue_styles() {

		if ( is_admin() ) {
			return;
		}

		$version    = CLIENT_VERSION;
		$plugin_url = CLIENT_PLUGIN_URL;

		wp_register_style( 'client-css', $plugin_url . 'css/client.css', '', $version );
		wp_enqueue_style( 'client-css' );

	}

	/**
	 * Enqueue admin styles.
	 *
	 * @access public
	 * @return void
	 */
	public function wp_enqueue_admin_styles() {

		$version    = CLIENT_VERSION;
		$plugin_url = CLIENT_PLUGIN_URL;

		wp_enqueue_style('admin-css', $plugin_url . 'css/client-admin.css', array(), $version );
	}

	/**
	 * Hides the admin bar for non-admins
	 */
	public function remove_admin_bar() {
		if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {
			show_admin_bar( false );
		}
	}

}

