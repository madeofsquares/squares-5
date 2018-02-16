<?php
	$cats = get_the_category();
	$default_avatar = get_template_directory_uri() . '/assets/avatar-default.png';
	$archive_year = get_the_time( 'Y' );
	$archive_month = get_the_time( 'M' );
?>
<div class="meta">
	<div class="meta-author"><?php echo get_avatar( get_the_author_meta('ID'), 32, $default_avatar ); ?><p><?php the_author_posts_link(); ?></p></div>
	<div class="meta-date"><p><a href="<?php echo get_month_link( $archive_year, $archive_month ); ?>"><?php the_time( get_option( 'date_format', 'F d, Y' ) ); ?></a></p></div>
	<div class="meta-comments"><p><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></p></div>
	<?php if ( ! empty( $cats ) ) : ?>
		<div class="meta-cats">
			<?php foreach( $cats as $cat ) {
			    echo $cat->ID;
				echo '<p><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></p>';
			} ?>
		</div>
	<?php endif; ?>
</div>