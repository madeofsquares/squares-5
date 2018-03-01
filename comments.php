<?php
if ( post_password_required() ) {
    return;
}
?>

<?php if ( have_comments() ) : ?>
    <h2>Comments</h2>

    <?php the_comments_navigation( array(
        'prev-text'     => 'Older comments',
        'next_text'     => 'Newer comments'
    ) ); ?>

    <div class="comment-list">
        <?php
            wp_list_comments( array(
                'style'             => 'div',
                'avatar_size'       => 48,
                'type'              => 'comment',
            ) );
        ?>
    </div>

    <?php the_comments_navigation( array(
        'prev-text'     => 'Older comments',
        'next_text'     => 'Newer comments'
    ) );

endif;

if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p>Comments are closed.</p>
<?php endif;

$fields = array(
    'author'    => '<div><label for="author">Name</label><input id="author" name="author" type="text" aria-required="true"></div>',
    'email'     => '<div><label for="email">Email</label><input id="email" name="email" type="email" aria-describedby="email-notes" aria-required="true"></div>',
    'url'       => '<div><label for="url">Website</label><input id="url" name="url" type="url"></div>',
);

comment_form( array(
    'title_reply_before'        => '<h3>',
    'title_reply_after'         => '</h3>',
    'fields'                    => $fields,
    'comment_field'             => '<div><label for="comment">Comment</label><textarea id="comment" name="comment" rows="4" aria-required="true" required="required"></textarea></div>',
    'comment_notes_before'      => '',
    'submit_button'             => '<input name="submit" type="submit" id="submit" class="%3$s" value="Submit" />',
    'submit_field'              => '<div class="form-submit">%1$s %2$s</div>',
) ); ?>