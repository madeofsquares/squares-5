<?php get_header(); ?>

<main role="main" class="post">
    <?php if( have_posts() ) : while( have_posts() ) : the_post();
        get_template_part( 'template_parts/loop', 'single' ); ?>
        
        <div class="content">
            <?php comments_template(); ?>
        </div>
        
        <?php endwhile;
        endif; ?>
</main>
	
<?php get_footer(); ?>