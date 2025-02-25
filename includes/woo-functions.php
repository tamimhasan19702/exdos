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
    ?>



<div class="tp-product-details-wrapper pb-50">
    <div class="tp-product-details-category">
        <span>Computers & Tablets</span>
    </div>
    <h3 class="tp-product-details-title mb-20">Sulwhasoo Essential Cream</h3>


    <div class="tp-product-details-inventory mb-25 d-flex align-items-center justify-content-between">

        <div class="tp-product-details-price-wrapper">
            <span class="tp-product-details-price">$1,260.00</span>
            <div class="tp-product-details-rating-wrapper d-flex align-items-center">
                <div class="tp-product-details-rating">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
                <div class="tp-product-details-reviews">
                    <span>(36 Reviews)</span>
                </div>
            </div>
        </div>
    </div>
    <p>A Screen Everyone Will Love: Whether your family is streaming or video chatting with friends tablet
        A8... <span>See more</span></p>



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
                <button class="tp-product-details-add-to-cart-btn w-100">Add To Cart</button>
            </div>
            <div class="tp-product-details-wishlist mb-15">
                <button class="tp-product-details-wishlist-btn">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.52624 7.48527C2.69896 11.0641 7.33213 13.9579 8.5634 14.6742C9.79885 13.9505 14.4655 11.0248 15.6006 7.48855C16.3458 5.20273 15.6541 2.30731 12.9055 1.43844C11.5738 1.01918 10.0205 1.27434 8.94817 2.08824C8.724 2.25726 8.41284 2.26054 8.18699 2.09317C7.05107 1.25547 5.56719 1.01015 4.21463 1.43844C1.47019 2.30649 0.780949 5.20191 1.52624 7.48527ZM8.56367 16C8.45995 16 8.35706 15.9754 8.26338 15.9253C8.00157 15.785 1.83433 12.4507 0.331203 7.86098C0.330366 7.86098 0.330366 7.86016 0.330366 7.86016C-0.613163 4.97048 0.437434 1.3391 3.82929 0.266748C5.42192 -0.238659 7.15758 -0.0163125 8.56116 0.852561C9.92125 0.009122 11.728 -0.22389 13.2888 0.266748C16.684 1.34074 17.738 4.9713 16.7953 7.86016C15.3407 12.3973 9.12828 15.7818 8.86479 15.9237C8.77111 15.9746 8.66739 16 8.56367 16Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.5155 6.78932C13.1918 6.78932 12.9174 6.54564 12.8906 6.22402C12.8354 5.5496 12.3754 4.9802 11.7204 4.77262C11.39 4.6676 11.2094 4.32054 11.3156 3.9981C11.4235 3.67483 11.774 3.49926 12.1052 3.60099C13.2453 3.96282 14.0441 4.95312 14.142 6.12393C14.1696 6.46278 13.9128 6.75979 13.5673 6.78686C13.5498 6.7885 13.5331 6.78932 13.5155 6.78932Z"
                            fill="currentColor" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="tp-product-details-query">
        <div class="tp-product-details-query-item d-flex align-items-center">
            <span>SKU: </span>
            <p>NTB7SDVX44</p>
        </div>
        <div class="tp-product-details-query-item d-flex align-items-center">
            <span>Category: </span>
            <p>Computers & Tablets</p>
        </div>
        <div class="tp-product-details-query-item d-flex align-items-center">
            <span>Tag: </span>
            <p>Android</p>
        </div>
    </div>
    <div class="tp-product-details-social">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-vimeo-v"></i></a>
    </div>
</div>


<?php 
    
    
}

add_action('woocommerce_single_product_summary', 'exdos_single_product_details');