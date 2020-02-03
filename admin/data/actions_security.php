 
<?php
/**
 * @link       https://wordpress-webmaster.de
 *
 * @package    Wps_Wwis
 * @subpackage Wps_Wwis/admin
 * @author     Volkan Sah <plugin@wordpress-webmaster.de>
 */
class Wps_Wwis_Admin {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
// Disable REST API user endpoints
public function wpspeed_disable_rest_api_user() {

	if( !is_user_logged_in() ) {
		add_filter( 'rest_endpoints', function( $endpoints ){
			if ( isset( $endpoints['/wp/v2/users'] ) ) {
				unset( $endpoints['/wp/v2/users'] );
			}
			if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
				unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
			}
			return $endpoints;
		});
	}

}
 // Deactivate REST-API
public function wpspeed_deactivate_rest_api(){
	remove_action( 'init','rest_api_init' );
	remove_action( 'parse_request','rest_api_loaded' );
	remove_action( 'xmlrpc_rsd_apis','rest_output_rsd' );
	remove_action( 'wp_head','rest_output_link_wp_head' );
	remove_action( 'template_redirect','rest_output_link_header', 11 );
	remove_action( 'auth_cookie_malformed','rest_cookie_collect_status' );
	remove_action( 'auth_cookie_expired','rest_cookie_collect_status' );
	remove_action( 'auth_cookie_bad_username','rest_cookie_collect_status' );
	remove_action( 'auth_cookie_bad_hash','rest_cookie_collect_status' );
	remove_action( 'auth_cookie_valid','rest_cookie_collect_status' );
	add_filter( 'rest_enabled','__return_false' );
	add_filter( 'rest_jsonp_enabled','__return_false' );

}
        
// Remove Author Pages and Links
public function remove_author_pages_page() {
	if ( is_author() ) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
	}
}

public function remove_author_pages_link( $content ) {
	return get_option( 'home' );
}
public function wpspeed_deactivate_author_page_and_link() {

	add_action( 'template_redirect', 'remove_author_pages_page' );
	add_filter( 'author_link', 'remove_author_pages_link' );

}

//

public function wptuning_deactivate_connection_error_wplogin(){

	add_filter( 'login_errors', '__return_empty_string' );
}
  }
