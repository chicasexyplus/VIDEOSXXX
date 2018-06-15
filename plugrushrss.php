<?php
/*
Template Name: Plugrush Feed
*/
echo '<?xml version="1.0" encoding="UTF-8" ?>';
$numposts = 30;
$posts = query_posts('showposts='.$numposts);
?>
<rss version="2.0">
    <channel>
        <title><?php bloginfo_rss('name'); ?> Plugrush RSS Feed</title>
        <description>Your RSS Feed ready to be imported by the Plugrush system</description>
        <link><?php echo home_url() ?></link>
        <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
        <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate> 
			<?php while(have_posts()) : the_post();?>
            <item>
                <title><?php the_title_rss(); ?></title>
                <description><?php the_content_rss(); ?></description>
                <link><?php the_permalink_rss(); ?></link>
                <enclosure url="<?php $th = get_post_meta($post->ID, 'th', true); echo $th; ?>" length="" type="image/jpeg" />
                <guid><?php echo $post->ID; ?></guid>
                <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
            </item>
        	<?php endwhile; ?>
    </channel>
</rss>
