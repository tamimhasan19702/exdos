<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>

<div class="tp-product-details-rating">
    <?php
    // Always display 5 stars, filled based on the average rating
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $average) {
            echo '<span><i class="fas fa-star" style="color: #ffc107;"></i></span>'; // Full star (rated)
        } else {
            echo '<span><i class="fas fa-star" style="color: #ccc;"></i></span>'; // Empty star (unrated)
        }
    }
    ?>
</div>
<div class="tp-product-details-reviews">
    <span>(<?php echo esc_html( $review_count ); ?> Reviews)</span>
</div>