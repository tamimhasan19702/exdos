<?php 

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_shop_loop_header' ,'woocommerce_product_taxonomy_archive_header', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// product item
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);




function exdos_add_to_cart( $args = array() ) {
    global $product;

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'tp-product-add-cart-btn-large text-center',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = wp_parse_args( $args, $defaults );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }


         // check product type 
         if( $product->is_type( 'simple' ) ){
            $btntext = esc_html__("Add to Cart",'exdos');
         } elseif( $product->is_type( 'variable' ) ){
            $btntext = esc_html__("Select Options",'exdos');
         } elseif( $product->is_type( 'external' ) ){
            $btntext = esc_html__("Buy Now",'exdos');
         } elseif( $product->is_type( 'grouped' ) ){
            $btntext = esc_html__("View Products",'exdos');
         }
         else{
            $btntext = esc_html__("Add to Cart",'exdos');
         } 

        echo sprintf( '<a title="%s" href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            $btntext,
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'tp-product-add-cart-btn-large' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            $btntext
        );
}



function exdos_product_grid() {
    ?>


<div class="tp-product-item mb-50">
    <div class="tp-product-thumb mb-15 fix p-relative z-index-1">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail();?>
        </a>

        <?php
        $product = wc_get_product(get_the_ID());
        if ($product->get_sale_price() > 0 && $product->get_sale_price() < $product->get_regular_price()) : ?>
        <div class="tp-product-badge">
            <span class="product-discount">SALE</span>
        </div>
        <?php endif; ?>

        <!-- product action -->
        <div class="tp-product-action tp-product-action-blackStyle">
            <div class="tp-product-action-item d-flex flex-column">
                <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4144 6.16828L14 3.58412L11.4144 1" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.48883 3.58374L14 3.58374" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4.07446 8.32153L1.48884 10.9057L4.07446 13.4898" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14 10.9058H1.48883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span class="tp-product-tooltip">Add To Compare</span>
                </button>
                <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal"
                    data-bs-target="#producQuickViewModal">
                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828ZM8.99942 10.7482C7.0581 10.7482 5.47949 9.17221 5.47949 7.23508C5.47949 5.29705 7.0581 3.72021 8.99942 3.72021C10.9407 3.72021 12.5202 5.29705 12.5202 7.23508C12.5202 9.17221 10.9407 10.7482 8.99942 10.7482Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.41273 7.2346C3.08674 10.9265 5.90646 13.1215 8.99978 13.1224C12.0931 13.1215 14.9128 10.9265 16.5868 7.2346C14.9128 3.54363 12.0931 1.34863 8.99978 1.34773C5.90736 1.34863 3.08674 3.54363 1.41273 7.2346ZM9.00164 14.4703H8.99804H8.99714C5.27471 14.4676 1.93209 11.8629 0.0546754 7.50073C-0.0182251 7.33091 -0.0182251 7.13864 0.0546754 6.96883C1.93209 2.60759 5.27561 0.00288103 8.99714 0.000185582C8.99894 -0.000712902 8.99894 -0.000712902 8.99984 0.000185582C9.00164 -0.000712902 9.00164 -0.000712902 9.00254 0.000185582C12.725 0.00288103 16.0676 2.60759 17.945 6.96883C18.0188 7.13864 18.0188 7.33091 17.945 7.50073C16.0685 11.8629 12.725 14.4676 9.00254 14.4703H9.00164Z"
                            fill="currentColor" />
                    </svg>
                    <span class="tp-product-tooltip">Quick View</span>
                </button>
                <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329C7.41078 1.33952 5.85105 1.07778 4.42936 1.53473C1.54465 2.4609 0.820172 5.55014 1.60355 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.203 6.67473C13.8627 6.67473 13.5743 6.41474 13.5462 6.07159C13.4882 5.35202 13.0046 4.7445 12.3162 4.52302C11.9689 4.41097 11.779 4.04068 11.8906 3.69666C12.0041 3.35175 12.3724 3.16442 12.7206 3.27297C13.919 3.65901 14.7586 4.71561 14.8615 5.96479C14.8905 6.32632 14.6206 6.64322 14.2575 6.6721C14.239 6.67385 14.2214 6.67473 14.203 6.67473Z"
                            fill="currentColor" />
                    </svg>
                    <span class="tp-product-tooltip">Add To Wishlist</span>
                </button>
            </div>
        </div>

        <div class="tp-product-add-cart-btn-large-wrapper">
            <?php exdos_add_to_cart(); ?>
        </div>
    </div>
    <div class="tp-product-content">
        <div class="tp-product-tag">
            <?php 
                $terms = get_the_terms( get_the_ID(), 'product_cat' );
                if ( $terms && ! is_wp_error( $terms ) ) :
                    echo '<span>' . join( ', ', wp_list_pluck( $terms, 'name' ) ) . '</span>';
                endif;
            ?>
        </div>
        <h3 class="tp-product-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="tp-product-price-wrapper">
            <?php 
            $sale_price = get_post_meta( get_the_ID(), '_sale_price', true );
            if ( ! empty( $sale_price ) && $sale_price != 0 ) : ?>
            <span class="tp-product-price"><?php echo wc_price( $sale_price ); ?></span>
            <span
                class="tp-product-price old-price"><?php echo wc_price( get_post_meta( get_the_ID(), '_regular_price', true ) ); ?></span>

            <?php else : ?>
            <span
                class="tp-product-price"><?php echo wc_price( get_post_meta( get_the_ID(), '_regular_price', true ) ); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php 
 
}

add_action('woocommerce_before_shop_loop_item', 'exdos_product_grid');