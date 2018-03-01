<article class="list-post">
	<header class="post-head">
		<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header>
	<?php
		get_template_part( 'template_parts/post_meta' );
		the_excerpt();
		get_template_part( 'template_parts/post_tags' );
	?>
</article>
