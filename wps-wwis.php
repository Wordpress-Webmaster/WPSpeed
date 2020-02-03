<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
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
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wps-wwis
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPS_WWIS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wps-wwis-activator.php
 */
function activate_wps_wwis() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-wwis-activator.php';
	Wps_Wwis_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wps-wwis-deactivator.php
 */
function deactivate_wps_wwis() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-wwis-deactivator.php';
	Wps_Wwis_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wps_wwis' );
register_deactivation_hook( __FILE__, 'deactivate_wps_wwis' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wps-wwis.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wps_wwis() {

	$plugin = new Wps_Wwis();
	$plugin->run();

}
run_wps_wwis();
