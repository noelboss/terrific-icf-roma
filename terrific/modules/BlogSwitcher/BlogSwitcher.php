<?php

/**
 * Makes a custom Widget for switching between blogs/sites.
 *
 * @package WordPress
 * @subpackage Terrific
 * @since Terrific 1.0
 */
class Terrific_Module_BlogSwitcher extends Terrific_Module {
	
	function __construct() {
		$widget_ops = array(
			'classname' => 'Terrific_Module_BlogSwitcher', 
			'description' => 'Allows you to switch between blogs on your site'
		);
		parent::__construct('BlogSwitcher', $widget_ops);
	}

	function widget($args, $instance) {
		global $wpdb;
		$data['blogs'] = $wpdb->get_results($wpdb->prepare("
			SELECT blog_id, domain, path 
			FROM $wpdb->blogs 
			WHERE 
				public = '1' AND 
				archived = '0' AND 
				mature = '0' AND 
				spam = '0' AND 
				deleted = '0' 
			ORDER BY blog_id ASC"
			), ARRAY_A
		);
		foreach ($data['blogs'] as $index => $blog) {
			$name = get_blog_option($blog['blog_id'], 'blogname');
			switch ($name) {
				case 'Namics Weblog': $name = 'Blog'; break;
				case 'Namics.Lab': $name = 'Lab'; break;
				case 'Namics SharePoint Weblog': $name = 'SharePoint'; break;
				case 'Hirnlego': $name = 'Hirnlego'; break;
				case 'about:Namics': $name = 'About'; break;
			}
			$data['blogs'][$index]['name'] = $name;
		}
		if (sizeof($data['blogs']) > 0) {
			$this->display($instance, $data);
		}
	}

}

?>