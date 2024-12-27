<?php ?>

<div class="tp-main-menu pl-45 d-none d-xl-block">
    <nav class="tp-mobile-menu-active">
        <?php
        if (has_nav_menu('Exdos Main Menu')) {
            wp_nav_menu(array(
                'theme_location' => 'Exdos Main Menu', // Change this to your registered menu location
                'menu_class' => '', // You can add a class here if needed
                'container' => false, // No container
                'walker' => new Exdos_Walker_Nav_Menu(), // Use the custom walker
            ));
        } else {
            echo '<p>Please assign a menu to the "Exdos Main Menu" location.</p>';
        }
        ?>
    </nav>
</div>