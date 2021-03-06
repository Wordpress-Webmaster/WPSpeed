<?php

/**
 * The plugin is under developing it is not finised!
 * By Volkan Sah Kücükbudak
 *
 * @link              https://wordpress-webmaster.de
 * @since             1.0.0
 * @package           Wps_Wwis
 *
 * @wordpress-plugin
 * Plugin Name:       WpSpeed - Toolbox by WordpressWebmaster
 * Plugin URI:        https://wordpress-webmaster.de/plugins/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Volkan Sah
 * Author URI:        https://wordpress-webmaster.de
 * License:           CC + GPL + Privat
 * License URI:       http://soon
 * Text Domain:       wps-wwis
 * Domain Path:       /languages
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'WPS_WWIS_VERSION', '1.0.0' );
define( 'WPS_WWIS_DIR', dirname( __FILE__ ) );
define( 'WPS_WWIS_URL', plugin_dir_url( __FILE__ ) );
define( 'WPS_WWIS_SLUG', 'wpspeed_settings' );
define( 'WPS_WWIS_LG', 'wpspeed' );
define( 'WPS_WWIS_PAGE_SLUG', 'wpspeed' );
function activate_wps_wwis() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-wwis-activator.php';
	Wps_Wwis_Activator::activate();
}
function deactivate_wps_wwis() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-wwis-deactivator.php';
	Wps_Wwis_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_wps_wwis' );
register_deactivation_hook( __FILE__, 'deactivate_wps_wwis' );
require plugin_dir_path( __FILE__ ) . 'includes/class-wps-wwis.php';
function run_wps_wwis() {
	$plugin = new Wps_Wwis();
	$plugin->run();
}
run_wps_wwis();
