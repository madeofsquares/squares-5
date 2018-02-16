<header>
	<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
</header>

<div class="content">
	<?php get_template_part( 'template_parts/post_meta' ); ?>
	<?php the_content(); ?>
	
	<div class="meta">
		<div class="meta-author"><p><em>by <?php the_author(); ?></em></p></div>
	</div>
	<div class="meta">
		<?php get_template_part( 'template_parts/post_tags' ); ?>
	</meta>
</div>