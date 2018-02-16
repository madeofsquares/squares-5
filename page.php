<?php get_header(); ?>

<div class="page">
	<main role="main">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

			<div class="content">
				<?php the_content(); ?>
			</div
		<?php
			endwhile;
			endif;
		?>
	</main>
		
	<?php get_sidebar(); ?>
</div>
	
<?php get_footer(); ?>