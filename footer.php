<?php

/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Terrific
 * @since Terrific 1.0
 */
?>
	</div>       
	<div class="fat-footer">      
		<div class="inner">
			<?php terrific_module('Navigation', array('skin' => 'Footer', 'template' => 'footer')); ?>   
			<?php terrific_module('Footer') ?>
		</div>
	</div>
</div>
<?php get_footer('empty')
?>