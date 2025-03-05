<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 */
if (!defined('ABSPATH')) {
    exit;
}

$product_tabs = apply_filters('woocommerce_product_tabs', array());
global $product;

if (!empty($product_tabs)) : ?>

<div class="tp-product-details-tab-nav tp-tab mb-50">
    <nav>
        <div class="nav nav-tabs p-relative tp-product-tab justify-content-sm-start justify-content-center" id="nav-tab"
            role="tablist">
            <?php foreach ($product_tabs as $key => $product_tab) : ?>
            <button
                class="nav-link <?php echo esc_attr($key); ?>_tab <?php echo ($key === 'description' ? 'active' : ''); ?>"
                id="nav-<?php echo esc_attr($key); ?>-tab" data-bs-toggle="tab"
                data-bs-target="#nav-<?php echo esc_attr($key); ?>" type="button" role="tab"
                aria-controls="nav-<?php echo esc_attr($key); ?>"
                aria-selected="<?php echo ($key === 'description' ? 'true' : 'false'); ?>">
                <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
            </button>
            <?php endforeach; ?>
        </div>
    </nav>

    <div class="tab-content pt-30" id="nav-tabContent">
        <?php foreach ($product_tabs as $key => $product_tab) : ?>
        <div class="tab-pane fade <?php echo ($key === 'description' ? 'show active' : ''); ?>"
            id="nav-<?php echo esc_attr($key); ?>" role="tabpanel"
            aria-labelledby="nav-<?php echo esc_attr($key); ?>-tab" tabindex="0">

            <div class="tp-product-details-desc-wrapper">
                <?php 
                    if ($key === 'description') {
                        the_content();
                    }
                    ?>
            </div>

            <?php if ($key === 'additional_information') : ?>
            <div class="tp-product-details-additional-info tp-table-style-2">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <h3 class="tp-product-details-additional-info-title">
                            <?php esc_html_e('Additional information', 'woocommerce'); ?>
                        </h3>
                        <?php do_action('woocommerce_product_additional_information', $product); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <?php if ($key === 'reviews') : ?>
            <div class="tp-product-details-review-wrapper tp-product-details-review-wrapper-2">
                <h3 class="tp-product-details-review-title-2">
                    <?php comments_number(__('No reviews', 'woocommerce'), __('1 review', 'woocommerce'), __('% reviews', 'woocommerce')); ?>
                </h3>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-product-details-review-item-wrapper-2">
                            <?php
                                    $comments = get_comments(array(
                                        'post_id' => $product->get_id(),
                                        'status' => 'approve',
                                        'type' => 'review',
                                    ));

                                    if ($comments) :
                                        foreach ($comments as $comment) :
                                            $rating = intval(get_comment_meta($comment->comment_ID, 'rating', true));
                                    ?>
                            <div class="tp-product-details-review-item-2 mb-35">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="tp-product-details-review-avater-2 d-flex">
                                            <div class="tp-product-details-review-avater-thumb">
                                                <?php echo get_avatar($comment, 80); ?>
                                            </div>
                                            <div class="tp-product-details-review-avater-content">
                                                <div
                                                    class="tp-product-details-review-avater-rating d-flex align-items-center">
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <span><i
                                                            class="<?php echo $i <= $rating ? 'fas' : 'far'; ?> fa-star"></i></span>
                                                    <?php endfor; ?>
                                                </div>
                                                <h3 class="tp-product-details-review-avater-title">
                                                    <?php comment_author($comment); ?>
                                                </h3>
                                                <span class="tp-product-details-review-avater-meta mb-10">
                                                    <?php echo esc_html(get_comment_date('F j, Y', $comment)); ?>
                                                </span>
                                                <div class="tp-product-details-review-avater-comment">
                                                    <?php comment_text($comment); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="tp-product-details-review-form pt-55">
                            <?php
        // Check if the user is logged in
        if ( is_user_logged_in() ) {
            // If the user is logged in, use the default comment form
            $args = array(
                'title_reply' => __('Add a Review', 'woocommerce'),
                'title_reply_to' => '',
                'title_reply_before' => '<h3 class="tp-product-details-review-form-title">',
                'title_reply_after' => '</h3>',
                'comment_notes_before' => '<p>' . esc_html__('Your email address will not be published. Required fields are marked *', 'woocommerce') . '</p>',
                'logged_in_as' => '',
                'comment_field' => '',
                'fields' => array(),
                'label_submit' => __('Submit Review', 'woocommerce'),
                'class_submit' => 'tp-btn',
                'submit_button' => '<button type="submit" name="%1$s" id="%2$s" class="%3$s"><span class="tp-btn-wrap"><span class="tp-btn-y-1">%4$s</span><span class="tp-btn-y-2">%4$s</span></span><i></i></button>'
            );

            // Add star rating selection
            $args['comment_field'] = '
                <div class="tp-product-details-review-form-rating d-flex align-items-center mb-30">
                    <p>' . esc_html__('Your Rating:', 'woocommerce') . '</p>
                    <div class="tp-product-details-review-form-rating-icon d-flex align-items-center" id="star-rating">
                        <span class="star" data-value="1"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="2"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="3"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="4"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="5"><i class="fas fa-star"></i></span>
                        <input type="hidden" name="rating" id="rating" value="" required />
                    </div>
                </div>';

            // Add the comment textarea
            $args['comment_field'] .= '<div class="col-md-12 mb-45"><textarea name="comment" cols="30" rows="10" placeholder="' . esc_attr__('Your Review *', 'woocommerce') . '" required></textarea></div>';

            // Display the comment form
            comment_form(apply_filters('woocommerce_product_review_comment_form_args', $args));
        } else {
            // If the user is not logged in, show name and email fields
            ?>
                            <h3 class="tp-product-details-review-form-title"><?php _e('Add a Review', 'woocommerce'); ?>
                            </h3>
                            <p><?php esc_html_e('Your email address will not be published. Required fields are marked *', 'woocommerce'); ?>
                            </p>
                            <div class="tp-product-details-review-form-rating d-flex align-items-center mb-30">
                                <p><?php esc_html_e('Your Rating:', 'woocommerce'); ?></p>
                                <div class="tp-product-details-review-form-rating-icon d-flex align-items-center"
                                    id="star-rating">

                                    <input type="hidden" name="rating" id="rating" value="" required />
                                </div>
                            </div>

                            <div class="col-md-12 mb-30">
                                <input name="author" type="text"
                                    placeholder="<?php esc_attr_e('Your Name *', 'woocommerce'); ?>" required />
                            </div>
                            <div class="col-md-12 mb-30">
                                <input name="email" type="email"
                                    placeholder="<?php esc_attr_e('Your Email *', 'woocommerce'); ?>" required />
                            </div>

                            <div class="col-md-12 mb-45">
                                <textarea name="comment" cols="30" rows="10"
                                    placeholder="<?php esc_attr_e('Your Review *', 'woocommerce'); ?>"
                                    required></textarea>
                            </div>
                            <button type="submit"
                                class="tp-btn"><?php esc_html_e('Submit Review', 'woocommerce'); ?></button>
                            <?php
        }
        ?>
                        </div>
                    </div>

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const stars = document.querySelectorAll('#star-rating .star');

                        stars.forEach(star => {
                            star.addEventListener('click', function() {
                                const value = this.getAttribute('data-value');

                                // Remove active class from all stars
                                stars.forEach(s => s.classList.remove('active'));

                                // Add active class to the selected star and all previous stars
                                for (let i = 0; i < value; i++) {
                                    stars[i].classList.add('active');
                                }
                            });
                        });
                    });
                    </script>

                    <style>
                    .star {
                        cursor: pointer;
                        font-size: 24px;
                        color: #ccc;
                        /* Default color for unselected stars */
                    }

                    .star.active {
                        color: #ffc107;
                        /* Color for selected stars */
                    }
                    </style>

                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>