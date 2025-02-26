<?php 

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_shop_loop_header' ,'woocommerce_product_taxonomy_archive_header', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// product archive
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// product details
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


// quick view and wishlist, compare
add_filter('woosc_button_position_archive', '__return_false');
add_filter('woosc_button_position_single', '__return_false');
add_filter('woosq_button_position', '__return_false');
add_filter('woosw_button_position_single', '__return_false');
add_filter('woosw_button_position_archive', '__return_false');

// add to cart
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


// product grid
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



                <div class="tp-product-action-btn tp-product-add-cart-btn">
                    <?php echo do_shortcode('[woosc id="' . get_the_ID() . '"]') ?>
                    <span class="tp-product-tooltip">Add To Compare</span>
                </div>


                <div class="tp-product-action-btn tp-product-quick-view-btn">
                    <?php echo do_shortcode('[woosq id="' . get_the_ID() . '"]')?>
                    <span class="tp-product-tooltip">Quick View</span>
                </div>


                <div class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                    <?php echo do_shortcode('[woosw id="' . get_the_ID() . '"]')?>
                    <span class="tp-product-tooltip">Add To Wishlist</span>
                </div>


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


// single product details

function exdos_single_product_details() {


    global $product;
   

    ?>



<div class="tp-product-details-wrapper pb-50">
    <div class="tp-product-details-category">
        <span><?php the_terms( get_the_ID(), 'product_cat' ); ?></span>
    </div>
    <h3 class="tp-product-details-title mb-20"><?php the_title(); ?></h3>


    <div class="tp-product-details-inventory mb-25 d-flex align-items-center justify-content-between">

        <div class="tp-product-details-price-wrapper">
            <span class="tp-product-details-price"><?php woocommerce_template_single_price(); ?></span>
            <div class="tp-product-details-rating-wrapper d-flex align-items-center">
                <?php woocommerce_template_single_rating();?>
            </div>
        </div>
    </div>
    <p><?php echo $product->get_short_description(); ?></p>



    <div class="tp-product-details-action-wrapper mb-10">
        <h3 class="tp-product-details-action-title">Quantity</h3>
        <div class="tp-product-details-action-item-wrapper d-flex flex-wrap align-items-center">
            <div class="tp-product-details-quantity">
                <div class="tp-product-quantity mb-15 mr-15">
                    <span class="tp-cart-minus">
                        <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    <input class="tp-cart-input" type="text" value="1">
                    <span class="tp-cart-plus">
                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="tp-product-details-add-to-cart mb-15 mr-10">
                <?php exdos_add_to_cart(); ?>
            </div>
            <div class="tp-product-details-wishlist mb-15">
                <div class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                    <?php echo do_shortcode('[woosw id="' . get_the_ID() . '"]')?>
                    <span class="tp-product-tooltip">Add To Wishlist</span>
                </div>
            </div>
        </div>
    </div>

    <div class="tp-product-details-query">
        <?php if( $product->get_sku()  ): ?>
        <div class="tp-product-details-query-item d-flex align-items-center">
            <span><?php esc_html_e( 'SKU: ', 'exdos' ); ?></span>
            <p>#<?php echo $product->get_sku(); ?></p>
        </div>
        <?php endif; ?>
        <?php if( get_the_term_list( $product->get_id(), 'product_cat', '', ', ', '' ) ): ?>
        <div class="tp-product-details-query-item d-flex align-items-center">
            <span><?php esc_html_e( 'Category: ', 'exdos' ); ?></span>
            <p><?php echo get_the_term_list( $product->get_id(), 'product_cat', '', ', ', '' ); ?></p>
        </div>
        <?php endif; ?>
        <?php if( get_the_term_list( $product->get_id(), 'product_tag', '', ', ', '' ) ): ?>
        <div class="tp-product-details-query-item d-flex align-items-center">
            <span><?php esc_html_e( 'Tags: ', 'exdos' ); ?> </span>
            <p><?php echo get_the_term_list( $product->get_id(), 'product_tag', '', ', ', '' ); ?></p>
        </div>
        <?php endif; ?>
    </div>
    <div class="tp-product-details-social">

        <?php
                            $product = wc_get_product(get_the_ID());
                            $product_title = $product->get_name();
                            $product_url = get_permalink();
                            $product_image = wp_get_attachment_image_src($product->get_image_id(), 'full')[0];
                            $share_links = array(
                                'facebook' => "https://www.facebook.com/sharer/sharer.php?u=" . $product_url,
                                'twitter' => "https://twitter.com/intent/tweet?text=" . $product_title . "&url=" . $product_url,
                                'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url=" . $product_url,
                                'pinterest' => "https://pinterest.com/pin/create/button/?url=" . $product_url . "&media=" . $product_image . "&description=" . $product->get_short_description(),
                            );

                            foreach ($share_links as $key => $share_link) :
                                if (get_post_meta(get_the_ID(), 'exdos_share_' . $key, true) !== 'no') :
                                    ?>
        <a href="<?php echo esc_url($share_link); ?>" target="_blank"><i
                class="fab fa-<?php echo esc_attr($key); ?>"></i></a>
        <?php
                                endif;
                            endforeach;
                            ?>

    </div>
</div>


<?php 
    
    
}

add_action('woocommerce_single_product_summary', 'exdos_single_product_details');