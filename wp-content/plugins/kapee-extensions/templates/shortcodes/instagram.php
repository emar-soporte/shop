<?php 
/**
 * Instagram Template
 */

?>
<div id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr($class);?>">
	<?php if( ! empty( $title  ) ) { ?>
		<div class="section-heading">
			<h2><?php echo esc_html($title); ?></h2>
		</div>
	<?php } ?>
	<div class="instagram-wrap">			
		<?php echo do_shortcode('[instagram-feed num='.$num.' cols='.$cols.' imagepadding='.$imagepadding.' imageres='.$imageres.' showheader=false showbutton=false showfollow='.$showfollow.' followtext="'.$followtext.'" disablemobile='.$disablemobile.']'); ?>			
	</div>
</div>