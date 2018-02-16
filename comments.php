<?php
if ( post_password_required() ) {
    return;
}
?>

<?php if ( have_comments() ) : ?>
	<h2>Comments</h2>

	<?php the_comments_navigation( array(
		'prev-text'     =>  'Older comments',
		'next_text'     =>  'Newer comments'
	) ); ?>

	<ul>
		<?php
			wp_list_comments( array(
				'style'         =>  'ul',
				'avatar_size'   =>  50
			) );
		?>
	</ul>

	<?php the_comments_navigation( array(
		'prev-text'     =>  'Older comments',
		'next_text'     =>  'Newer comments'
	) );

endif;

if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p>Comments are closed.</p>
<?php endif;

comment_form( array(
	'title_reply_before'    =>  '<h3>',
	'title_reply_after'     =>  '</h3>'
) ); ?>