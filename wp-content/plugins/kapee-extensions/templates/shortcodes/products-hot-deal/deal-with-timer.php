<?php 
/**
 * Hot Deal with Timer Products Template
 */
?>
<div id="<?php echo esc_attr( $id );?>" class="<?php echo esc_attr( $class );?>">	
	<?php if( ! empty( $title ) ) { ?>
		<div class="section-heading">
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php if( ! empty( $date ) ) {?>
			<div class="kapee-deal-date">
				<span><?php echo esc_html( $deal_title );?> </span>
				<div class="kapee-deal-time">
					<div  id="deal-<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( 'kapee-countdown' ); ?>">
						<div class="product-countdown" 
						data-year="<?php echo esc_attr( date( 'Y', $date ) ) ?>" 
						data-month="<?php echo esc_attr( date( 'm', $date ) ) ?>" 
						data-day="<?php echo esc_attr( date( 'd', $date ) ) ?>" 
						data-hours="00" 
						data-minutes="00" 
						data-seconds="00" 
						data-countdown_style="<?php echo esc_attr( $countdown_style ) ?>" 
						data-timezone="<?php echo esc_attr( $timezone ) ?>"></div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	<?php }	
	$count = 0;
	woocommerce_product_loop_start();		
		while ( $query->have_posts() ) {			
			$query->the_post();
			if( $rows > 1 && $count % $rows == 0 ){
				echo '<div class="carousel-group">';
			}
			wc_get_template_part( 'content', 'product' );
			if( $rows > 1 && ($count % $rows == $rows - 1 || $count == $query->post_count - 1) ){
				echo '</div>';
			}
			$count++;
		}					
	woocommerce_product_loop_end();	
	wp_reset_postdata();
	kapee_reset_loop();
	?>	
</div>