<?php
/**
 * The template to display the reviewers star rating in reviews
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/review-rating.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $comment;
$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

if ( $rating && wc_review_ratings_enabled() ) {
    // Display stars based on the rating
    for ( $i = 1; $i <= 5; $i++ ) {
        if ( $i <= $rating ) {
            echo '<span><i class="fas fa-star" style="color: #ffc107;"></i></span>'; // Full star (rated)
        } else {
            echo '<span><i class="fas fa-star" style="color: #ccc;"></i></span>'; // Empty star (unrated)
        }
    }
}
?>