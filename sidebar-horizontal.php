	<?php if ( ! dynamic_sidebar( 'horizontal' ) ) : ?>
    	
        <aside class="widget widget_nav_menu">
            <div>
                <ul class="menu">
                    <li class="<?php if(is_home()){ echo 'current-menu-item current_page_item'; } ?> menu-item menu-item-type-custom menu-item-object-custom menu-item-home">
                    	<a href="<?php echo home_url() ?>/">Videos</a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <aside class="widget widget_categories">
        <h4>Categories</h4>
        <ul>
            <?php wp_list_categories( 'title_li=' ); ?>
        </ul>
        </aside>
		
		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>
		
	<?php endif; ?>