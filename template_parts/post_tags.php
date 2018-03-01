<?php if ( has_tag() ) {
    echo '<div class="meta">';
    echo the_tags( '<div class="tags">', '', '</div>' );
    echo '</div>';
} ?>