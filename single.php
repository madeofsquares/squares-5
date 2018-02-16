<?php get_header(); ?>

<div class="post">
	<main role="main">
		<?php if( have_posts() ) : while( have_posts() ) : the_post();
			get_template_part( 'template_parts/loop', 'single' );
			
			endwhile;
			endif;
		?>
	</main>
		
	<?php get_sidebar(); ?>
</div>
	
<?php get_footer(); ?>