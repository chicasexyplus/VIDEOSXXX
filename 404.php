<?php get_header(); ?>
<div id="wrap" class="centered">
	<div class="contentHead">
    	<p>404 - Sorry, nothing found. But feel free to jerk off to one of these videos:</p>
    </div>
    <section id="content"> 
	<?php
		query_posts( '&order=desc&orderby=meta_value&meta_key=post_views_count&showposts=10' );
		if (have_posts()) : while (have_posts()) : the_post();
			?>
			<div class="videoPost" id="post-<?php the_ID(); ?>">
			<?php $thisDur = get_post_meta($post->ID, 'duration', true); if(!empty($thisDur)){ echo '<div class="thumbDuration">'.$thisDur.'</div>'; } ?>
				  <?php getThumb(get_the_ID()); ?>
				  <a class="videoLink" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				  <a class="heartLink" data-post_id="<?php the_ID(); ?>" href="#"><?php echo getPostCounter(get_the_ID()); ?> Likes</a>
				  <div class="thumbViews"><?php echo getPostViews(get_the_ID()); ?></div>
			</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>