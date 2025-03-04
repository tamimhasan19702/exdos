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
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);



// quick view and wishlist, compare
add_filter('woosc_button_position_archive', '__return_false');
add_filter('woosc_button_position_single', '__return_false');
add_filter('woosq_button_position', '__return_false');
add_filter('woosw_button_position_single', '__return_false');
add_filter('woosw_button_position_archive', '__return_false');



// woocommerce sorting




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

            <?php woocommerce_template_single_add_to_cart();?>

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


function exdos_product_images() {
    global $product;

    if (!is_a($product, 'WC_Product')) {
        return;
    }

    $featured_image_id = $product->get_image_id();
    $gallery_image_ids = $product->get_gallery_image_ids();

    $image_ids = [];

    if ($featured_image_id) {
        $image_ids[] = $featured_image_id;
    }

    if (!empty($gallery_image_ids)) {
        $image_ids = array_merge($image_ids, $gallery_image_ids);
    }

    if (empty($image_ids)) {
        return;
    }

    ?>
<div class="tp-product-details-thumb-wrapper tp-tab pb-50">
    <div class="tab-content m-img" id="productDetailsNavContent">
        <?php foreach ($image_ids as $index => $image_id) : 
                $i = $index + 1;
                $active_class = $i === 1 ? 'show active' : '';
                $image_url = wp_get_attachment_image_url($image_id, 'full');
                $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: get_the_title($product->get_id());
                ?>
        <div class="tab-pane fade <?php echo $active_class; ?>" id="nav-<?php echo $i; ?>" role="tabpanel"
            aria-labelledby="nav-<?php echo $i; ?>-tab" tabindex="0">
            <div class="tp-product-details-nav-main-thumb">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <nav>
        <div class="nav nav-tabs" id="productDetailsNavThumb" role="tablist">
            <?php foreach ($image_ids as $index => $image_id) : 
                    $i = $index + 1;
                    $active_class = $i === 1 ? 'active' : '';
                    $thumb_url = wp_get_attachment_image_url($image_id, 'woocommerce_thumbnail');
                    $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: get_the_title($product->get_id());
                    ?>
            <button class="nav-link <?php echo $active_class; ?>" id="nav-<?php echo $i; ?>-tab" data-bs-toggle="tab"
                data-bs-target="#nav-<?php echo $i; ?>" type="button" role="tab" aria-controls="nav-<?php echo $i; ?>"
                aria-selected="<?php echo $i === 1 ? 'true' : 'false'; ?>">
                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
            </button>
            <?php endforeach; ?>
        </div>
    </nav>
</div>
<?php
}


add_action('woocommerce_before_single_product_summary', 'exdos_product_images');


function exdos_quantity_script() {
    ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    function changeQuantity(amount) {
        const input = document.getElementById('quantity-input');
        let currentValue = parseInt(input.value);
        currentValue += amount;
        if (currentValue < 1) currentValue = 1; // Prevent negative or zero quantity
        input.value = currentValue;
        updateHiddenQuantity(); // Ensure hidden field is updated
    }

    function updateHiddenQuantity() {
        const quantity = document.getElementById('quantity-input').value;
        document.getElementById('hidden-quantity').value = quantity; // Update hidden input with the quantity
    }

    // Add event listeners for quantity change buttons
    const minusBtn = document.querySelector('.tp-cart-minus');
    const plusBtn = document.querySelector('.tp-cart-plus');

    if (minusBtn && plusBtn) {
        minusBtn.addEventListener('click', function() {
            changeQuantity(-1);
        });
        plusBtn.addEventListener('click', function() {
            changeQuantity(1);
        });
    }
});


// group product quantity

document.addEventListener('DOMContentLoaded', function() {
    function handleQuantityChange(button, change) {
        const quantityDiv = button.closest('.quantity'); // Find the closest quantity div
        const input = quantityDiv.querySelector('input.qty'); // Select the input field
        let currentValue = parseInt(input.value) || 0; // Get the current value or default to 0
        currentValue += change; // Update the value based on button clicked

        // Set minimum value to 0
        if (currentValue < 0) currentValue = 0;

        // Update the input value
        input.value = currentValue;
        input.dispatchEvent(new Event('change', {
            bubbles: true
        })); // Trigger change event
    }

    // Attach event listeners to all minus and plus buttons
    const groupedTable = document.querySelector('.woocommerce-grouped-product-list');
    if (groupedTable) {
        groupedTable.querySelectorAll('.minus, .plus').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default button behavior
                const isMinus = this.classList.contains(
                    'minus'); // Check if it's a minus button
                handleQuantityChange(this, isMinus ? -1 : 1); // Call the function with -1 or +1
            });
        });
    }
});
</script>
<?php
}

add_action('wp_footer', 'exdos_quantity_script');