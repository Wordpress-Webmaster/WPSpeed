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
public function enqueue_scripts() {
wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wps-wwis-admin.js', array( 'jquery' ), $this->version, false );
	}
public function wpspeed_add_admin_menu() {
add_options_page( 'WP Speed', 'WP Speed', 'manage_options', WPS_WWIS_PAGE_SLUG, 'wpspeed_options_page' );
}
	// ----------------------------------------------------------------------------------------------------- //
	public function wpspeed_settings_init() {

	global $wpspeed_settings_name, $wps_actions, $wps_sections;

	register_setting( WPS_WWIS_SLUG, $wpspeed_settings_name );

	$section_id = null;

	foreach ( $wps_actions as $id => $action ) {

		// Setting section
		if ( isset( $action['section'] ) && $action['section'] !== $section_id ) {

			$section_id = $action['section'];
			$section_name = esc_html( $wps_sections[ $section_id ]['name'] );
			$section_des = esc_html( $wps_sections[ $section_id ]['description'] );

			add_settings_section(
				WPS_WWIS_SLUG . '_section_' . $section_id,
				$section_name,
				function() use ($section_des) { echo $section_des; },
				WPS_WWIS_SLUG
			);

		}

		// Actions / Fiedls
		if ( isset( $action['label'] ) && isset( $action['type'] ) && isset( $action['cb'] ) ) {

			add_settings_field(
				'wpspeed_field_' . esc_attr( $id ),
				$action['label'],
				function() use ($id, $action) { wpspeed_field_view( $id, $action ); },
				WPS_WWIS_SLUG,
				WPS_WWIS_SLUG . '_section_' . $section_id,
				$action['args']
			);

		}

	} // end foreach

}


public function wpspeed_field_view( $id, $action ) {

	global $wpspeed_settings_name;
	$action_option_value = '';

	$options = get_option( $wpspeed_settings_name );

	$default = '';
	if ( isset( $action['default'] ) ) {
		$default = $action['default'];
	}

	if ( isset( $options[ $id ] ) ) {
		$action_option_value = $options[ $id ];
	}

	switch ( $action['type'] ) {

		case 'custom':
				wps_action_callback( $action['custom'] , array($id) );
			break;

		case 'text':
			?>
			<input type="text"
				id="<?php echo esc_attr( $id ); ?>"
				data-default="<?php echo esc_attr( $default ); ?>"
				name="<?php echo esc_attr( $wpspeed_settings_name . '[' . $id . ']' ); ?>"
				value="<?php echo wp_kses( $action_option_value , array() ); ?>"
			>
			<?php
			break;
		default:
			?>
			<input type="checkbox"
				id="<?php echo esc_attr( $id ); ?>"
				data-default="<?php echo esc_attr( $default ); ?>"
				name="<?php echo esc_attr( $wpspeed_settings_name . '[' . $id . ']' ); ?>"
				<?php checked( $action_option_value, 1 ); ?>
				value="1"
			>
			<?php
			break;
	}

	if ( isset( $action['description'] ) ) {
		echo $action['description'];
	}

} // end wptuning_field_view


public function wpspeed_options_page() {
	?>
	<form action='options.php' method='post'>

		<h1>WP Tuning</h1>
		<p>
			<?php echo __( 'Speed Up your Wordpress', WPS_WWIS_LG ); ?>
		</p>
		<p>
			<button type="button" id="wpspeed-default-button" class="button-secondary">
				<?php _e('Set to default setting', WPS_WWIS_LG) ?>
			</button>
			&nbsp;
			<?php submit_button( '', 'primary', 'submit', false ); ?>
		</p>
		<?php
		settings_fields( WPS_WWIS_SLUG );
		do_settings_sections( WPS_WWIS_SLUG );
		submit_button();
		?>
	</form>
	<?php
} 
	
} // < end


