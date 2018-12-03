<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      10/11/2018
 * @package ti-mega-menu-builder
 */

/**
 * Class Ti_MMB_Rest
 *
 * @package ThemeIsle
 */
class Ti_MMB_Rest {
	/**
	 * Initialize the Ti_MMB_Rest.
	 *
	 * @var null
	 */
	public function init() {
		add_action( 'rest_api_init', array( $this, 'register_endpoints' ) );
	}

	public function register_endpoints() {
		register_rest_route(
			Ti_MMB_Core::API_ROOT,
			'/get_menu',
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'get_menu' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);

		register_rest_route(
			Ti_MMB_Core::API_ROOT,
			'/create_menu',
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'create_menu' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
	}

	public function get_menu( \WP_REST_Request $request ) {
		$data = $request->get_json_params();
		if ( empty( $data ) && empty( $data['slug'] ) ) {
			wp_send_json_error( '404' );
		}
		$menu_items = wp_get_nav_menu_items( $data['slug'] );

		return $menu_items;
	}

	public function create_menu( \WP_REST_Request $request ) {
		$data = $request->get_json_params();
		if ( empty( $data['name'] ) ) {
			wp_send_json_error( '404' );
		}

		wp_create_nav_menu( $data['name'] );

		$slug = strtolower( str_replace( ' ', '-', $data['name'] ) );

		return wp_get_nav_menu_object( $slug );
	}
}
