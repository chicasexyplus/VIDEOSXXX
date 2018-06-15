	<?php if ( ! dynamic_sidebar( 'footersidebar' ) ) : ?>	
    	
        <aside class="widget-footer widget_pages">
            <h4>Pages</h4>
            <ul>
                <?php wp_list_pages( 'title_li=' ); ?>
            </ul>
        </aside>
		
	    <aside id="categories" class="widget-footer"><h4>Categories</h4>
			<ul>
				<?php wp_list_categories( 'title_li=' ); ?>
			</ul>
		</aside>

	<?php endif; ?>