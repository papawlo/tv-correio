<?php

class acf_field_networksites extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'networksites';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Network Sites', 'acf-networksites');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = __("Multisite",'acf-networksites');
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			'allow_null' 	=> 0,
			'multiple'		=> 0,
			'return_format'	=> 'object',
		);		
		
		// extra
		add_action('wp_ajax_acf/fields/networksites/query',			array($this, 'ajax_query'));
		add_action('wp_ajax_nopriv_acf/fields/networksites/query',	array($this, 'ajax_query'));
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('networksites', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acf-networksites'),
		);
		
				
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {

		// Change Field into a select
		$field['type'] = 'select';
		$field['choices'] = array();
		

		// get sites
		//$sites = $this->get_sites( $field['value'] );
		$sites = _wp_get_sites(array('public'=>'1','orderby'=>'domain ASC, path ASC','offset'=>'1'));
		
		// set choices
		if( !empty($sites) ) {
			
			foreach( array_keys($sites) as $i ) {
				
				// vars
				$site = acf_extract_var( $sites, $i );
				// append to choices
				$field['choices'][ $site['blog_id'] ] = $this->get_site_name($site['blog_id']);
				
			}
			
		}
		// render
		acf_render_field( $field );
		
	}

	private function get_site_name($id) {
		$blog_details = get_blog_details($id);
		return $blog_details->blogname;
	}
	
	
}


// create field
new acf_field_networksites();

?>
