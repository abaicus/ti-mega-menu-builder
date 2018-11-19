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
		add_action( 'admin_menu', [ $this, 'add_page' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
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

		wp_localize_script( 'ti-mmb', 'tiMmb', $this->localize_sites_library() );

		wp_enqueue_script( 'ti-mmb' );
	}

	/**
	 * Localize the app.
	 *
	 * @return array
	 */
	private function localize_sites_library() {
		$api = array(
			'root'    => esc_url_raw( rest_url( Ti_MMB_Core::API_ROOT ) ),
			'nonce'   => wp_create_nonce( 'wp_rest' ),
			'homeUrl' => esc_url( home_url() ),
			'i18n'    => $this->get_strings(),
			'data'    => $this->get_data(),
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
			'preview_btn' => __( 'Preview', 'textdomain' ),
			'import_btn'  => __( 'Import', 'textdomain' ),
		);
	}

	private function get_data() {

		return array(
			'navMenus'     => wp_get_nav_menus(),
			'navMenuItems' => wp_get_nav_menu_items( 'main-menu' ),
		);
	}
}
