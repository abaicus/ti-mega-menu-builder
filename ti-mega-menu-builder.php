<?php
/**
 * Plugin Name:       ThemeIsle Mega Menu Builder
 * Plugin URI:        https://example.org
 * Description:       No description available
 * Version:           0.0.1
 * Author:            Andrei Baicus <andrei@themeisle.com>
 * Author URI:        https://themeisle.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ti-mmb
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'TI_MMB_URL', plugins_url( '/', __FILE__ ) );
define( 'TI_MMB_PATH', dirname( __FILE__ ) );
define( 'TI_MMB_VERSION', '0.0.1' );

function ti_mmb_run() {
	require_once 'includes/ti-mmb-core.php';
	if ( class_exists( 'Ti_MMB_Core' ) ) {
		$mmb = new Ti_MMB_Core();
		$mmb->init();
	}
}

add_action( 'init', 'ti_mmb_run' );