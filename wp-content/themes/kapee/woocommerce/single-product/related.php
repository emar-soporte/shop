<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$unique_id 		= kapee_uniqid('section-');
$slider_data 	= shortcode_atts( kapee_slider_options() ,array(
	'slider_autoplay'   => ( kapee_get_option( 'related-upsells-auto-play', 1) ) ? true : false,
	'slider_loop'   	=> ( kapee_get_option( 'related-upsells-loop', 1) ) ? true : false,
	'slider_autoHeight'	=>  false,
	'slider_nav'     	=> ( kapee_get_option( 'related-upsells-navigation', 1) ) ? true : false,
	'slider_dots'     	=> ( kapee_get_option( 'related-upsells-product-dots', 1) ) ? true : false,
	'rs_extra_large'	=> kapee_get_option( 'related-upsells-products-columns', 4 ),			
	'rs_large'			=> kapee_get_option( 'related-upsells-products-columns', 4 ),			
	'rs_medium'			=> 3,			
	'rs_small'			=> 2,			
	'rs_extra_small'    => 2,
));
kapee_set_loop_prop( 'name', 'kapee-carousel' );
kapee_set_loop_prop( 'products-columns', kapee_get_option( 'related-upsells-products-columns', 4 ) );
kapee_set_loop_prop( 'unique_id', $unique_id );
kapee_set_loop_prop( 'slider_data', $slider_data );
global $kapee_owlparam;
$kapee_owlparam['owlCarouselArg'][$unique_id] = $slider_data;

if ( $related_products ) : ?>

	<section class="related">
		
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Productos Relacionados', 'kapee' ) );

		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();
