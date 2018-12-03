<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      10/11/2018
 * @package ti-mega-menu-builder
 */

/**
 * Class Ti_MMB_Admin
 *
 * @package ThemeIsle
 */
class Ti_MMB_Admin {
	/**
	 * Initialize the Admin.
	 *
	 * @var null
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'add_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	public function add_page() {
		add_theme_page( 'Mega Menu Builder',
			'ThemeIsle Mega Menu Builder',
			'edit_theme_options',
			'ti-mmb',
			[ $this, 'render' ] );
	}

	public function render() {
		echo '<div id="ti-mmb"></div>';
	}

	/**
	 * Enqueue script and styles.
	 */
	public function enqueue() {
		$screen = get_current_screen();

		if ( ! isset( $screen->id ) ) {
			return;
		}

		if ( $screen->id !== 'appearance_page_ti-mmb' ) {
			return;
		}

		wp_register_script( 'ti-mmb', TI_MMB_URL . '/assets/js/app.js', array(), TI_MMB_VERSION, true );

		wp_localize_script( 'ti-mmb', 'tiMmb', $this->localize() );

		wp_enqueue_script( 'ti-mmb' );
	}

	/**
	 * Localize the app.
	 *
	 * @return array
	 */
	private function localize() {
		$api = array(
			'root'     => esc_url_raw( rest_url( Ti_MMB_Core::API_ROOT ) ),
			'nonce'    => wp_create_nonce( 'wp_rest' ),
			'homeUrl'  => esc_url( home_url() ),
			'strings'  => $this->get_strings(),
			'navMenus' => wp_get_nav_menus(),
		);

		return $api;
	}

	/**
	 * Get strings.
	 *
	 * @return array
	 */
	private function get_strings() {
		return array(
			'createMenu' => __( 'Create menu', 'textdomain' ),
			'newMenu'    => __( 'New menu', 'textdomain' ),
			'selectMenu' => __( 'Select a menu', 'textdomain' ),
			'menuName'   => __( 'Enter a menu name...', 'textdomain' ),
		);
	}

	private function get_data() {

		return array();
	}
}
