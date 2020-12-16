<?php 
/***
* Banners Carousel template
**/
?>
<div id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr($class);?>">
	<div class="kapee-banner-wrapper kapee-carousel owl-carousel">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>