<?php get_header(); ?>

<main role="main">
    <h1 class="page-title">Posts tagged <span><?php single_tag_title(); ?></span></h1>

    <div class="content">
        <?php if( have_posts() ) : while( have_posts() ) : the_post();
        
        get_template_part( 'template_parts/loop', get_post_format() );

        endwhile;

        get_template_part( 'template_parts/pagination' );

        else :
            get_template_part( 'template_parts/nothing' );

        endif; ?>
    </div>
</main>

<?php get_footer(); ?>