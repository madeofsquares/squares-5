<?php if ( has_post_thumbnail() ) : ?>
    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
    <article class="grid-post" style="background-image: url('<?php echo $thumb[0];?>');">
<?php else : ?>
    <article class="grid-post">
<?php endif; ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<header class="post-head">
				<h2><?php the_title(); ?></h2>
			</header>
	    </a>
	</article>
	