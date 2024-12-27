<?php
$search_title = get_theme_mod('exdos_search_text', 'What are you looking for?');
$search_placeholder = get_theme_mod('exdos_search_placeholder', 'Email Here');

?>

<div class="tp-header-search-bar d-flex align-items-center">
    <button class="tp-search-close">×</button>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="tp-search-bar text-center">
                    <h2 class="tp-search-bar-title mb-30">
                        <?php echo esc_html($search_title); ?>
                    </h2>
                    <div class="contact-form-box contact-search-form-box">
                        <form action="/" method="get">
                            <input type="text" name="s" id="search" value="<?php echo get_search_query(); ?>"
                                placeholder="<?php echo esc_attr($search_placeholder); ?>">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>