<?php 
/**
 * Team Template
 */
?>

<div id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr( $class ); ?>">	
	<div class="kapee-carousel owl-carousel">
		<?php echo do_shortcode( $content ); ?>	
	</div>
</div>