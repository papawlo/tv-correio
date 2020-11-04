<?php

/*
Plugin Name: Advanced Custom Fields: Sitewide Posts Field
Description: Creates field for Sitewide Posts; Requires WordPress MU Sitewide Tags Pages
Version: 1.0.0
Author: Rodrigo Lacerda
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/




// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf-sitewide-posts', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 




// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_sitewide_posts( $version ) {
	
	include_once('acf-sitewide-posts-v5.php');
	
}

add_action('acf/include_field_types', 'include_field_types_sitewide_posts');



	
?>