<?php /* Template Name: HubPage */ ?>

<?php get_header(); ?>

<main role="main" class="hubpage">
    <?php if( have_posts() ) : while( have_posts() ) : the_post();
        the_title( '<h1 class="page-title">', '</h1>' ); ?>
        <div class="content">
            <?php the_content(); ?>
        </div>
        
        <?php
        $childArgs = array(
            'child_of'      => $post->ID,
            'sort_column'   => 'desc',
            'hierarchical'  => 0,
        );
        $pageChildren = get_pages( $childArgs );
        
        if ( $pageChildren ) {
            echo '<div class="page-grid">';
                foreach ( $pageChildren as $pageChild ) {
                    if ( ! $pageChild->post_content ) // check for empty top-level page
                    {
                        continue;
                    } else {
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $pageChild->ID ), 'full' );
                                                    
                        $parents = get_post_ancestors( $pageChild );
                        $parent = ($parents) ? $parents[0]: $post->ID;
                        $parent = get_post( $parent );
                        echo '<article class="grid-post" style="background-image: url(' . $thumb[0] . ');">';
                        echo '<a href="' . get_page_uri( $pageChild ) . '">';
                        echo '<h3 class="grid-post-parent">' . $parent->post_title . '</h3>';
                        echo '<h2 class="grid-post-title">' . $pageChild->post_title . '</h2>';
                        echo '</a>';
                        echo '</article>';
                    }
                }
            echo '</div>';
        } else {
            get_template_part( 'template_parts/nothing' );
        }
    
        endwhile;
        endif;
    ?>
</main>
    
<?php get_footer(); ?>