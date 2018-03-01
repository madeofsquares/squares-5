<?php get_header(); ?>

<main role="main">
    <div class="content">
        <?php if( have_posts() ) : while( have_posts() ) : the_post();
            get_template_part( 'template_parts/loop' );
    
        endwhile;
    
        get_template_part( 'template_parts/pagination' );
    
        else :
            get_template_part( 'template_parts/nothing' );
    
        endif; ?>
    </div>
</main>

<?php get_footer(); ?>