<!-- footer start  -->
<footer class="tp-theme-black-bg p-relative">

    <div class="tp-footer-shape-01 p-absolute">
        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/shape/footer/shape-01.png" alt="">
    </div>
    <div class="tp-footer-shape-02 p-absolute">
        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/shape/footer/shape-02.png" alt="">
    </div>
    <div class="tp-footer-shape-03 p-absolute">
        <img src="<?php echo get_template_directory_uri(); ?> /assets/img/shape/footer/shape-03.png" alt="">
    </div>
    <div class="tp-footer-shape-04 p-absolute">
        <img src=" <?php echo get_template_directory_uri(); ?> /assets/img/shape/footer/shape-04.png" alt="">
    </div>

    <div class="container">

        <?php get_template_part('template-parts/footer/footer-logo-area'); ?>

        <?php get_template_part('template-parts/footer/footer-widget-area'); ?>

        <?php get_template_part('template-parts/footer/footer-copyright'); ?>
    </div>
</footer>
<!-- footer end  -->

<?php wp_footer() ?>
</body>

</html>