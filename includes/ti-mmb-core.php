<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      10/11/2018
 * @package ti-mega-menu-builder
 */


/**
 * Class Ti_MMB_Core
 *
 * @package ThemeIsle
 */
class Ti_MMB_Core {
	/**
	 * Instance of Ti_MMB_Core
	 *
	 * @var Ti_MMB_Core
	 */
	protected static $instance = null;

	/**
	 * Sites Library API URL.
	 *
	 * @var string API root string.
	 */
	const API_ROOT = 'ti-mm-builder/v1';

	/**
	 * Holds the sites data.
	 *
	 * @var null
	 */
	public function init() {
		$this->setup_admin();
		$this->setup_api();
	}

	/**
	 * Utility to check if sites library should be loaded.
	 *
	 * @return bool
	 */
	private function should_load() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Setup admin functionality.
	 *
	 * @return void
	 */
	private function setup_admin() {
		require_once 'ti-mmb-admin.php';
		if ( ! class_exists( 'Ti_MMB_Admin' ) ) {
			return;
		}
		$admin = new Ti_MMB_Admin();
		$admin->init();
	}

	/**
	 * Setup the restful functionality.
	 *
	 * @return void
	 */
	private function setup_api() {
//		require_once '.php';
//		if ( ! class_exists( 'Themeisle_OB_Rest_Server' ) ) {
//			return;
//		}
//		$api = new Themeisle_OB_Rest_Server();
//		$api->init();
	}

	/**
	 * Instantiate the class.
	 *
	 * @static
	 * @since  1.0.0
	 * @access public
	 * @return Themeisle_Onboarding
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Disallow object clone
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function __clone() {
	}

	/**
	 * Disable un-serializing
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function __wakeup() {
	}
}
