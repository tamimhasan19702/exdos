<?php

/**
 * Outputs the HTML structure for a preloader animation.
 * 
 * This function generates the necessary HTML markup for a preloader, which is 
 * typically displayed on a webpage while content is being loaded. The preloader 
 * consists of a loading container with four rotating objects, styled using CSS.
 */

function exdos_preloader()
{
    ?>
    <!-- preloader  -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <?php

}

// exdos_preloader();