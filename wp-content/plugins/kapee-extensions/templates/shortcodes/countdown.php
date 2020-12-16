<?php 
/**
 * Countdown template
 */

?>
<div  id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
	<div class="product-countdown" 
	data-year="<?php echo esc_attr( date('Y',$date)) ?>" 
	data-month="<?php echo esc_attr( date('m',$date)) ?>" 
	data-day="<?php echo esc_attr( date('d',$date)) ?>" 
	data-hours="00" 
	data-minutes="00" 
	data-seconds="00" 
	data-countdown_style="<?php echo esc_attr($countdown_style) ?>" 
	data-timezone="<?php echo esc_attr( $timezone ) ?>"></div>
</div>