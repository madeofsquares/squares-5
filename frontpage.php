<?php get_header(); ?>

<main role="main">
        <?php if( have_posts() ) : while( have_posts() ) : the_post();
        
        the_content();

        endwhile;

        else :
            get_template_part( 'template_parts/nothing' );

        endif; ?>
</main>

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>