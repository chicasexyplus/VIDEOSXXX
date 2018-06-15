<?php get_header(); ?>
<div id="wrap" class="centered">
	<?php if (have_posts()) : ?>
	
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		
		<?php if (is_category()) { ?>
            <div class="contentHead">
            	<p>Videos in category <strong><?php echo single_cat_title(); ?></strong></p>
        	</div>				
			
		<?php } elseif( is_tag() ) { ?>
        	<div class="contentHead">
            	<p>Videos for tag <strong><?php single_tag_title(); ?></strong></p>
        	</div>
			
		<?php } elseif (is_day()) { ?>
			<div class="contentHead">
            	<p>Archive for <strong><?php echo get_the_date(); ?></strong></p>
        	</div>
			
		<?php } elseif (is_month()) { ?>
			<div class="contentHead">
            	<p>Archive for <strong><?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'blm_basic' ) ) ?></strong></p>
        	</div>
			
		<?php } elseif (is_year()) { ?>
			<div class="contentHead">
            	<p>Archive for <strong><?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'blm_basic' ) ) ?></strong></p>
        	</div>
			
		<?php } elseif (is_search()) { ?>
			<div class="contentHead">
            	<p>Search Results</p>
        	</div>
			
		<?php } elseif ( is_author() ) { ?>
			<div class="contentHead">
            	<p>Author Archive</p>
        	</div>
			
		<?php } elseif ( isset($_GET['paged'] ) && !empty( $_GET['paged']) ) { ?>
			<div class="contentHead">
            	<p>Blog Archives</p>
        	</div>
			
		<?php } ?>
	<section id="content">
	<?php while (have_posts()) : the_post();?>
        <div class="videoPost" id="post-<?php the_ID(); ?>">
        <?php $thisDur = get_post_meta($post->ID, 'duration', true); if(!empty($thisDur)){ echo '<div class="thumbDuration">'.$thisDur.'</div>'; } ?>
              <?php getThumb(get_the_ID()); ?>
              <a class="videoLink" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
              <a class="heartLink" data-post_id="<?php the_ID(); ?>" href="#"><?php echo getPostCounter(get_the_ID()); ?> Likes</a>
              <div class="thumbViews"><?php echo getPostViews(get_the_ID()); ?></div>
		</div>
	  <?php endwhile; endif; ?> 
      
	</section>
    <?php if (function_exists("pagination")) {pagination(); } ?>
</div>
<?php get_footer(); ?>