<?php
/**
 * Client Functionality Modifications
 *
 * @package Client_Functionality
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Client_Modifications {

	/**
	 * Client_Modifications constructor.
	 */
	public function __construct() {
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );

		add_action( 'body_class', array( $this, 'client_body_classes' ) );

		add_filter( 'upload_mimes', array( $this, 'add_mime_types' ) );
		add_filter( 'widget_text', 'do_shortcode' );

		// For Genesis Themes
		add_action( 'wp_head', array( $this, 'modify_actions_from_theme') );
		add_filter( 'genesis_noposts_text', array( $this, 'client_genesis_noposts_text' ) );
	}


	/* Functions */
	public function pre_get_posts( $query ) {
		//
	}

	public function modify_actions_from_theme() {
		// Remove Footer
		remove_action( 'genesis_footer', 'genesis_do_footer' );
		add_action( 'genesis_footer', array( $this, 'client_add_footer' ) );
	}

	public function client_body_classes( $classes ) {
		//
	}

	public function add_mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

	public function client_genesis_noposts_text( ) {
		if ( is_search() ) {

			$no_results_text = esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'client-text-domain' );

			$output = $no_results_text . get_search_form( 0 );

		} else {

			$output = esc_html__( 'Sorry, no content matched your criteria.', 'client-text-domain' );

		}

		return '<div class="entry-content"><p class="large">' . $output . '</p></div>';
	}


	public function client_add_footer() {

		ob_start();
		?>

		<div class="copyright"><?php echo sprintf( wp_kses_post('© %s Client Name - All Rights Reserved', 'client-text-domain' ), date('Y' ) ); ?></div>

		<?php
		$html = ob_get_contents();

		ob_end_clean();

		echo $html;
	}

}
