<?php get_header(); ?>

<?php
	$archive_year = get_the_time( 'Y' );
	$archive_month = get_the_time( 'M' );
?>

<main role="main">
    <h1 class="page-title">Posts from <span><?php echo $archive_month . ' ' . $archive_year ?></span></h1>

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