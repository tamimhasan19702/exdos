<?php 

function exdos_scripts() {

   
    // css 
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.3', 'all' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '4.1.1', 'all' );
    wp_enqueue_style( 'fontawesome-pro', get_template_directory_uri() . '/assets/css/fontawesome-pro.min.css', array(), '5.15.4', 'all' );
    wp_enqueue_style( 'flaticon-exdos', get_template_directory_uri() . '/assets/css/flaticon-exdos.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '11.0.7', 'all' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // js 
    wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.3.3', true );
    wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array( 'imagesloaded' ), '5.3.3', true );
    wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '5.3.3', true );
    wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array( 'jquery' ), '5.3.3', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array( 'jquery' ), '5.3.3', true );
    wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array( 'jquery' ), '5.3.3', true );
    wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array( 'jquery' ), '5.3.3', true );
    wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/assets/js/jarallax.min.js', array( 'jquery' ), '5.3.3', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}