<?php
global $wps_sections;

/**
 * All sections list
 * @var array
 */
$wps_sections = array(
	'security'	=> array(
		'name'			=> __( 'Security', WPS_WWIS_LG ),
		'description'	=> __( '', WPS_WWIS_LG ),
		'file'			=> WPS_WWIS_DIR . '/inc/common/actions_security.php',
	),
	'media'	=> array(
		'name'			=> __( 'Media', WPT_LG ),
		'description'	=> __( '', WPS_WWIS_LG ),
		'file'			=> WPS_WWIS_DIR . '/inc/common/actions_media.php',
	),
	'misc'	=> array(
		'name'			=> __( 'Misc', WPS_WWIS_LG ),
		'description'	=> __( '', WPS_WWIS_LG ),
		'file'			=> WPS_WWIS_DIR . '/inc/common/actions_misc.php',
	),
	'gutenberg' => array(
		'name'			=> __( 'Gutenberg', WPS_WWIS_LG ),
		'description'	=> __( '', WPS_WWIS_LG ),
		'file'			=> WPS_WWIS_DIR . '/inc/common/actions_gutenberg.php',
	),
	'head'	=> array(
		'name'			=> __( 'Head', WPS_WWIS_LG ),
		'description'	=> __( '', WPS_WWIS_LG ),
		'file'			=> WPS_WWIS_DIR . '/inc/common/actions_head.php',
	),
);
