<?php get_header(); ?>
<div id="wrap" class="centered">
	<div class="contentHead">
    	<p>
		<?php 
		switch($_GET['sortby']){
			case 'post_views_count': echo'Most viewed videos'; break;
			case 'votes_count': echo'Most liked videos'; break;
			default: echo'New videos'; break;
		}
		?>
        </p>
        <div class="sortBy">
        	Sort by <a href="<?php echo home_url() ?>/" <?php if(empty($_GET['sortby'])){ echo 'class="sortByActive"'; }?>>Date</a><a <?php if($_GET['sortby'] == 'post_views_count'){ echo 'class="sortByActive"'; }?> href="?sortby=post_views_count">Views</a><a <?php if($_GET['sortby'] == 'votes_count'){ echo 'class="sortByActive"'; }?> href="?sortby=votes_count">Likes</a>
        </div>
    </div>
	<section id="content">
    <?php 
	$prAboveVideosHomepage = get_option('prAboveVideosHomepage');
	$prBelowVideosHomepage = get_option('prBelowVideosHomepage');
	if( !empty($prAboveVideosHomepage)){ ?>
    <div class="centered plugrush">
    	<?php echo $prAboveVideosHomepage; ?>
    </div>
	<?php
	}
	//$numberOfVideosPerPage = get_option( 'numberOfVideosPerPage', '20' );
	query_posts( $query_string .'&order=desc&orderby=meta_value_num&meta_key='.$_GET['sortby'] );
	if (have_posts()) : while (have_posts()) : the_post();
		?>
        <div class="videoPost" id="post-<?php the_ID(); ?>">
        <?php $thisDur = get_post_meta($post->ID, 'duration', true); if(!empty($thisDur)){ echo '<div class="thumbDuration">'.$thisDur.'</div>'; } ?>
              <?php getThumb(get_the_ID()); ?>
              <a class="videoLink" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
              <a class="heartLink" data-post_id="<?php the_ID(); ?>" href="#"><?php echo getPostCounter(get_the_ID()); ?> Likes</a>
              <div class="thumbViews"><?php echo getPostViews(get_the_ID()); ?></div>
		</div>
	<?php endwhile; endif; 
	if(!empty($prBelowVideosHomepage)){?>
    <div class="centered plugrush">
    	<?php echo $prBelowVideosHomepage; ?>
    </div>
    <?php } ?>
	</section>
	<?php if (function_exists("pagination")) {pagination(); } ?>
</div>
<?php get_footer(); ?>