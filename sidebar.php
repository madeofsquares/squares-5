<?php if ( is_active_sidebar( 'widget-area' )  ) : ?>
    <aside role="complementary">
    	<div class="widget-area">
	        <?php dynamic_sidebar( 'widget-area' ); ?>
	    </div>
    </aside>
<?php endif; ?>