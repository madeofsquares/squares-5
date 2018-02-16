<?php get_header(); ?>
<?php
    $default_avatar = get_template_directory_uri() . '/assets/avatar-default.png';
?>

<main role="main">
    <h1 class="page-title">Posts by <?php echo get_avatar( get_the_author_meta('ID'), 64, $default_avatar ); ?><span><?php the_author(); ?></span></h1>

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

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>