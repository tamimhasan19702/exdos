<?php
// Check if comments are allowed for the current post
if (comments_open()) :
    ?>
<div id="comments" class="contact-form-box mb-50">
    <?php
        // Check if there are comments to display
        if (have_comments()) :
            ?>
    <div class="tp-postbox-comments-wrapper">
        <div class="tp-postbox-comments">
            <!-- Display the number of comments -->
            <h3 class="tp-section-title mb-20 tp-fs-40 mb-30 mt-30">
                <?php
                        $comment_count = get_comments_number(); // Get the number of comments
                        echo esc_html($comment_count) . ' ' . _n('Comment', 'Comments', $comment_count, 'exdos'); // Display comment count
                        ?>
            </h3>
            <!-- List the comments -->
            <ul class="postbox__comment mb-95">
                <?php
                        wp_list_comments(array(
                            'style'       => 'ul',
                            'short_ping'  => true,
                            'callback' => 'custom_comment_list' // Use custom callback for comment list
                        ));
                        ?>
            </ul>
        </div>
    </div>

    <?php
            // Display pagination for comments if needed
            the_comments_pagination(array(
                'prev_text' => esc_html__('Previous', 'exdos'), // Text for previous page
                'next_text' => esc_html__('Next', 'exdos'), // Text for next page
            ));
        endif;
        
        // Determine if the user is logged in to apply a CSS class
        if ( is_user_logged_in() ) {
            $cl = 'loginformuser'; // Class for logged-in users
        } else {
            $cl = '';
        }

        $commenter = wp_get_current_commenter(); // Get current commenter's details
        $req = get_option('require_name_email'); // Check if name and email are required

        // Define fields for the comment form
        $fields = array(
            'author' => '<div class="row"><div class="col-md-12 mb-30"><input type="text" name="author" id="author" placeholder="' . esc_attr__('Full Name*', 'exdos') . '" value="' . esc_attr($commenter['comment_author']) . '" ' . ($req ? 'required' : '') . '>
            </div>',
            'email' => '<div class="col-md-6 mb-30">
               <input type="email" name="email" id="email" placeholder="' . esc_attr__('Email', 'exdos') . '" value="' . esc_attr($commenter['comment_author_email']) . '" ' . ($req ? 'required' : '') . '>
         </div>',
            'url' => '<div class="col-md-6 mb-30">
               <input type="text" name="url" id="url" placeholder="' . esc_attr__('Website', 'exdos') . '" value="' . esc_attr($commenter['comment_author_url']) . '">
         </div></div>',
        );

        // Default settings for the comment form
        $defaults = [
            'fields'             => $fields, // Fields for the form
            'comment_field' => '<div class="col-md-12 mb-45 ' . $cl . '">
                       <textarea id="comment" name="comment" placeholder="' . esc_attr__('Your Comment Here...', 'exdos') . '" required></textarea>
                </div>
            ',
            'submit_button' => '<div class="col-12">
                                    <button type="submit" class="tp-btn">
                                        <span class="tp-btn-wrap">
                                            <span class="tp-btn-y-1">' . esc_html__('Post Comment', 'exdos') . '</span>
                                            <span class="tp-btn-y-2">' . esc_html__('Post Comment', 'exdos') . '</span>
                                        </span>  
                                        <i></i>
                                    </button>
                                </div>',
            'cookies' => '<div class="col-xxl-12">
                <div class="postbox__comment-agree d-flex align-items-start mb-25">' .
                '<input class="e-check-input" type="checkbox" id="e-agree" name="wp-comment-agree" value="1" checked>' .
                '<label class="e-check-label" for="e-agree">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'exdos') . '</label></div>
            </div>'
        ];
        // Display the comment form
        comment_form($defaults);
        ?>
</div><!-- .comments-area -->
<?php endif; ?>

<?php
// Function to move the comment textarea to the bottom of the form
function move_comment_textarea_to_bottom($fields) {
    $comment_field = $fields['comment']; // Get the comment field
    unset($fields['comment']); // Remove it from its current position
    $fields['comment'] = $comment_field; // Add it to the end

    return $fields; // Return the modified fields
}

// Hook the function to change the order of comment form fields
add_action('comment_form_fields', 'move_comment_textarea_to_bottom');

// Custom callback to list each comment
function custom_comment_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

    if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') {
        // Display pingbacks and trackbacks differently if needed
        ?>
<li class="pingback">
    <p><?php esc_html_e('Pingback:', 'exdos'); ?> <?php comment_author_link(); ?></p>
</li>

<?php
    } else {
        // Display regular comments
        ?>

<li <?php comment_class('comment'); ?> id="comment-<?php comment_ID(); ?>">
    <div class="tp-postbox-comments-thumb br-5">
        <?php echo get_avatar($comment, 120); // Display the commenter's avatar ?>
    </div>
    <div class="tp-postbox-comments-text">
        <h5 class="tp-postbox-comments-author"><?php comment_author(); // Display the commenter's name ?></h5>
        <span><?php comment_date(); // Display the date of the comment ?></span>
        <?php comment_text(); // Display the content of the comment ?>

        <div class="comments-reply-link">
            <i class="fal fa-reply-all com-icon"></i>
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => esc_html__('Reply', 'exdos')))); // Link for replying to comments ?>
        </div>
    </div>
    <?php
    }
}