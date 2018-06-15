<?php get_header(); ?>
<div id="wrap" class="centered">
	<div class="contentHead">
    	<p>Results for <strong>"<?php echo $_GET['s'];?>"</strong></p>
    </div>
	<section id="content">
			
		<?php $numberOfVideosPerPage = get_option( 'numberOfVideosPerPage', '20' );
	query_posts( $query_string . '&posts_per_page='.$numberOfVideosPerPage.'&order=desc&orderby=meta_value_num&meta_key='.$_GET['sortby'] );
	if (have_posts()) : while (have_posts()) : the_post();
		?>
        <div class="videoPost" id="post-<?php the_ID(); ?>">
        <?php $thisDur = get_post_meta($post->ID, 'duration', true); if(!empty($thisDur)){ echo '<div class="thumbDuration">'.$thisDur.'</div>'; } ?>
              <?php getThumb(get_the_ID()); ?>
              <a class="videoLink" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
              <a class="heartLink" data-post_id="<?php the_ID(); ?>" href="#"><?php echo getPostCounter(get_the_ID()); ?> Likes</a>
              <div class="thumbViews"><?php echo getPostViews(get_the_ID()); ?></div>
		</div>
		
	    <?php endwhile; else: ?>

		<p>Sorry, no videos found. But feel free to jerk off to one of these hot porns! </p>
	
	  <?php endif; ?>
	
	</section>
    <?php if (function_exists("pagination")) {pagination(); } ?>
</div>
<?php get_footer(); ?>