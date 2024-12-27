<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exdos - Creative Agency HTML Template </title>

    <?php wp_head(); ?>
</head>

<body>


    <!-- scroll to top  -->
    <button id="back-to-top"><i class="far fa-arrow-up"></i></button>

    <!-- preloader  -->
    <?php get_template_part('template-parts/header/preloader'); ?>


    <!-- header start  -->
    <?php get_template_part('template-parts/header/header-part'); ?>
    <!-- header end  -->

    <!-- tp header search  -->
    <?php get_template_part('template-parts/header/tp-header-search'); ?>

    <!-- tp-offcanvas  -->

    <?php get_template_part('template-parts/header/tp-offcanvas'); ?>