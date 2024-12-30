<?php

?>
<div class="tp-pagination mb-60">
    <?php
    the_posts_pagination(array(
        'prev_text' => '<i class="fal fa-long-arrow-left"></i>',
        'next_text' => '<i class="fal fa-long-arrow-right"></i>',
        'type' => 'list',
    ));
    ?>
</div>