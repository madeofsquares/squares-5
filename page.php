<?php get_header(); ?>

<main role="main" class="page">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
                                
        <div class="content">
            <?php
                $client = get_post_meta( $post->ID, 'client', true );
                $year = get_post_meta( $post->ID, 'year', true );
                $media_list = get_post_meta( $post->ID, 'media', false );
                
                if ( $client ) {
                    echo '<p class="client">Clent: ' . $client . '</p>';
                }
                
                if ( $year ) {
                    echo '<p class="year">Year: ' . $year . '</p>';
                }
                
                if ( $media_list ) {
                    echo '<p class="project-media">Media: ';
                    foreach ( $media_list as $media ) {
                        echo '<span>' . $media . '</span>';
                    }
                    echo '</p>';
                }
            
                the_content();
            ?>
        </div>
    <?php
        endwhile;
        endif;
    ?>
</main>
	
<?php get_footer(); ?>