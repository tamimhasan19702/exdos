<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$post_cats = get_the_terms(get_the_ID(), 'product_cat');
$post_tags = get_the_terms(get_the_ID(), 'product_tag');
?>
<div class="product_meta">
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<div class="tp-product-details-query-item d-flex align-items-center">
		<span><?php esc_html_e( 'SKU:', 'exdos' ); ?>  </span>
		<p><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'exdos' ); ?></p>
	</div>
	<?php endif; ?>

	<div class="tp-product-details-query-item d-flex align-items-center">
		<span><?php esc_html_e( 'Category:', 'exdos' ); ?> </span>

		<p>
			<?php 
                $html = '';
                foreach($post_cats as $key => $cat) {

                $html .= '<span>'.$cat->name.'</span>,';

                }
                echo rtrim($html,','); 
            ?>
		</p>
	</div>

	<?php if(has_tag()) : ?>
	<div class="tp-product-details-query-item d-flex align-items-center">
		<span><?php esc_html_e( 'Tag:', 'exdos' ); ?></span>
		<p>
			<?php 
                $html = '';
                foreach($post_tags as $key => $tag) {

                $html .= '<span>'.$tag->name.'</span>,';

                }
                echo rtrim($html,','); 
            ?>
		</p>
	</div>
	<?php endif; ?>



</div>
