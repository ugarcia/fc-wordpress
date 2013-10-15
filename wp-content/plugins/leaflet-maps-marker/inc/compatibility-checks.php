<?php
/*
    Checks for incompatible plugins and settings - Leaflet Maps Marker Plugin
*/
//info prevent file from being accessed directly
if (basename($_SERVER['SCRIPT_FILENAME']) == 'compatibility-checks.php') { die ("Please do not access this file directly. Thanks!<br/><a href='http://www.mapsmarker.com/go'>www.mapsmarker.com</a>"); }
require_once(ABSPATH . WPINC . DIRECTORY_SEPARATOR . "pluggable.php");
$lmm_options = get_option( 'leafletmapsmarker_options' ); //info: required for bing maps api key check

//info: check if bing maps api key is defined
if (( (($lmm_options['standard_basemap'] == 'bingaerial') || ($lmm_options['standard_basemap'] == 'bingaerialwithlabels') || ($lmm_options['standard_basemap'] == 'bingroad'))
|| ((isset($lmm_options[ 'controlbox_bingaerial' ]) == TRUE ) && ($lmm_options[ 'controlbox_bingaerial' ] == 1 ))
|| ((isset($lmm_options[ 'controlbox_bingaerialwithlabels' ]) == TRUE ) && ($lmm_options[ 'controlbox_bingaerialwithlabels' ] == 1 ))
|| ((isset($lmm_options[ 'controlbox_bingroad' ]) == TRUE ) && ($lmm_options[ 'controlbox_bingroad' ] == 1 ))
) && ( isset($lmm_options['bingmaps_api_key']) && ($lmm_options['bingmaps_api_key'] == NULL )
)) {
	echo '<p><div class="error" style="padding:10px;"><strong>' . __('Warning: you enabled support for bing maps but did not provide an API key. Please visit <a href="http://www.mapsmarker.com/bing-maps" target="_blank">http://www.mapsmarker.com/bing-maps</a> for info on how to get a free bing maps API key!','lmm') . '</strong></div></p>';
}
//info: plugin JavaScript to Footer
if (is_plugin_active('footer-javascript/footer-javascript.php') ) {
	echo '<p><div class="error" style="padding:10px;"><strong>' . __('Warning: you are using the plugin Javascript to Footer which is incompatible with Leaflet Maps Marker and causing maps to break. Please deactivate this plugin in order to be able to use Leaflet Maps Marker.','lmm') . '</strong></div></p>';
}
//info: plugin Lazy Load
if (is_plugin_active('lazy-load/lazy-load.php') ) {
	global $wp_version;
	if ( version_compare( $wp_version, '3.3', '<' ) ) {
		echo '<p><div class="error" style="padding:10px;"><strong>' . __('Warning: you are using the plugin Lazy Load which is incompatible with Leaflet Maps Marker and WordPress <3.3. Please upgrade to the latest WordPress version or disable the Lazy Load plugin.','lmm') . '</strong></div></p>';
	} else if ( (version_compare( $wp_version, '3.3', '>=' )) && ($lmm_options['misc_javascript_header_footer'] == 'header') ) {
		echo '<p><div class="error" style="padding:10px;"><strong>' . __('Warning: you are using the plugin Lazy Load and set Leaflet Maps Marker to include Javascript files in header. Please change this setting to include Javascript files in footer (Settings / Misc) or deactivate the Lazy Load plugin.','lmm') . '</strong></div></p>';
	}
}
//info: plugin jQuery Colorbox
if (is_plugin_active('jquery-colorbox/jquery-colorbox.php') ) {
	$lmm_jquery_colorbox_options = get_option( 'jquery-colorbox_settings' );
	if ($lmm_jquery_colorbox_options['autoColorbox'] == TRUE) {
		echo '<p><div class="error" style="padding:10px;">' . __('<strong>Warning: you are using the plugin jQuery Colorbox which is causing maps to break!</strong><br/><br/>Here is how to fix this:<br/>1. click on to "Settings" / "jQuery Colorbox" in your WordPress admin menu<br/>2. Uncheck the setting "Automate jQuery Colorbox for all images in pages, posts and galleries:"<br/>3. check the setting "Automate jQuery Colorbox for images in WordPress galleries only:" instead<br/>4. save changes<br/><br/>This message will disappear automatically when the jQuery Colorbox option was updated.','lmm') . '</div></p>';
	}
}
//info: plugin cformsII
if (is_plugin_active('cforms/cforms.php') ) {
	$lmm_cforms_options = get_option( 'cforms_settings' );
	if ($lmm_cforms_options['global'][ 'cforms_show_quicktag_js' ] == FALSE) {
		echo '<p><div class="error" style="padding:10px;">' . __('<strong>Warning: you are using the plugin cformsII which is causing the TinyMCE editor to break when creating new maps!</strong><br/><br/>Here is how to fix this:<br/>1. click on to "cformsII" / "Global Settings" in your WordPress admin menu<br/>2. open the tab "WP Editor Button support"<br/>3. check the option "Fix TinyMCE error"<br/>4. save changes<br/><br/>If you do not see this option in your settings, please upgrade to the latest version first (this has to be done manually - see plugin website http://www.deliciousdays.com/cforms-plugin/ for details)<br/><br/>This message will disappear automatically when the cformsII option "Fix TinyMCE error" is checked.','lmm') . '</div></p>';
	}
}
//info: plugin WP Google Analytics
if (is_plugin_active('wp-google-analytics/wp-google-analytics.php') ) {
	echo '<p><div class="error" style="padding:10px;"><strong>' . __('Warning: you are using the outdated plugin WP Google Analytics which is incompatible with Leaflet Maps Marker. Please update to a more current Google analytics plugin like http://wordpress.org/extend/plugins/google-analytics-for-wordpress/','lmm') . '</strong></div></p>';
}
//info: plugin Better WordPress Minify
if (is_plugin_active('bwp-minify/bwp-minify.php') ) {
	$lmm_bwpminify_options = get_option( 'bwp_minify_general' );
	if ($lmm_bwpminify_options['enable_min_js'] == 'yes') {
		if (strpos($lmm_bwpminify_options['input_ignore'], 'leafletmapsmarker') === false)  {
			echo '<p><div class="error" style="padding:10px;"><strong>' . __('Warning: you are using the plugin "Better WordPress Minify" which can cause Leaflet Maps Marker to break if the option "Minify JS files automatically?" is active. Please disable this option (Settings / BWP Minify) or add <strong>leafletmapsmarker</strong> to the form field "Scripts to be ignored (not minified)"','lmm') . '</strong></div></p>';
		}
	}
}
//info: plugin WP Minify
if (is_plugin_active('wp-minify/wp-minify.php') ) {
	$lmm_bwpminify_options = get_option( 'wp_minify' );
	if ($lmm_bwpminify_options['enable_html'] == '1') {
			echo '<p><div class="error" style="padding:10px;"><strong>' . __('Warning: you are using the plugin "WP Minify" which is causing Leaflet Maps Marker layer maps to break as the option "Enable HTML Minification" is active. Please disable this option under Settings / WP Minify.','lmm') . '</strong></div></p>';
	}
}
//info: plugin W3 Total Cache check for Minify & CDN
if (is_plugin_active('w3-total-cache/w3-total-cache.php') ) {
	$w3tc_config = w3_instance('W3_Config');
	$w3tc_minify = $w3tc_config->get_boolean('minify.enabled');
	if ($w3tc_minify == true) {
		$w3tc_js = $w3tc_config->get_boolean('minify.js.enable');
		if ($w3tc_js == true) {
				$w3tc_js_exclude = $w3tc_config->get_array('minify.reject.files.js');
				if (in_array('wp-content/plugins/leaflet-maps-marker/leaflet-dist/leaflet.js', $w3tc_js_exclude) == false) {
					echo '<p><div class="error" style="padding:10px;"><strong>' . sprintf(__('Warning: you are using the plugin "W3 Total Cache" with the feature "JS Minify" enabled which is causing maps to break.<br/>To fix this, please navigate to <a href="%1s">Performance / Minify / Advanced</a> and add <strong>%2s</strong> to "Never minify the following JS files:"','lmm'), LEAFLET_WP_ADMIN_URL . 'admin.php?page=w3tc_minify', 'wp-content/plugins/leaflet-maps-marker/leaflet-dist/leaflet.js') . '</strong></div></p>';
				}
		}
	}
	$w3tc_cdn = $w3tc_config->get_boolean('cdn.enabled');
	$w3tc_version = $w3tc_config->get_string('version');
	if ($w3tc_cdn == true) {
		if ($w3tc_version < '0.9.3' ) {
			$w3tc_cdn_exclude = $w3tc_config->get_array('cdn.reject.files');
			if (in_array('wp-content/uploads/leaflet-maps-marker-icons/*', $w3tc_cdn_exclude) == false) {
				echo '<p><div class="error" style="padding:10px;"><strong>' . sprintf(__('Warning: you are using the plugin "W3 Total Cache" with the feature "CDN" enabled which is causing layer maps to break.<br/>To fix this, please navigate to <a href="%1s">Performance / CDN / Advanced</a> and add <strong>%2s</strong> to "Rejected files:"','lmm'), LEAFLET_WP_ADMIN_URL . 'admin.php?page=w3tc_cdn', 'wp-content/uploads/leaflet-maps-marker-icons/*') . '</strong></div></p>';
			}
		}
	}
}
?>