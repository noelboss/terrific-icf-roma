<?php

/**
 * Makes a custom Widget for displaying the Namics wordmark.
 *
 * @package WordPress
 * @subpackage Terrific
 * @since Terrific 1.0
 */
class Terrific_Module_Wordmark extends Terrific_Module {
	
	const URL = 'http://www.namics.com/_shared/gdw/';
	
	function __construct() {
		parent::__construct('Wordmark', array());
		$this->ajax('wordmark');
	}

	function widget($args, $instance) {
		$hash = 'wordmark';
		if (false === ($words = get_transient($hash))) {
			$words = file_get_contents(self::URL);
			set_transient($hash, $words, 600); // cache entries for 1 hour
		}
		$data['words'] = json_decode($words);
		shuffle($data['words']);
		array_slice($data['words'], 5);
		$this->display($instance, $data);
	}
	
	function wordmark() {
		$data = @file_get_contents(self::URL);
		if ($data !== false) {
			header('Content-Type: application/json');
			$data = json_decode($data);
			shuffle($data);
			array_slice($data, 5);
			$data = json_encode($data);
			echo $data;
		}
		exit;
	}

}

?>