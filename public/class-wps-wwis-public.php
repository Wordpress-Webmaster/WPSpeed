<?php
/**
 *
 * @link       https://wordpress-webmaster.de
 * @since      1.0.0
 * @package    Wps_Wwis
 * @subpackage Wps_Wwis/public
 * @author     Volkan Sah <plugin@wordpress-webmaster.de>
 */
class Wps_Wwis_Public {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wps-wwis-public.css', array(), $this->version, 'all' );

	}
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wps-wwis-public.js', array( 'jquery' ), $this->version, false );

	}

}
