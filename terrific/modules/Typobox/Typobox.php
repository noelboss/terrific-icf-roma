<?php

/**
 * Makes a custom Widget for displaying a typobox.
 *
 * @package WordPress
 * @subpackage Terrific
 * @since Terrific 1.0
 */
class Terrific_Module_Typobox extends Terrific_Module {
	
	private $_colors = array(
		array('#000000', '#FFFFFF'),
		//array('#432651', '#FFFFFF'),
		//array('#b633a6', '#432651'),
		//array('#00549e', '#64c2d9'),
		//array('#79723d', '#ceb968'),
		//array('#771518', '#FFFFFF')
	);
	
	function __construct() {
		parent::__construct('Typobox', array());
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['footer'] = $new_instance['footer'];
		$instance['link'] = $new_instance['link'];
		return $instance;
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'footer' => 'Play.', 'link' => '') );
		$text = esc_textarea($instance['text']);
		$footer = strip_tags($instance['footer']);
		$link = strip_tags($instance['link']);
		?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>" type="text" value="<?php echo esc_attr($footer); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
		</p>
		<?php
	}

	function widget($args, $instance) {
		
		$data = array();
		$key = array_rand($this->_colors);
		$color = $this->_colors[$key];
		$data['background'] = $color[0];
		$data['foreground'] = $color[1];
		$data['link'] = $instance['link'];
		$data['footer'] = $instance['footer'];
		$data['lines'] = array();
		$lines = split("\n", $instance['text']);
		
		foreach ($lines as $key => $line) {
			$line = trim($line);
			$data['lines'][$key]['text'] = $line;
			$isLowercase = ctype_lower($line);
			$length = strlen($line);
			if ($isLowercase) {
				$size = 100 / $length * 4 / 2;
				$data['lines'][$key]['size'] = $size;
			} else {
				$size = 100 / $length * 4;
				$data['lines'][$key]['size'] = $size;
			}
		}
		$this->display($instance, $data);
		
	}

}

?>