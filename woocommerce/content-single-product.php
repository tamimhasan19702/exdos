<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>







    <div class="row">
        <div class="col-lg-6">
            <div class="tp-product-details-thumb-wrapper tp-tab pb-50">

                <?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

            </div>
        </div>
        <div class="col-lg-6">





            <div class="summary entry-summary">
                <?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
            </div>







            <!-- <div class="tp-product-details-wrapper pb-50">
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
                                    <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1H10" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <input class="tp-cart-input" type="text" value="1">
                                <span class="tp-cart-plus">
                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H10" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="tp-product-details-add-to-cart mb-15 mr-10">
                            <button class="tp-product-details-add-to-cart-btn w-100">Add To Cart</button>
                        </div>
                        <div class="tp-product-details-wishlist mb-15">
                            <button class="tp-product-details-wishlist-btn">
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
            </div> -->


        </div>
    </div>









    <?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>