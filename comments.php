<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
    return;
}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
<h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>

<ul class="commentlist">
    <?php wp_list_comments(); ?>
</ul>

<?php else : // this is displayed if there are no comments so far ?>

<?php if ( comments_open() ) : ?>
<!-- If comments are open, but there are no comments. -->

<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments">Comments are closed.</p>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div class="contact-form-box mb-50">
    <div class="tp-section-title-wrapper mb-30 mt-30">
        <h2 class="tp-section-title mb-20 tp-fs-40">Leave a reply</h2>
    </div>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

        <div class="row">
            <?php if ( is_user_logged_in() ) : ?>
            <p>Logged in as <a
                    href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
                <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out
                    &raquo;</a></p>
            <?php else : ?>
            <div class="col-md-12 mb-30">
                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>"
                    placeholder="Full Name*" required />
            </div>
            <div class="col-md-6 mb-30">
                <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>"
                    placeholder="Email Here*" required />
            </div>
            <div class="col-md-6 mb-30">
                <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>"
                    placeholder="Website*" />
            </div>
            <?php endif; ?>

            <div class="col-md-12 mb-45">
                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Comments*" required></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="tp-btn">
                    <span class="tp-btn-wrap">
                        <span class="tp-btn-y-1">Post Comment</span>
                        <span class="tp-btn-y-2">Post Comment</span>
                    </span>
                    <i></i>
                </button>
                <?php comment_id_fields(); ?>
            </div>
            <?php do_action('comment_form', $post->ID); ?>
        </div>
    </form>
</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // End of comments open check ?>