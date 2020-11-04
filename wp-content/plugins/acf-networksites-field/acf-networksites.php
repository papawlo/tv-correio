<?php

/*
Plugin Name: Advanced Custom Fields: Networksites
Description: Creates a select box of your WordPress Multisite blogs for the plugin Advanced Custom Fields
Version: 1.0.0
Author: Rodrigo Lacerda
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/




// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf-networksites', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 




// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_networksites( $version ) {
	
	include_once('acf-networksites-v5.php');
	
}

add_action('acf/include_field_types', 'include_field_types_networksites');	




// 3. Include field type for ACF4
function register_fields_networksites() {
	
	include_once('acf-networksites-v4.php');
	
}

add_action('acf/register_fields', 'register_fields_networksites');	



	
?>