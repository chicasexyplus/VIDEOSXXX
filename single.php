<?php get_header(); ?>

	<section id="contentWrapper">
    <?php 
	$prAboveVideo = get_option('prAboveVideo'); 
	if( !empty($prAboveVideo) ){ ?>
    <div class="centered plugrushAboveVideo">
    	<?php echo $prAboveVideo; ?>
    </div>
    <?php } ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="videoWrap">
                <div class="videoBox" id="theVideo">
                    <?php getEmbedVideo(get_the_ID()); ?>
                    <?php
					$adOverVideo1 = get_option('adOverVideo1');
					$adOverVideo2 = get_option('adOverVideo2');
					if(!empty($adOverVideo1) || !empty($adOverVideo2)){
						if(!empty($adOverVideo1) && !empty($adOverVideo2)){ ?>
							<div id="videoOverAd" class="videoOverAdBig">
                            <a href="#" class="close">X</a>
                            <div id="videoOverAd300" class="videoOverAd300"></div>
                            <div id="videoOverAd300snd" class="videoOverAd300snd"></div>
                            <?php
						}else{ ?>
							<div id="videoOverAd" class="videoOverAdSmall">
                            <a href="#" class="close">X</a>
                            <?php
							if(!empty($adOverVideo1)){
								echo '<div id="videoOverAd300" class="videoOverAd300"></div>';
							}else{
								echo '<div id="videoOverAd300snd" class="videoOverAd300snd"></div>';
							}
						}
						?>
                    	</div>
                        <script>
                                // Prevent the ad from loading, if the window is too small
                                if($( window ).width() > 1100){
                                    //$( 'div#videoOverAd' ).show();
                                    $( 'div#videoOverAd300' ).append('<?php echo $adOverVideo1; ?>');
									$( 'div#videoOverAd300snd' ).append('<?php echo $adOverVideo2; ?>');
                                }else {
                                    $( 'div#videoOverAd' ).hide();
                                }
                        </script>
                    <?php 
                    } 
					?>
                </div>
                <?php
				$adUnderVideo1 = get_option('adUnderVideo1');
				if(!empty($adUnderVideo1)){
				?>
                    <div id="bannerAd728" class="ad728"></div>
                    <script>
                            // Prevent the ad from loading, if the window is too small
                            if($( window ).width() > 730){
                                $( 'div#bannerAd728' ).show();
                                $( 'div#bannerAd728' ).append('<?php echo $adUnderVideo1; ?>');
                            }else {
                                $( 'div#bannerAd728' ).hide();
                            }
                    </script>
                <?php 
				} 
				?>
                <h2><?php the_title(); ?></h2>
                <div id="videoPostContent">
                    <?php the_content(); ?>
                </div>
                <div class="postMeta">
                    <a class="heartLink" data-post_id="<?php the_ID(); ?>" href="#"><?php echo getPostCounter(get_the_ID()); ?> Likes</a>
                    <div class="thumbViews"><?php echo getPostViews(get_the_ID()); ?></div>
                    <?php $dur = get_post_meta($post->ID, 'duration', true); if(!empty($dur)){ echo '<div class="videoDuration">Duration '. $dur .'</div>'; } ?>
                    <div class="videoCategory">Category <?php the_category(', ');?></div>
                </div>
                <?php if(get_option( 'allowComments', '1' ) == 1){ ?>
                <a id="showCommentsLink" href="#">Add comment</a>
                <div id="comments">
                    <?php comments_template(); ?>	
                </div>
                <?php } ?>
            </div>
            <?php 
			$adVideoSide1 = get_option('adVideoSide1');
			$adVideoSide2 = get_option('adVideoSide2');
			$adVideoSide3 = get_option('adVideoSide3');
			if(!empty($adVideoSide1) || !empty($adVideoSide2) || !empty($adVideoSide3)){
				echo '<div class="videoSideAds">';
				if(!empty($adVideoSide1)){
					echo '<div class="videoAd300">'.$adVideoSide1.'</div>';
				}
				if(!empty($adVideoSide2)){
					echo '<div class="videoAd300">'.$adVideoSide2.'</div>';
				}
				if(!empty($adVideoSide3)){
					echo '<div class="videoAd300">'.$adVideoSide3.'</div>';
				}
				echo '</div>';
			}
			?>
            <div class="clear"></div>
		</article>
        
        <?php setPostViews(get_the_ID()); ?>
	<?php endwhile; endif; ?>
	</section>
    
    <?php 
	$prAboveRelatedVideos = get_option('prAboveRelatedVideos');
	$prBelowRelatedVideos = get_option('prBelowRelatedVideos');
	if(get_option( 'showRelatedVideos', '1' ) == 1 || !empty($prAboveRelatedVideos) || !empty($prBelowRelatedVideos) ){ ?>
    <div id="wrap" class="centered">
    <div class="contentHead">
    	<p>Related videos</p>
    </div>
    	<?php if( !empty($prAboveRelatedVideos) ){ ?>
        <div class="centered plugrush">
            <?php echo $prAboveRelatedVideos; ?>
        </div>
		<?php
		}
		if(get_option( 'showRelatedVideos', '1' ) == 1){
			$relatedPostNumber = get_option( 'numberOfRelatedVideos', '20' );
			$cats = getRelatedCategories($post->ID, $relatedPostNumber);
			$parentPostID = $post->ID;
			query_posts( 'cat='.$cats.'&orderby=rand&posts_per_page='.$relatedPostNumber.'&post__not_in[]='.$parentPostID );
			if (have_posts()) : while (have_posts()) : the_post();
				if($parentPostID != $post->ID){
				?>
				<div class="videoPost" id="post-<?php the_ID(); ?>">
				<?php $thisDur = get_post_meta($post->ID, 'duration', true); if(!empty($thisDur)){ echo '<div class="thumbDuration">'.$thisDur.'</div>'; } ?>
					  <?php getThumb(get_the_ID()); ?>
					  <a class="videoLink" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					  <a class="heartLink" data-post_id="<?php the_ID(); ?>" href="#"><?php echo getPostCounter(get_the_ID()); ?> Likes</a>
					  <div class="thumbViews"><?php echo getPostViews(get_the_ID()); ?></div>
				</div>
			<?php
				}
			endwhile; endif; 
		}?>
        <?php if( !empty($prBelowRelatedVideos) ){ ?>
        <div class="centered plugrush">
            <?php echo $prBelowRelatedVideos; ?>
        </div>
        <?php } ?>
    </div>
	<?php } ?>
<?php get_footer(); ?>