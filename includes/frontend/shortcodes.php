<?php
/**
 * Client Functionality Shortcodes
 *
 * @package Client_Functionality
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Client_Shortcodes {

	/**
	 * Client_Shortcodes constructor.
	 */
	public function __construct() {
		add_shortcode( 'socials', array( $this, 'socials' ) );
	}

	function socials( $atts = array(), $content = null ) {
		$atts = shortcode_atts( array(
			'' => '',
		), $atts, 'socials' );

		ob_start(); ?>

		<div class="shortcode-social-menu-container">
			<?php
			wp_nav_menu(
				array(
					'container'       => false,
					'container_class' => '',
					'menu'            => '',
					'menu_class'      => 'social-menu shortcode-social-menu',
					'theme_location'  => 'social',
				)
			);
			?>
		</div>

		<?php
		$socials = ob_get_contents();
		ob_end_clean();

		return $socials;
	}

}
