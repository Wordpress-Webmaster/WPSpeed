<?php
/**
 * @link       https://wordpress-webmaster.de
 * @since      1.0.0
 * @package    Wps_Wwis
 * @subpackage Wps_Wwis/includes
 * @author     Volkan Sah <plugin@wordpress-webmaster.de>
 */
class Wps_Wwis {
	protected $loader;
	protected $plugin_name;
	protected $version;
	public function __construct() {
		if ( defined( 'WPS_WWIS_VERSION' ) ) {
			$this->version = WPS_WWIS_VERSION;
		} else {
		$this->version = '1.0.0'; 
		}
		$this->plugin_name = 'wps-wwis';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_core_security();
		$this->define_core_api();
		$this->define_public_misc();
		$this->define_public_hooks();
		}
		private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wps-wwis-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wps-wwis-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wps-wwis-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wps-wwis-public.php';
		$this->loader = new Wps_Wwis_Loader();
		}
		private function set_locale() {
		$plugin_i18n = new Wps_Wwis_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
		}
		private function define_admin_hooks() {
		$plugin_admin = new Wps_Wwis_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'wpspeed_add_admin_menu' );
		$this->loader->add_filter( 'plugin_action_links_', $plugin_admin, 'wpspeed_settings_action_links', 10, 2 );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'wpspeed_settings_init' );
		}
		private function define_core_security() {
		$plugin_public = new Wps_Wwis_Core_Security( $this->get_plugin_name(), $this->get_version() );
		$this->
		}
		private function define_core_api() {
		$plugin_public = new Wps_Wwis_Core_Api( $this->get_plugin_name(), $this->get_version() );
		$this->
		}
		private function define_public_hooks() {
		$plugin_public = new Wps_Wwis_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		}
		private function define_public_misc() {
		$plugin_public = new Wps_Wwis_Public_Misc( $this->get_plugin_name(), $this->get_version() );
		$this->
		}
	
		public function run() {
				$this->loader->run();
				}
		public function get_plugin_name() {
			return $this->plugin_name;
				}
		public function get_loader() {
			return $this->loader;
				}
		public function get_version() {
		return $this->version;
				}
}
