<?php
/**
 * Single variation cart button
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
    return;
}
?>

<div class="woocommerce-variation-add-to-cart variations_button">
    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

    <div class="d-flex flex-wrap align-items-center">
        <?php
        do_action( 'woocommerce_before_add_to_cart_quantity' );

        woocommerce_quantity_input(
            array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
                'class'       => 'quantity',
                'input_id'    => 'quantity-input',
            )
        );

        do_action( 'woocommerce_after_add_to_cart_quantity' );
        ?>

        <div class="tp-product-details-add-to-cart mb-15 mr-10">
            <button type="submit" name="add-to-cart"
                class="single_add_to_cart_button tp-product-details-add-to-cart-btn w-100 alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
                <?php echo esc_html( $product->single_add_to_cart_text() ); ?>
            </button>
        </div>

        <div class="tp-product-details-wishlist mb-15">
            <div class="tp-product-details-wishlist-btn">
                <?php echo do_shortcode('[woosw]'); ?>
            </div>
        </div>
    </div>

    <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="variation_id" class="variation_id" value="0" />

    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</div>