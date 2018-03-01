<?php get_header(); ?>

<main role="main" class="page">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
                                
        <div class="content">
            <?php
                $client = get_post_meta( $post->ID, 'client', true );
                $year = get_post_meta( $post->ID, 'year', true );
                $media_list = get_post_meta( $post->ID, 'project_media', false );
                
                if ( $client ) {
                    echo '<div class="client">Clent: ' . $client . '</div>';
                }
                
                if ( $year ) {
                    echo '<div class="year">Year: ' . $year . '</div>';
                }
                
                if ( $media_list ) {
                    echo '<div class="project-media"><span>Media:</span>';
                    foreach ( $media_list as $media ) {
                        echo '<div class="icon x24 ' . $media . '"></div>';
                    }
                    echo '</div>';
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