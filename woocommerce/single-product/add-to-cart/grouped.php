<?php
/**
 * Grouped product add to cart template
 */
defined( 'ABSPATH' ) || exit;

global $product, $post;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart grouped_form"
    action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>"
    method="post" enctype='multipart/form-data'>
    <table cellspacing="0" class="woocommerce-grouped-product-list group_table">
        <tbody>
            <?php
            $quantites_required      = false;
            $previous_post           = $post;
            $grouped_product_columns = apply_filters(
                'woocommerce_grouped_product_columns',
                array(
                    'quantity',
                    'label',
                    'price',
                ),
                $product
            );
            $show_add_to_cart_button = false;

            do_action( 'woocommerce_grouped_product_list_before', $grouped_product_columns, $quantites_required, $product );

            foreach ( $grouped_products as $grouped_product_child ) {
                $post_object        = get_post( $grouped_product_child->get_id() );
                $quantites_required = $quantites_required || ( $grouped_product_child->is_purchasable() && ! $grouped_product_child->has_options() );
                $post               = $post_object; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                setup_postdata( $post );

                if ( $grouped_product_child->is_in_stock() ) {
                    $show_add_to_cart_button = true;
                }

                echo '<tr id="product-' . esc_attr( $grouped_product_child->get_id() ) . '" class="woocommerce-grouped-product-list-item ' . esc_attr( implode( ' ', wc_get_product_class( '', $grouped_product_child ) ) ) . '">';

                foreach ( $grouped_product_columns as $column_id ) {
                    do_action( 'woocommerce_grouped_product_list_before_' . $column_id, $grouped_product_child );

                    switch ( $column_id ) {
                        case 'quantity':
                            ob_start();

                            if ( ! $grouped_product_child->is_purchasable() || $grouped_product_child->has_options() || ! $grouped_product_child->is_in_stock() ) {
                                woocommerce_template_loop_add_to_cart();
                            } elseif ( $grouped_product_child->is_sold_individually() ) {
                                echo '<input type="checkbox" name="' . esc_attr( 'quantity[' . $grouped_product_child->get_id() . ']' ) . '" value="1" class="wc-grouped-product-add-to-cart-checkbox" id="' . esc_attr( 'quantity-' . $grouped_product_child->get_id() ) . '" />';
                                echo '<label for="' . esc_attr( 'quantity-' . $grouped_product_child->get_id() ) . '" class="screen-reader-text">' . esc_html__( 'Buy one of this item', 'woocommerce' ) . '</label>';
                            } else {
                                do_action( 'woocommerce_before_add_to_cart_quantity' );

                                // Add quantity input with an ID for JavaScript to target
                                woocommerce_quantity_input(
                                    array(
                                        'input_name'  => 'quantity[' . $grouped_product_child->get_id() . ']',
                                        'input_value' => isset( $_POST['quantity'][ $grouped_product_child->get_id() ] ) ? wc_stock_amount( wc_clean( wp_unslash( $_POST['quantity'][ $grouped_product_child->get_id() ] ) ) ) : '',
                                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 0, $grouped_product_child ),
                                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $grouped_product_child->get_max_purchase_quantity(), $grouped_product_child ),
                                        'placeholder' => '0',
                                        'input_class' => 'qty',
                                        'input_id'    => 'quantity-' . $grouped_product_child->get_id(), // Unique ID for each input
                                        'classes'     => array('input-text', 'qty', 'text'),
                                        'wrap_class'  => 'quantity' // Wrapper class
                                    )
                                );

                                do_action( 'woocommerce_after_add_to_cart_quantity' );
                            }

                            $value = ob_get_clean();
                            break;
                        case 'label':
                            $value  = '<label for="product-' . esc_attr( $grouped_product_child->get_id() ) . '">';
                            $value .= $grouped_product_child->is_visible() ? '<a href="' . esc_url( apply_filters( 'woocommerce_grouped_product_list_link', $grouped_product_child->get_permalink(), $grouped_product_child->get_id() ) ) . '">' . $grouped_product_child->get_name() . '</a>' : $grouped_product_child->get_name();
                            $value .= '</label>';
                            break;
                        case 'price':
                            $value = $grouped_product_child->get_price_html() . wc_get_stock_html( $grouped_product_child );
                            break;
                        default:
                            $value = '';
                            break;
                    }

                    echo '<td class="woocommerce-grouped-product-list-item__' . esc_attr( $column_id ) . '">' . apply_filters( 'woocommerce_grouped_product_list_column_' . $column_id, $value, $grouped_product_child ) . '</td>';

                    do_action( 'woocommerce_grouped_product_list_after_' . $column_id, $grouped_product_child );
                }

                echo '</tr>';
            }
            $post = $previous_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
            setup_postdata( $post );

            do_action( 'woocommerce_grouped_product_list_after', $grouped_product_columns, $quantites_required, $product );
            ?>
        </tbody>
    </table>

    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />

    <?php if ( $quantites_required && $show_add_to_cart_button ) : ?>
    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
    <div class="tp-product-details-add-to-cart mb-15 mr-10">
        <button type="submit"
            class="tp-product-details-add-to-cart-btn w-100 alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
            <?php echo esc_html( $product->single_add_to_cart_text() ); ?>
        </button>
    </div>
    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

    <div class="tp-product-details-wishlist mb-15">
        <div class="tp-product-details-wishlist-btn">
            <?php echo do_shortcode('[woosw]'); ?>
        </div>
    </div>
    <?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
