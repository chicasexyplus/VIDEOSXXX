<?php
/**
 * AWP 1.0.1 
 * In Porn We Trust - Thank you very much for buying this awesome Theme!
 */
add_action('admin_init', 'startSession', 1);
define( 'AWP_SL_STORE_URL', 'https://adult-wordpress-theme.com' );
define( 'AWP_SL_THEME_NAME', 'AWPTheme' );
add_action('admin_menu', 'add_awp_import_page');
add_action('admin_menu', 'add_awp_settings_page');
add_action('after_switch_theme', 'awp_activation');
add_action( 'wp_head', 'header_check' );
function add_awp_import_page()  
{  
	if (function_exists('add_menu_page')) {
    	add_menu_page('AWP Import', 'AWP Import', 'manage_options', 'awp-import-tool','awp_retube_import', 'dashicons-heart');
	}
	if (function_exists('add_submenu_page')) {
		add_submenu_page( 'awp-import-tool', 'Redtube Import', 'Redtube Import', 'manage_options', 'awp-import-tool', 'awp_retube_import' );
		add_submenu_page( 'awp-import-tool', 'Youporn Import', 'Youporn Import', 'manage_options', 'youporn-import', 'awp_youporn_import' );
		add_submenu_page( 'awp-import-tool', 'Pornhub Import', 'Pornhub Import', 'manage_options', 'pornhub-import', 'awp_pornhub_import' );
		add_submenu_page( 'awp-import-tool', 'Tube8 Import', 'Tube8 Import', 'manage_options', 'tube8-import', 'awp_tube8_import' );
		add_submenu_page( 'awp-import-tool', 'Xvideos Import', 'Xvideos Import', 'manage_options', 'xvideos-import', 'awp_xvideos_import' );
		add_submenu_page( 'awp-import-tool', 'Xhamster Import', 'Xhamster Import', 'manage_options', 'xhamster-import', 'awp_xhamster_import' );
		add_submenu_page( 'awp-import-tool', 'DrTuber Import', 'DrTuber Import', 'manage_options', 'drtuber-import', 'awp_drtuber_import' );
	}
}
function add_awp_settings_page()  
{  
	if (function_exists('add_menu_page')) {
    	add_menu_page('AWP Settings', 'AWP Settings', 'manage_options', 'awp-settings-tool','awp_settings', 'dashicons-heart');
	}
	if (function_exists('add_submenu_page')) {
		add_submenu_page( 'awp-settings-tool', 'Design', 'Design', 'manage_options', 'awp-layout-settings', 'awp_layout' );
		add_submenu_page( 'awp-settings-tool', 'Autoposting', 'Autoposting', 'manage_options', 'awp-autoposting-settings', 'awp_autoposting' );
		add_submenu_page( 'awp-settings-tool', 'Adspaces', 'Adspaces', 'manage_options', 'awp-adspaces-settings', 'awp_adspaces' );
		add_submenu_page( 'awp-settings-tool', 'Plugrushspaces', 'Plugrushspaces', 'manage_options', 'awp-plugrushspaces-settings', 'awp_plugrushspaces' );
		add_submenu_page( 'awp-settings-tool', 'License', 'License', 'manage_options', 'awp-license-settings', 'awp_license' );
		
	}
	add_action( 'admin_init', 'register_awpsettings' );
}
function register_awpsettings() {
	register_setting( 'awp-settings-group', 'numberOfVideosPerPage' );
	register_setting( 'awp-settings-group', 'showRelatedVideos' );
	register_setting( 'awp-settings-group', 'numberOfRelatedVideos' );
	register_setting( 'awp-settings-group', 'allowComments' );
	register_setting( 'awp-settings-group', 'rtaLabel' );
	register_setting( 'awp-settings-group', 'rewriteTitle' );
	register_setting( 'awp-settings-group', 'googleAnalytics' );
	register_setting( 'awp-settings-group', 'tSinceLast' );
	register_setting( 'awp-settings-group', 'addtotitle' );
	
	register_setting( 'awp-settings-layout-group', 'logoFirstPart' );
	register_setting( 'awp-settings-layout-group', 'logoSecondPart' );
	register_setting( 'awp-settings-layout-group', 'logoSlogan' );
	register_setting( 'awp-settings-layout-group', 'logoStyle' );
	register_setting( 'awp-settings-layout-group', 'colorTheme' );
	register_setting( 'awp-settings-layout-group', 'roundCorners' );
	register_setting( 'awp-settings-layout-group', 'boxShadows' );
	register_setting( 'awp-settings-layout-group', 'whiteBackground' );
	
	register_setting( 'awp-settings-autopost-group', 'autoPostActive' );
	register_setting( 'awp-settings-autopost-group', 'autoPostTime' );
	register_setting( 'awp-settings-autopost-group', 'autoPostNumberOfVideos' );
	register_setting( 'awp-settings-autopost-group', 'autoPostRandom' );
	register_setting( 'awp-settings-autopost-group', 'autoPostSendEmail' );
	register_setting( 'awp-settings-autopost-group', 'autoPostEmailSent' );
	register_setting( 'awp-settings-autopost-group', 'autoPostRecycle' );
	
	register_setting( 'awp-settings-adspace-group', 'adFooter1' );
	register_setting( 'awp-settings-adspace-group', 'adFooter2' );
	register_setting( 'awp-settings-adspace-group', 'adFooter3' );
	register_setting( 'awp-settings-adspace-group', 'adVideoSide1' );
	register_setting( 'awp-settings-adspace-group', 'adVideoSide2' );
	register_setting( 'awp-settings-adspace-group', 'adVideoSide3' );
	register_setting( 'awp-settings-adspace-group', 'adOverVideo1' );
	register_setting( 'awp-settings-adspace-group', 'adOverVideo2' );
	register_setting( 'awp-settings-adspace-group', 'adUnderVideo1' );
	
	register_setting( 'awp-settings-plugrush-group', 'prHeadCode' );
	register_setting( 'awp-settings-plugrush-group', 'prAboveVideo' );
	register_setting( 'awp-settings-plugrush-group', 'prAboveRelatedVideos' );
	register_setting( 'awp-settings-plugrush-group', 'prBelowRelatedVideos' );
	register_setting( 'awp-settings-plugrush-group', 'prAboveVideosHomepage' );
	register_setting( 'awp-settings-plugrush-group', 'prBelowVideosHomepage' );
	
	register_setting( 'awp_theme_license', 'awp_theme_license_key', 'awp_theme_sanitize_license' );
}
function awp_activation() {
	add_option( 'numberOfVideosPerPage', '20', '', 'yes' );
	add_option( 'showRelatedVideos', '1', '', 'yes' );
	add_option( 'numberOfRelatedVideos', '20', '', 'yes' );
	add_option( 'allowComments', '1', '', 'yes' );
	add_option( 'rtaLabel', '1' );
	add_option( 'rewriteTitle', FALSE );
	add_option( 'googleAnalytics', '' );
	add_option( 'tSinceLast', '' );
	add_option( 'addtotitle', '' );
	
	add_option( 'logoFirstPart', 'AWP', '', 'yes' );
	add_option( 'logoSecondPart', 'TUBE', '', 'yes' );
	add_option( 'logoSlogan', 'In porn we trust', '', 'yes' );
	add_option( 'logoStyle', '2', '', 'yes' );
	add_option( 'colorTheme', 'red', '', 'yes' );
	add_option( 'roundCorners', '0' );
	add_option( 'boxShadows', '1' );
	add_option( 'whiteBackground', '0' );
	
	add_option( 'autoPostActive', FALSE );
	add_option( 'autoPostTime', 24 );
	add_option( 'autoPostNumberOfVideos', 3);
	add_option( 'autoPostRandom', TRUE );
	add_option( 'autoPostSendEmail', TRUE );
	add_option( 'autoPostEmailSent', FALSE );
	add_option( 'autoPostRecycle', FALSE );
	
	add_option( 'adFooter1', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >');
	add_option( 'adFooter2', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >' );
	add_option( 'adFooter3', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >' );
	add_option( 'adVideoSide1', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >' );
	add_option( 'adVideoSide2', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >' );
	add_option( 'adVideoSide3', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >' );
	add_option( 'adOverVideo1', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >' );
	add_option( 'adOverVideo2', '<img src="'.get_template_directory_uri().'/images/ad300.png" alt="Example Banner 300x250" >' );
	add_option( 'adUnderVideo1', '<img src="'.get_template_directory_uri().'/images/ad728.png" alt="Example Banner 728x90" >' );
	
	add_option( 'prHeadCode', '' );
	add_option( 'prAboveVideo', '' );
	add_option( 'prAboveRelatedVideos', '' );
	add_option( 'prBelowRelatedVideos', '' );
	add_option( 'prAboveVideosHomepage', '' );
	add_option( 'prBelowVideosHomepage', '' );
}
function startSession() {
    if (!isset($_SESSION)) @session_start();
}
function awp_settings() {
	if(awpTheme()){//adminMsg();return;
	}
	?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/backendstyle.css" type="text/css" media="screen" />
    <div class="wrap">
    <h2>AWP General Settings</h2>
    <form method="post" action="options.php">  
    	<?php settings_fields( 'awp-settings-group' ); ?>
    	<?php do_settings_sections( 'awp-settings-group' ); ?>
        <table class="form-table">
        	<tr>
                <th scope="row"><label for="numberOfVideosPerPage">Number of videos per page on the home page</label></th>
                <td><input name="numberOfVideosPerPage" type="number" id="numberOfVideosPerPage" value="<?php echo get_option('posts_per_page'); ?>" step="1" min="1" class="small-text" />
                <?php 
					update_option( 'posts_per_page', get_option('numberOfVideosPerPage') );
				?>
                <p class="description">It's good if this number is divideable by 5, because in fullscreen mode there are 5 videos per row.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="showRelatedVideos">Show related videos under video</label></th>
                <td><input name="showRelatedVideos" type="checkbox" id="showRelatedVideos" <?php if(get_option('showRelatedVideos') == 1){ echo 'checked="checked"'; } ?> value="1" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="numberOfRelatedVideos">Number of related videos</label></th>
                <td><input name="numberOfRelatedVideos" type="number" id="numberOfRelatedVideos" value="<?php echo get_option('numberOfRelatedVideos'); ?>" step="1" min="1" class="small-text" />
                <p class="description">It's good if this number is divideable by 5, because in fullscreen mode there are 5 videos per row.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="allowComments">Show/Allow comments on videos</label></th>
                <td><input name="allowComments" type="checkbox" id="allowComments" <?php if(get_option('allowComments') == 1){ echo 'checked="checked"'; } ?> value="1" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="rtaLabel">Use the RTA Label</label></th>
                <td><input name="rtaLabel" type="checkbox" id="rtaLabel" <?php if(get_option('rtaLabel') == 1){ echo 'checked="checked"'; } ?> value="1" />
                <p class="description">We recommend to label your site as "Restricted to Adults" to help parents prevent children from viewing age-inappropriate content.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="rewriteTitle">Rewrite video titles</label></th>
                <td><input name="rewriteTitle" type="checkbox" id="rewriteTitle" <?php if(get_option('rewriteTitle') == TRUE){ echo 'checked="checked"'; } ?> value="TRUE" />
                <p class="description">If active, video titles will be changed randomly when you import new videos to make doublicate content less likely.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="googleAnalytics">Google Analytics Code</label></th>
                <td><textarea id="googleAnalytics" name="googleAnalytics" cols="80" rows="6" class="all-options"><?php echo get_option('googleAnalytics'); ?></textarea>
                <p class="description">This code will appear right before the closing &lt;&frasl;head&gt; tag.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="addtotitle">Add this text to video titles</label></th>
                <td><input name="addtotitle" type="text" id="addtotitle" value="<?php echo get_option('addtotitle'); ?>" width="3350px" /><p class="description">Leave blank, if not needed.</p></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
    <?php
}
function awp_layout() {
	if(awpTheme()){//adminMsg();return;
	}
	?>
	?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/backendstyle.css" type="text/css" media="screen" />
    <div class="wrap">
    <h2>Design</h2>
    <form method="post" action="options.php">  
    	<?php settings_fields( 'awp-settings-layout-group' ); ?>
    	<?php do_settings_sections( 'awp-settings-layout-group' ); ?>
        <h3>Tube Logo</h3>
        <table class="form-table">
        	<tr>
                <th scope="row"><label for="logoFirstPart">Select logo style</label></th>
                <td>
                	<div class="logoStyle" style="float:left">
                        <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/logostyle1.png" alt="Logostyle 1" /><br />
                        <input name="logoStyle" type="radio" value="1" <?php if(get_option('logoStyle') == 1){ echo 'checked="checked"'; } ?> /> Simple &amp; clean 
                    </div>
                    <div class="logoStyle" style="float:left; margin: 0 0 0 10px;">
                        <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/logostyle2.png" alt="Logostyle 2" /><br />
                        <input name="logoStyle" type="radio" value="2" <?php if(get_option('logoStyle') == 2){ echo 'checked="checked"'; } ?>/> "Youtube-like" 
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="logoFirstPart">Logo first part</label></th>
                <td><input name="logoFirstPart" type="text" id="logoFirstPart" value="<?php echo get_option('logoFirstPart'); ?>" width="150px" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="logoSecondPart">Logo second part</label></th>
                <td><input name="logoSecondPart" type="text" id="logoSecondPart" value="<?php echo get_option('logoSecondPart'); ?>" width="150px" />
                <p class="description">If you want a single "one-part-logo", just leave first or second part empty.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="logoSlogan">Slogan</label></th>
                <td><input name="logoSlogan" type="text" id="logoSlogan" value="<?php echo get_option('logoSlogan'); ?>" width="150px" />
                <p class="description">If you don't need an awesome slogan, leave this field empty.</p></td>
            </tr>
        </table>
        <h3>Colors</h3>
        <table class="form-table">
        	<tr>
                <th scope="row"><label for="colorTheme">Select color theme</label></th>
                <td>
                	<div class="colorThemePreview">
                        <img src="<?php bloginfo('template_directory'); ?>/images/red.png" alt="Red theme" /><br />
                        <input name="colorTheme" type="radio" value="red" <?php if(get_option('colorTheme') == 'red'){ echo 'checked="checked"'; } ?> /> Red (default)
                    </div>
                    <div class="colorThemePreview">
                        <img src="<?php bloginfo('template_directory'); ?>/images/white.png" alt="White and grey" /><br />
                        <input name="colorTheme" type="radio" value="white" <?php if(get_option('colorTheme') == 'white'){ echo 'checked="checked"'; } ?>/> White &amp; grey 
                    </div>
                    <div class="colorThemePreview">
                        <img src="<?php bloginfo('template_directory'); ?>/images/blue.png" alt="Blue and grey" /><br />
                        <input name="colorTheme" type="radio" value="blue" <?php if(get_option('colorTheme') == 'blue'){ echo 'checked="checked"'; } ?>/> Blue &amp; grey 
                    </div>
                </td>
            </tr>
        </table>
        <h3>Corners &amp; Shadows</h3>
        <table class="form-table">
        	<tr>
                <th scope="row"><label for="roundCorners">Use rounded corners</label></th>
                <td><input name="roundCorners" type="checkbox" id="roundCorners" <?php if(get_option('roundCorners') == 1){ echo 'checked="checked"'; } ?> value="1" />
                <p class="description">Default is no.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="boxShadows">Use box shadows</label></th>
                <td><input name="boxShadows" type="checkbox" id="boxShadows" <?php if(get_option('boxShadows') == 1){ echo 'checked="checked"'; } ?> value="1" />
                <p class="description">Default is yes.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="whiteBackground">Use white background</label></th>
                <td><input name="whiteBackground" type="checkbox" id="whiteBackground" <?php if(get_option('whiteBackground') == 1){ echo 'checked="checked"'; } ?> value="1" />
                <p class="description">Default is no.</p></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
    <?php
}

add_action('awp_postVideos_hook', 'awp_postVideos');
function awp_autoposting() {
	if(awpTheme()){//adminMsg();return;
	}
	?>
	?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/backendstyle.css" type="text/css" media="screen" />
    <div class="wrap">
    <h2>Autoposting</h2>
    <div class="updated below-h2" style="padding: 5px;">
		<p>Notice: Autoposting is triggered by website visitors to avoid using cronejobs. So make sure there is some traffic on your site :-)</p>
	</div>
    <?php 
	settings_fields( 'awp-settings-autopost-group' ); 
	do_settings_sections( 'awp-settings-autopost-group' );
	if($_POST[submitted] == TRUE){
		$oldAutoPostactive = get_option('autoPostActive');
		update_option( 'autoPostActive', $_POST['autoPostActive'] );
		update_option( 'autoPostTime', $_POST['autoPostTime'] );
		update_option( 'autoPostNumberOfVideos', $_POST['autoPostNumberOfVideos']);
		update_option( 'autoPostRandom', $_POST['autoPostRandom']);
		update_option( 'autoPostSendEmail', $_POST['autoPostSendEmail']);
		update_option( 'autoPostRecycle', $_POST['autoPostRecycle']);
		$autoPostActive = get_option('autoPostActive');
		
		if($autoPostActive == TRUE && $oldAutoPostactive != $autoPostActive){
			wp_clear_scheduled_hook('awp_postVideos_hook');
			wp_schedule_event( time(), 'awppostinterval', 'awp_postVideos_hook' );
		}elseif($autoPostActive != TRUE) {
			wp_clear_scheduled_hook('awp_postVideos_hook');
		}
	}
	$checkForVideosDrafts = get_posts(array('post_status' => 'draft'));
	if(empty($checkForVideosDrafts) && get_option( 'autoPostActive') ){
		echo '<div class="error below-h2"><p><strong>Attention:</strong> There are no video drafts ready to publish right now. Import some new videos with the AWP Import tool.</p></div>';
	}
    ?>
    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>"> 
    	<input name="submitted" type="hidden" value="TRUE" />
        <table class="form-table">
        	<tr>
                <th scope="row"><label for="autoPostActive">Autoposting is active</label></th>
                <td><input name="autoPostActive" type="checkbox" id="autoPostActive" <?php if(get_option('autoPostActive') == TRUE){ echo 'checked="checked"'; } ?> value="TRUE" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="autoPostTime">Hours between automatic posts</label></th>
                <td><input name="autoPostTime" type="number" id="autoPostTime" value="<?php echo get_option('autoPostTime'); ?>" step="1" min="1" class="small-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="autoPostNumberOfVideos">Number of videos to be postet</label></th>
                <td><input name="autoPostNumberOfVideos" type="number" id="autoPostNumberOfVideos" value="<?php echo get_option('autoPostNumberOfVideos'); ?>" step="1" min="1" class="small-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="autoPostRandom">Choose random videos from drafts</label></th>
                <td><input name="autoPostRandom" type="checkbox" id="autoPostRandom" <?php if(get_option('autoPostRandom') == TRUE){ echo 'checked="checked"'; } ?> value="TRUE" />
                <p>If unchecked, the latest drafts will be posted.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="autoPostSendEmail">Notify me if there is nothing to post</label></th>
                <td><input name="autoPostSendEmail" type="checkbox" id="autoPostSendEmail" <?php if(get_option('autoPostSendEmail') == TRUE){ echo 'checked="checked"'; } ?> value="TRUE" /><p>If checked, an email will be sent to the admin email address when there are no more drafts to post.</p></td>
            </tr>
            <tr>
                <th scope="row"><label for="autoPostRecycle">Recycle old posts, if there is nothing to post</label></th>
                <td><input name="autoPostRecycle" type="checkbox" id="autoPostRecycle" <?php if(get_option('autoPostRecycle') == TRUE){ echo 'checked="checked"'; } ?> value="TRUE" /><p>If checked, random old videos will be picked an posted as new ones.</p></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
    <?php
}
// Add custon shedule to cron shedules 
function awp_auto_post_interval( $schedules ) {
	  $interval = get_option('autoPostTime') * 3600;
	  $schedules['awppostinterval'] = array(
		  'interval' => $interval,
		  'display' => __( 'awppostinterval' )
	  );
	  return $schedules;
}
add_filter( 'cron_schedules', 'awp_auto_post_interval' );
 
// Autopost: function to post number of videos
function awp_postVideos(){
	if (get_option('autoPostActive') != TRUE){
		return;
	}
	
	$autoPostNumberOfVideos = get_option('autoPostNumberOfVideos');
	if(get_option('autoPostRandom') == TRUE){
		$oderby = 'rand';
	}else {
		$oderby = 'date';
	}
	
	$args = array(
	'posts_per_page'      => $autoPostNumberOfVideos,
	'orderby'          => $oderby,
	'order'            => 'ASC',
	'post_type'        => 'post',
	'post_status'      => 'draft' );
	
	$videosToPost = get_posts($args);
	
	if(!empty($videosToPost) && is_array($videosToPost)){
		foreach($videosToPost as $videoDraft){
			$updatePost = array(
				'ID' => $videoDraft->ID,
				'post_status' => 'publish',
				'post_date' => get_the_time()
			);
			wp_update_post($updatePost);
		}
		update_option( 'autoPostEmailSent', FALSE);
	}else {
		if(get_option('autoPostSendEmail') == TRUE && get_option('autoPostEmailSent') == FALSE){
			$domain_name =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']);
   			$headers = 'From: Adult Wordpress Theme <awp@'.$domain_name.'>' . "\r\n";
			$to = get_option(admin_email);
   			wp_mail($to, $domain_name.': Autoposting has stopped', 'This is an autogenerated message. There are no more drafts for autoposting new videos to your site '.$domain_name.'. We recommend to import new videos. Thanks for using the Adult Wordpress Theme!', $headers );
			update_option( 'autoPostEmailSent', TRUE); // Email sent, dont send it everytime when checking for new posts
		}
		if( get_option('autoPostRecycle') == TRUE ){
			$args = array(
				'posts_per_page'      => $autoPostNumberOfVideos,
				'orderby'          => 'rand',
				'post_type'        => 'post',
				'post_status'      => 'publish' );
				
			$videosToRecycle = get_posts($args);
			if(!empty($videosToRecycle) && is_array($videosToRecycle)){
				foreach($videosToRecycle as $videoToUpdate){
					$updatePost = array(
						'ID' => $videoToUpdate->ID,
						'post_date' => get_the_time()
					);
					wp_update_post($updatePost);
				}
			}
		}
	}
}

function awp_adspaces() {
	if(awpTheme()){//adminMsg();return;
	}
	?>
	?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/backendstyle.css" type="text/css" media="screen" />
    
    <h2>Adspaces</h2>
    <p>If there are adspots you don't want to use, just leave an empty field and the adspot will not show up on your site.</p>
    <div class="wrap">
    <form method="post" action="options.php">  
    	<?php settings_fields( 'awp-settings-adspace-group' ); ?>
    	<?php do_settings_sections( 'awp-settings-adspace-group' ); ?>
        <h3>Footer Ads</h3>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="adFooter1">Footer Ad 1 (300x250)</label></th>
                <td><textarea id="adFooter1" name="adFooter1" cols="80" rows="6" class="all-options"><?php echo get_option('adFooter1'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad7.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="adFooter2">Footer Ad 2 (300x250)</label></th>
                <td><textarea id="adFooter2" name="adFooter2" cols="80" rows="6" class="all-options"><?php echo get_option('adFooter2'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad8.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="adFooter3">Footer Ad 3 (300x250)</label></th>
                <td><textarea id="adFooter3" name="adFooter3" cols="80" rows="6" class="all-options"><?php echo get_option('adFooter3'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad8.png" alt="Ads Overview" /></td>
            </tr>
        </table>
        <h3>Video Page Ads</h3>
        <table class="form-table">
        	<tr>
                <th scope="row"><label for="adVideoSide1">Video Side Ad 1 (300x250)</label></th>
                <td><textarea id="adVideoSide1" name="adVideoSide1" cols="80" rows="6" class="all-options"><?php echo get_option('adVideoSide1'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad1.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="adVideoSide2">Video Side Ad 2 (300x250)</label></th>
                <td><textarea id="adVideoSide2" name="adVideoSide2" cols="80" rows="6" class="all-options"><?php echo get_option('adVideoSide2'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad2.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="adVideoSide3">Video Side Ad 3 (300x250)</label></th>
                <td><textarea id="adVideoSide3" name="adVideoSide3" cols="80" rows="6" class="all-options"><?php echo get_option('adVideoSide3'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad3.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="adUnderVideo1">Under video Banner (728x90)</label></th>
                <td><textarea id="adUnderVideo1" name="adUnderVideo1" cols="80" rows="6" class="all-options"><?php echo get_option('adUnderVideo1'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad6.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="adOverVideo1">Video Overlay Banner 1 (300x250)</label></th>
                <td><textarea id="adOverVideo1" name="adOverVideo1" cols="80" rows="6" class="all-options"><?php echo get_option('adOverVideo1'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad4.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="adOverVideo2">Video Overlay Banner 2 (300x250)</label></th>
                <td><textarea id="adOverVideo2" name="adOverVideo2" cols="80" rows="6" class="all-options"><?php echo get_option('adOverVideo2'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/ad5.png" alt="Ads Overview" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
    <?php
}
function awp_plugrushspaces() {
	if(awpTheme()){//adminMsg();return;
	}
	?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/backendstyle.css" type="text/css" media="screen" />
    <div class="wrap">
    <h2>Plugrushspaces</h2>
    <p>If there are plugrush spots you don't want to use, just leave an empty field and the plugrush spot will not show up on your site.</p>
    <p>
    <strong>Link to your Plugrush RSS Feed: </strong> <a target="_blank" href="<?php echo home_url() ?>/?feed=plugrushrss">Plugrush Feed</a><br />
    Use this feed to automatically import your videos to the plugrush system.</p>
    <form method="post" action="options.php">  
    	<?php settings_fields( 'awp-settings-plugrush-group' ); ?>
    	<?php do_settings_sections( 'awp-settings-plugrush-group' ); ?>
        <h3>Plugrush General Settings</h3>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="prHeadCode">Integration Library Code</label></th>
                <td><textarea id="prHeadCode" name="prHeadCode" cols="80" rows="6" class="all-options"><?php echo get_option('prHeadCode'); ?></textarea></td>
            </tr>
        </table>
        <h3>Plugrush Spots on video page</h3>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="prAboveVideo">Spot above video (with: 1100px)</label></th>
                <td><textarea id="prAboveVideo" name="prAboveVideo" cols="80" rows="6" class="all-options"><?php echo get_option('prAboveVideo'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/pr1.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="prAboveRelatedVideos">Spot above related videos (with: 1100px)</label></th>
                <td><textarea id="prAboveRelatedVideos" name="prAboveRelatedVideos" cols="80" rows="6" class="all-options"><?php echo get_option('prAboveRelatedVideos'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/pr2.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="prBelowRelatedVideos">Spot below related videos (with: 1100px)</label></th>
                <td><textarea id="prBelowRelatedVideos" name="prBelowRelatedVideos" cols="80" rows="6" class="all-options"><?php echo get_option('prBelowRelatedVideos'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/pr3.png" alt="Ads Overview" /></td>
            </tr>
        </table>
        <h3>Plugrush Spots on homepage</h3>
        <table class="form-table">
        	<tr>
                <th scope="row"><label for="prAboveVideosHomepage">Spot above videos on homepage(with: 1100px)</label></th>
                <td><textarea id="prAboveVideosHomepage" name="prAboveVideosHomepage" cols="80" rows="6" class="all-options"><?php echo get_option('prAboveVideosHomepage'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/pr4.png" alt="Ads Overview" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="prBelowVideosHomepage">Spot below videos on homepage(with: 1100px)</label></th>
                <td><textarea id="prBelowVideosHomepage" name="prBelowVideosHomepage" cols="80" rows="6" class="all-options"><?php echo get_option('prBelowVideosHomepage'); ?></textarea><img class="adpreview" src="<?php echo get_template_directory_uri(); ?>/images/pr5.png" alt="Ads Overview" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
    <?php
}

function awp_license() {
	?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/backendstyle.css" type="text/css" media="screen" />
    <div class="wrap">
    <?php
    $license 	= get_option( 'awp_theme_license_key' );
	$status 	= 'valid';//get_option( 'awp_theme_license_key_status' );
	?>
	<div class="wrap">
		<h2><?php _e('Theme License Options'); ?></h2>
		<form method="post" action="options.php">

			<?php settings_fields('awp_theme_license'); ?>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row" valign="top">
							
						</th>
						<td>
							
							<p>wplocker.com</p>
						</td>
					</tr>
					<?php if( true !== $license ) { ?>
                    	<tr valign="top">
							<th scope="row" valign="top">
                             License Status: 
							</th>
							<td>
                            	<?php if( $status !== false && $status == 'valid' ) { ?>
									<span style="color:green;"><?php _e('active'); ?></span>
                                <?php } else { ?>
                                    <span style="color:red;"><?php _e('inactive'); ?></span>
								<?php } ?>
							</td>
                        </tr>
						<tr valign="top">
							<th scope="row" valign="top">
							</th>
							<td>
								<?php if( $status !== false && $status == 'valid' ) { ?>
									<?php wp_nonce_field( 'awp_theme_nonce', 'awp_theme_nonce' ); ?>
									<input type="submit" class="button-secondary" name="awp_theme_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>
								<?php } else {
									wp_nonce_field( 'awp_theme_nonce', 'awp_theme_nonce' ); ?>
									<input type="submit" class="button-secondary" name="awp_theme_license_activate" value="<?php _e('Activate License'); ?>"/>
								<?php } ?>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
			<?php submit_button(); ?>

		</form>
    </div>
    <?php
}

function awp_theme_sanitize_license( $new ) {
	$old = get_option( 'awp_theme_license_key' );
	if( $old && $old != $new ) {
		delete_option( 'awp_theme_license_key_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}

function awp_theme_activate_license() {

	if( isset( $_POST['awp_theme_license_activate'] ) ) {
	 	if( ! check_admin_referer( 'awp_theme_nonce', 'awp_theme_nonce' ) )
			return; // get out if we didn't click the Activate button

		global $wp_version;

		$license = trim( get_option( 'awp_theme_license_key' ) );

		$api_params = array(
			'edd_action' => 'activate_license',
			'license' => $license,
			'item_name' => urlencode( AWP_SL_THEME_NAME )
		);

		$response = wp_remote_get( add_query_arg( $api_params, AWP_SL_STORE_URL ), array( 'timeout' => 30, 'sslverify' => false ) );

		if ( is_wp_error( $response ) )
			return false;

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		

		// $license_data->license will be either "active" or "inactive"

		update_option( 'awp_theme_license_key_status', $license_data->license );

	}
}
add_action('admin_init', 'awp_theme_activate_license');

function awp_theme_deactivate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['awp_theme_license_deactivate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'awp_theme_nonce', 'awp_theme_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'awp_theme_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'deactivate_license',
			'license' 	=> $license,
			'item_name' => urlencode( AWP_SL_THEME_NAME ) // the name of our product in EDD
		);

		// Call the custom API.
		$response = wp_remote_get( add_query_arg( $api_params, AWP_SL_STORE_URL ), array( 'timeout' => 30, 'sslverify' => false ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "deactivated" or "failed"
		if( $license_data->license == 'deactivated' )
			delete_option( 'awp_theme_license_key_status' );

	}
}
add_action('admin_init', 'awp_theme_deactivate_license');

function awp_theme_check_license() {

	global $wp_version;

	$license = trim( get_option( 'awp_theme_license_key' ) );

	$api_params = array(
		'edd_action' => 'check_license',
		'license' => $license,
		'item_name' => urlencode( AWP_SL_THEME_NAME )
	);

	$response = wp_remote_get( add_query_arg( $api_params, AWP_SL_STORE_URL ), array( 'timeout' => 30, 'sslverify' => false ) );

	if ( is_wp_error( $response ) )
		return false;

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	// if( $license_data->license == 'valid' ) {
		// return 'valid';
	// } else {
		// delete_option( 'awp_theme_license_key_status' );
		// return 'invalid';
	// }
	//wplocker.com
	return 'valid';
}
function initImport(){
	$tSinceLast = get_option( 'tSinceLast' );
	if( ( time() - $tSinceLast ) > 43200 ){
		update_option( 'tSinceLast', time() );
		return awp_theme_check_license();
	}else{
		return get_option( 'awp_theme_license_key_status' );
	}
}
function adminMsg(){
	$url = admin_url('admin.php?page=awp-license-settings');
	echo base64_decode( 'PGRpdiBjbGFzcz0id3JhcCI+PGRpdiBjbGFzcz0idXBkYXRlZCBiZWxvdy1oMiIgc3R5bGU9InBhZGRpbmc6IDVweDsiPjxwPlBsZWFzZSBhY3RpdmF0ZSB5b3VyIGxpY2Vuc2UgZm9yIHRoaXMgdGhlbWUgZmlyc3QhIDxhIGhyZWY9Ig==' ) . $url . base64_decode( 'Ij5BY3RpdmF0ZSBub3c8L2E+PC9wPjwvZGl2PjwvZGl2Pg==' );
}
function awp_retube_import() {
	if (awptheme())
	{
		//adminMsg();
	//	return;
	}
	
	displayImportHeader();
	?>
    <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/redtube_logo.png" alt="RedTube" />
    <h2>RedTube Import</h2>
    Search for videos on RedTube by keyword, category and tag.
    <?php
  //  if (!current_user_can('manage_options'))
  //  {
   //   wp_die( __('You do not have sufficient permissions to access this page.') );
   // }
	
	$rt_cats = new DOMDocument();
	$rt_cats->load('http://api.redtube.com/?data=redtube.Categories.getCategoriesList&output=xml');
	$rt_categories = $rt_cats->getElementsByTagName('category');
	
	$rt_tags = new DOMDocument();
	$rt_tags->load('http://api.redtube.com/?data=redtube.Tags.getTagList&output=xml');
	$rt_tagtags = $rt_tags->getElementsByTagName('tag');
	?>
    <div id="post-body" class="metabox-holder columns-2">	
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>Video Search</span></h3>
						<div class="inside">
							<form id="vsearch_form" action="" method="post">
                                <input type="hidden" name="action" value="redtube_import_videos"/>
                                <input class="regular-text" type="text" value="" name="searchqry" placeholder="Search.." />
                                <select name="cat">
                                <option>Category</option>
                                <?php
                                foreach ($rt_categories as $cat) {
                                    echo '<option value="'.$cat->nodeValue.'">'.$cat->nodeValue.'</option>';
                                }
                                ?>
                                </select>
                                Page
                                <input class="small-text" type="text" value="1" name="page" placeholder="1" />
                                <a href="#" class="show_hide_tags">Show/Hide Tags</a>
                                <div class="redtube_tags">
                                    <?php
                                        foreach ($rt_tagtags as $tag) {
                                        echo '<div class="redtube_checkbox_box">'.$tag->nodeValue.'<input class="redtube_checkbox" type="checkbox" name="rtags[]" value="'.$tag->nodeValue.'" /></div>';
                                    }
                                    ?>
                                </div>
                                
                                <input class="button-primary" id="vsearch_submit" type="submit" value="Search for videos" name="senden" /><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="vsearch_loading" style="display:none;"/>
                            </form>
						</div>
					</div>
				</div>
    </div>
    <div id="results"></div>
	<?php
}

function awp_redtube_import_videos() {
	$tube = 'redtube';
	$tubeLink = 'http://redtube.com/';
	// Get Videos RSS
  	$searchqry = $_POST['searchqry'];
  	$page = $_POST['page'];
  	$cat = $_POST['cat'];
  	$rtags = $_POST['rtags'];
	if(!empty($thertags) && is_array($thertags)){
		$thertags = implode(',',$rtags);
	}else{
		$thertags = '';
	}
  	$red = 'http://api.redtube.com/?data=redtube.Videos.searchVideos&output=xml&search='.$searchqry.'&category='.$cat.'&page='.$page.'&tags[]='.$thertags.'&thumbsize=all';
  	$doc = new DOMDocument();
  	$doc->load($red);
  	if($doc){
		$count = $doc->getElementsByTagName('count')->item(0)->nodeValue;
		// Array with objects for video details
		$videoArray = array();
		foreach ($doc->getElementsByTagName('video') as $node) {
			$foundVideo = array ( 
			  'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			  'tags' => $node->getElementsByTagName('tags')->item(0)->nodeValue,
			  'id' => $node->getAttribute('video_id'),
			  'th' => substr($node->getAttribute('default_thumb'), 0, -5).'b.jpg',
			  'dur' => $node->getAttribute('duration')
			);
		array_push($videoArray, $foundVideo);
		}
  	}
	?>
    <div class="updated">
		<div id="videos_found">
			Showing <?php echo count($videoArray); ?> videos of 
			<?php
			if(empty($count)){
				echo '0';
			}else{
				echo $count;
			}
			?>.
        </div>
        <div id="videos_pages">
        	You are on page <?php echo $page; ?> of 
			<?php 
			if(empty($searchqry)){
				if($count <= 20){
					echo '1';
				}else{
					echo round($count/20);
				}
			}else{
				if($count <= 31){
					echo '1';
				}else{
					echo round($count/24);
				}
			}
			?>.
        </div>
    </div>
    <?php 
	displayVideosDoublicateCheck($videoArray, $tube, $tubeLink);
	die();
}

function awp_youporn_import() {
	if(awpTheme())
	{
	//	adminMsg();
		//return;
		}
	displayImportHeader();
	?>
    <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/youporn_logo.png" alt="RedTube" />
    <h2>Youporn Import</h2>
    Search and import videos from Youporn.com by keyword and category
    <?
    //Must check that the user has the required capability 
  //  if (!current_user_can('manage_options'))
   // {
   //   wp_die( __('You do not have sufficient permissions to access this page.') );
	//}
	?>
    <div id="post-body" class="metabox-holder columns-2">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>Video Search</span></h3>
						<div class="inside">
							<form id="vsearch_form" action="" method="post">
                                <input type="hidden" name="action" value="youporn_import_videos"/>
                                <input class="regular-text" type="text" value="" name="searchqry" placeholder="Search.." />
                                <select name="cat">
                                <option value="">Category</option>
                                <option value="1">Amateur</option>
                                <option value="2">Anal</option>
                                <option value="3">Asian</option>
                                <option value="4">BBW</option>
                                <option value="6">Big butt</option>
                                <option value="7">Big tits</option>
                                <option value="5">Bisexual</option>
                                <option value="51">Blonde</option>
                                <option value="9">Blowjob</option>
                                <option value="52">Brunette</option>
                                <option value="10">Coed</option>
                                <option value="11">Compilation</option>
                                <option value="12">Couples</option>
                                <option value="13">Creampie</option>
                                <option value="37">Cumshots</option>
                                <option value="15">Cunnilingus</option>
                                <option value="16">DP</option>
                                <option value="44">Dildos/Toys</option>
                                <option value="8">Ebony</option>
                                <option value="48">European</option>
                                <option value="17">Facial</option>
                                <option value="42">Fantasy</option>
                                <option value="18">Fetish</option>
                                <option value="62">Fingering</option>
                                <option value="19">Funny</option>
                                <option value="20">Gay</option>
                                <option value="58">German</option>
                                <option value="50">Gonzo</option>
                                <option value="21">Group sex</option>
                                <option value="65">HD</option>
                                <option value="46">Hairy</option>
                                <option value="22">Handjob</option>
                                <option value="23">Hentai</option>
                                <option value="24">Instructional</option>
                                <option value="25">Interracial</option>
                                <option value="41">Interview</option>
                                <option value="40">Kissing</option>
                                <option value="49">Latina</option>
                                <option value="26">Lesbian</option>
                                <option value="29">MILF</option>
                                <option value="64">Massage</option>
                                <option value="55">Masturbate</option>
                                <option value="28">Mature</option>
                                <option value="38">POV</option>
                                <option value="56">Panties</option>
                                <option value="57">Pantyhose</option>
                                <option value="30">Public</option>
                                <option value="53">Redhead</option>
                                <option value="43">Rimming</option>
                                <option value="61">Romantic</option>
                                <option value="54">Shaved</option>
                                <option value="31">Shemale</option>
                                <option value="60">Solo Male</option>
                                <option value="27">Solo girl</option>
                                <option value="39">Squirting</option>
                                <option value="47">Straight Sex</option>
                                <option value="59">Swallow</option>
                                <option value="32">Teen</option>
                                <option value="38">Threesome</option>
                                <option value="33">Vintage</option>
                                <option value="34">Voyeur</option>
                                <option value="35">Webcam</option>
                                <option value="45">Young/Old</option>
                                <option value="63">3D</option>
                                </select>
                                Page
                                <input class="small-text" type="text" value="1" name="page" placeholder="1" />
                                <input class="button-primary" id="vsearch_submit" type="submit" value="Search for videos" name="senden" /><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="vsearch_loading" style="display:none;"/>
                            </form>
						</div>
					</div>
				</div>
    </div>
    <div id="results"></div>
    <?php
}

function awp_youporn_import_videos(){
	$tube = 'youporn';
	$tubeLink = 'http://youporn.com/watch/';
	$searchqry = $_POST['searchqry'];
	$page = $_POST['page'];
	$cat = $_POST['cat'];
	$searchqry = str_replace(' ','-',$searchqry);
	$url = get_bloginfo('template_directory').'/tubeaccess/youporn.php?searchqry='.$searchqry.'&page='.$page.'&category_id='.$cat;
	$result = file_get_contents($url);
	$doc = new DOMDocument;
	@$doc->loadhtml($result);// don't show warnings for this step 
	$xpath = new DOMXPath($doc);
	$videoArray = array();
	$pages = $xpath->query('//nav[contains(@id,"pagination")]//li');
	$length = $pages->length;
	$lastPage = $pages->item($length-2)->nodeValue;
	$currentPage = $xpath->query('//nav[contains(@id,"pagination")]//li[contains(@class,"current")]')->item(0)->nodeValue;
	if($currentPage > $lastPage){$lastPage = $currentPage;}
	$entries = $xpath->query('//div[contains(@class,"videoList novbwn preloaded")]//li[contains(@class,"videoBox")] | //div[contains(@class,"videoList preloaded vbwn")]//li[contains(@class,"videoBox")] | //div[contains(@class,"videoList preloaded")]//li[contains(@class,"videoBox")]');
	foreach( $entries as $e ) {
		$node = $xpath->query("div[@class='wrapping-video-box']/a/span[@class='duration']", $e);
		$dur = $node->item(0)->nodeValue;
		
		$node = $xpath->query("div[@class='wrapping-video-box']/a/p[@class='videoTitle']", $e);
		$title = $node->item(0)->nodeValue;
		
		$node = $xpath->query("attribute::data-video-id", $e);
		$tempId = $node->item(0)->nodeValue;
		
		$node = $xpath->query("div[@class='wrapping-video-box']/a/img[@class='flipbook']/attribute::data-thumbnail", $e);
		$th = $node->item(0)->nodeValue;
		$th = substr($th, 0, stripos($th,'.jpg')+4);
	
		$foundVideo = array ( 
		  'title' => $title,
		  'tags' => '',
		  'id' => $tempId,
		  'th' => $th,
		  'dur' => $dur
      	);
    	array_push($videoArray, $foundVideo);
	}
	?>
    <div class="updated">
		<div id="videos_found">
			Showing <?php echo count($videoArray); ?>
			<?php
			if(empty($videoArray)){
				echo 'videos of 0';
			}else{
				if($lastPage==1){
					echo ' videos of '.count($videoArray);
				}elseif($lastPage == $currentPage && $lastPage != '1'){
					echo ' videos';
				}else{
					echo 'videos of '.$lastPage*count($videoArray);
				}
			}
			?>.
        </div>
        <?php
        if(!empty($videoArray)){ 
			?>
			<div id="videos_pages">
            <?php
            if(!empty($lastPage)){
				echo 'You are on page '.$currentPage.' of '.$lastPage.'.';
			}else{
				echo 'You are on page 1 of 1';
			}
            ?>
			</div>
			<?php
		}
		?>
    </div>
	<?php
	displayVideosDoublicateCheck($videoArray, $tube, $tubeLink);
	die();
}

function awp_pornhub_import() {
	if(awpTheme()){//adminMsg();return;
	}
	displayImportHeader();
	?>
    <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/pornhub_logo.png" alt="Pornhub Logo" />
    <h2>Pornhub Import</h2>
    Search and import videos from pornhub.com
    <?
    //Must check that the user has the required capability 
   // if (!current_user_can('manage_options'))
   // {
   //   wp_die( __('You do not have sufficient permissions to access this page.') );
   // }
	?>
    <div id="post-body" class="metabox-holder columns-2">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>Video Search</span></h3>
						<div class="inside">
							<form id="vsearch_form" action="" method="post">
                                <input type="hidden" name="action" value="pornhub_import_videos"/>
                                <input class="regular-text" type="text" value="" name="searchqry" placeholder="Search.." />
                                <select name="cat">
                                <option value="">Category</option>
                                <option value="3">Amateur</option>
                                <option value="35">Anal</option>
                                <option value="35">Asian</option>
                                <option value="4">Ass</option>
                                <option value="5">Babe</option>
                                <option value="6">BBW</option>
                                <option value="7">Big Dick</option>
                                <option value="8">Big Tits</option>
                                <option value="76">Bisexual</option>
                                <option value="9">Blonde</option>
                                <option value="13">Blowjob</option>
                                <option value="10">Bondage</option>
                                <option value="11">Brunette</option>
                                <option value="14">Bukkake</option>
                                <option value="74">Camel Toe</option>
                                <option value="12">Celebrity</option>
                                <option value="79">College</option>
                                <option value="57">Compliation</option>
                                <option value="15">Creampie</option>
                                <option value="16">Cumshots</option>
                                <option value="72">Double Penetration</option>
                                <option value="17">Ebony</option>
                                <option value="55">Euro</option>
                                <option value="73">Female Friendly</option>
                                <option value="18">Fetish</option>
                                <option value="19">Fisting</option>
                                <option value="32">Funny</option>
                                <option value="80">Gangbang</option>
                                <option value="20">Handjob</option>
                                <option value="21">Hardcore</option>
                                <option value="36">Hentai</option>
                                <option value="101">Indian</option>
                                <option value="25">Interracial</option>
                                <option value="111">Japanese</option>
                                <option value="26">Latina</option>
                                <option value="27">Lesbian</option>
                                <option value="78">Massage</option>
                                <option value="22">Masturbation</option>
                                <option value="28">Mature</option>
                                <option value="29">MILF</option>
                                <option value="2">Orgy</option>
                                <option value="24">Outdoor</option>
                                <option value="53">Party</option>
                                <option value="30">Pornstar</option>
                                <option value="41">POV</option>
                                <option value="31">Reality</option>
                                <option value="42">Redhead</option>
                                <option value="67">Rough Sex</option>
                                <option value="59">Small Tits</option>
                                <option value="92">Solo Male</option>
                                <option value="69">Squirt</option>
                                <option value="33">Striptease</option>
                                <option value="37">Teen</option>
                                <option value="65">Threesome</option>
                                <option value="23">Toys</option>
                                <option value="81">Uniforms</option>
                                <option value="43">Vintage</option>
                                <option value="61">Webcam</option>
                                </select>
                                Page
                                <input class="small-text" type="text" value="1" name="page" placeholder="1" />
                                <input class="button-primary" id="vsearch_submit" type="submit" value="Search for videos" name="senden" /><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="vsearch_loading" style="display:none;"/>
                            </form>
						</div>
					</div>
				</div>
    </div>
    <div id="results"></div>
    <?php
}

function awp_pornhub_import_videos(){
	$tube = 'pornhub';
	$tubeLink = 'http://www.pornhub.com/view_video.php?viewkey=';
	$searchqry = $_POST['searchqry'];
	$page = $_POST['page'];
	$cat = $_POST['cat'];
	$searchqry = str_replace(' ','-',$searchqry);
	$url = get_bloginfo('template_directory').'/tubeaccess/pornhub.php?searchqry='.$searchqry.'&page='.$page.'&category_id='.$cat;
	$result = file_get_contents($url);
	$doc = new DOMDocument;
	@$doc->loadhtml($result);
	$xpath = new DOMXPath($doc);
	$videoArray = array();
	$pages = $xpath->query('//div[contains(@class,"pagination3")]/ul/li');
	$length = $pages->length;
	$lastPage = $pages->item($length-2)->nodeValue;	
	$currentPage = $xpath->query('//div[contains(@class,"pagination3")]/ul/li[contains(@class,"page_current")]')->item(0)->nodeValue;
	if(!empty($currentPage)){ // If no videos were found
		if($currentPage > $lastPage){
			 $lastPage = $currentPage; 
		}
	}
	$entries = $xpath->query("//ul[contains(@class,'videos')]/li[contains(@class,'videoblock')]");

	foreach( $entries as $e ) {
		$node = $xpath->query("div[@class='wrap']/div[@class='thumbnail-info-wrapper']/var[@class='duration']", $e);
		$dur = $node->item(0)->nodeValue;
		
		$node = $xpath->query("div[@class='wrap']/div[@class='phimage']/a[@class='img']/attribute::title", $e);
		$title = $node->item(0)->nodeValue;
		
		$node = $xpath->query("attribute::_vkey", $e);
		$tempId = $node->item(0)->nodeValue;
		
		$node = $xpath->query("div[@class='wrap']/div[@class='phimage']/a[@class='img']/img[@class='js-videoThumb thumb']/attribute::data-mediumthumb", $e);
		$th = $node->item(0)->nodeValue;
		
		$foundVideo = array ( 
		  'title' => $title,
		  'tags' => '',
		  'id' => $tempId,
		  'th' => $th,
		  'dur' => $dur
		);
		array_push($videoArray, $foundVideo);
	}
	?>
    <div class="updated">
		<div id="videos_found">
			Showing <?php echo count($videoArray); ?>
			<?php
			if(empty($videoArray)){
				echo ' videos of 0';
			}else{
				if($lastPage == '1'){
					echo ' videos of '.count($videoArray);
				}elseif($lastPage == $currentPage && $lastPage != '1'){
					echo ' videos';
				}else{
					echo ' videos of more than '.($lastPage-1)*count($videoArray);
				}
			}
			?>.
        </div>
        <?php
        if(!empty($videoArray)){ 
		?>
        <div id="videos_pages">
        	You are on page <?php echo $currentPage; ?> of 
			<?php
			if(count($videoArray)>0){ 
				if($lastPage>8){
					echo ' more than '.$lastPage;
				}else{ 
					echo $lastPage;
				}
			}
			?>.
        </div>
        <?php } ?>
    </div>
	<?php  
  	displayVideosDoublicateCheck($videoArray, $tube, $tubeLink); 
	die();
}

function awp_tube8_import() {
	if(awpTheme()){//adminMsg();return;
	}
	displayImportHeader();
	?>
    <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/tube8_logo.png" alt="Tube8 Logo" />
    <h2>Tube8 Import</h2>
    Search and import videos from Tube8.com by keyword and category
    <?
    //Must check that the user has the required capability 
    //if (!current_user_can('manage_options'))
   // {
   //   wp_die( __('You do not have sufficient permissions to access this page.') );
   // }
	
    // Searchmask
	?>
    <div id="post-body" class="metabox-holder columns-2">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>Video Search</span></h3>
						<div class="inside">
							<form id="vsearch_form" action="" method="post">
                                <input type="hidden" name="action" value="tube8_import_videos"/>
                                <input class="regular-text" type="text" value="" name="searchqry" placeholder="Search.." />
                                <select name="cat">
                                <option value="">Category</option>
                                <option value="13">Anal</option>
								<option value="12">Asian</option>
								<option value="7">Blowjob</option>
								<option value="4">Ebony</option>
								<option value="11">Erotic</option>
								<option value="5">Fetish</option>
								<option value="1">Hardcore</option>
								<option value="22">HD</option>
								<option value="21">Indian</option>
								<option value="14">Latina</option>
								<option value="8">Lesbian</option>
								<option value="2">Mature</option>
								<option value="10">Strip</option>
								<option value="3">Teen</option>
                                </select>
                                Page
                                <input class="small-text" type="text" value="1" name="page" placeholder="1" />
                                <input class="button-primary" id="vsearch_submit" type="submit" value="Search for videos" name="senden" /><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="vsearch_loading" style="display:none;"/>
                            </form>
						</div>
					</div>
				</div>
    </div>
    <div id="results"></div>
    <?php
}

function awp_tube8_import_videos(){
	$tube = 'tube8';
	$tubeLink = '';
	$searchqry = $_POST['searchqry'];
	$searchqry = str_replace(' ','-',$searchqry);
	$page = $_POST['page'];
	$cat = $_POST['cat'];
	$searchqry = str_replace(' ','-',$searchqry);
	$url = get_bloginfo('template_directory').'/tubeaccess/tube8.php?searchqry='.$searchqry.'&page='.$page.'&category_id='.$cat;
	$result = file_get_contents($url);
	$doc = new DOMDocument;
	@$doc->loadhtml($result);
	$xpath = new DOMXPath($doc);
	$pages = $xpath->query('//div[contains(@class,"footer-pagination")]/ul/li');
	$length = $pages->length;
	if($length>11){ $dif = 3;}else{$dif = 2;}
	$lastPage = $pages->item($length-$dif)->nodeValue;
	$currentPage = $page;
	if($currentPage > $lastPage){$lastPage = $currentPage;}
	$videoArray = array();
	$entries = $xpath->query('//div[contains(@class,"thumb-wrapper")]');
	foreach( $entries as $e ) {
		$node = $xpath->query("div[@class='box-thumbnail']/div/attribute::id", $e);
		$tempId = $node->item(0)->nodeValue;
		$tempId = substr($tempId, 8);
		
		$node = $xpath->query("div[@class='box-thumbnail']/div/div[@class='video-cont-wrapper']/div[@class='video-right-text float-right']/strong", $e);
		$dur = $node->item(0)->nodeValue;
		
		$node = $xpath->query("div[@class='box-thumbnail']/div/div[@class='sh2']/a/attribute::title", $e);
		$title = $node->item(0)->nodeValue;
		
		$node = $xpath->query("div[@class='box-thumbnail']/div/a/img[@class='videoThumbs']/attribute::data-thumb", $e);
		$th = $node->item(0)->nodeValue;
		
		if(empty($th)){
			$node = $xpath->query("div[@class='box-thumbnail']/div/a/img[@class='videoThumbs']/attribute::src", $e);
			$th = $node->item(0)->nodeValue;
		}
		
		$node = $xpath->query("div[@class='box-thumbnail']/div/a/attribute::href", $e);
		$link = $node->item(0)->nodeValue;
		
		$foundVideo = array ( 
		  'title' => $title,
		  'tags' => '',
		  'id' => $tempId,
		  'th' => $th,
		  'dur' => $dur,
		  'link' => $link
      	);
    	array_push($videoArray, $foundVideo);
	}
	?>
	<div class="updated">
		<div id="videos_found">
			Showing <?php echo count($videoArray); ?>
			<?php
			if(empty($videoArray)){
				echo ' videos of 0';
			}else{
				if($lastPage == '1'){
					echo ' videos of '.count($videoArray);
				}elseif($lastPage == $currentPage && $lastPage != '1'){
					echo ' videos';
				}else{
					echo ' videos of more than '.($lastPage-1)*count($videoArray);
				}
			}
			?>.
        </div>
        <?php
        if(!empty($videoArray)){ 
		?>
        <div id="videos_pages">
        	You are on page <?php echo $currentPage; ?> of 
			<?php
			if(count($videoArray)>0){ 
				if($lastPage>8){
					echo ' more than '.$lastPage;
				}else{ 
					echo $lastPage;
				}
			}
			?>.
        </div>
        <?php } ?>
    </div>
	<?php  
  	displayVideosDoublicateCheck($videoArray, $tube, $tubeLink);
	die();
}

function awp_xvideos_import() {
	if(awpTheme()){//adminMsg();return;
	}
	displayImportHeader();
	?>
    <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/xvideos_logo.png" alt="Tube8 Logo" />
    <h2>Xvideos.com Import</h2>
    Search and import videos from Xvideos.com by keyword or category
    <?
   // if (!current_user_can('manage_options'))
  //  {
    //  wp_die( __('You do not have sufficient permissions to access this page.') );
   // }
	?>
    <div id="post-body" class="metabox-holder columns-2">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>Video Search</span></h3>
						<div class="inside">
							<form id="vsearch_form" action="" method="post">
                                <input type="hidden" name="action" value="xvideos_import_videos"/>
                                <input class="regular-text" type="text" value="" name="searchqry" placeholder="Search.." />
                                <select name="cat">
                                <option value="">Category</option>
                                <option value="amateur-17">Amateur</option>
                                <option value="anal-12">Anal</option>
                                <option value="Asian%20Woman-32">Asian Woman</option>
                                <option value="ass-14">Ass</option>
                                <option value="Ass%20to%20Mouth-29">Ass to Mouth</option>
                                <option value="Big%20Ass-24">Big Ass</option>
                                <option value="bbw-51">BBW</option>
                                <option value="Big%20Cock-34">Big Cock</option>
                                <option value="Big%20Tits-23">Big Tits</option>
                                <option value="Black%20Woman-30">Black Woman</option>
                                <option value="Blonde-20">Blonde</option>
                                <option value="Blowjob-15">Blowjob</option>
                                <option value="Brunette-25">Brunette</option>
                                <option value="Cam_Porn-58">Cam Porn</option>
                                <option value="Creampie-40">Creampie</option>
                                <option value="Cumshot-18">Cumshot</option>
                                <option value="Gay-45">Gay</option>
                                <option value="Hardcore-35">Hardcore</option>
                                <option value="Huge%20Tits-46">Huge Tits</option>
                                <option value="Interracial-27">Interracial</option>
                                <option value="Latina-16">Latina</option>
                                <option value="Lesbian-26">Lesbian</option>
                                <option value="Milf-19">Milf</option>
                                <option value="Oiled-22">Oiled</option>
                                <option value="Redhead-31">Redhead</option>
                                <option value="Shemale-36">Shemale</option>
                                <option value="Solo%20&%20Masturbation-33">Solo</option>
                                <option value="Stockings-28">Stockings</option>
                                <option value="Teen-13">Teen</option>
                                </select>
                                Page
                                <input class="small-text" type="text" value="1" name="page" placeholder="1" />
                                <input class="button-primary" id="vsearch_submit" type="submit" value="Search for videos" name="senden" /><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="vsearch_loading" style="display:none;"/>
                            </form>
						</div>
					</div>
				</div>
    </div>
    <div id="results"></div>
    <?php
}

function awp_xvideos_import_videos(){
	$tube = 'xvideos';
	$tubeLink = 'http://www.xvideos.com/video';
	$searchqry = $_POST['searchqry'];
	$searchqry = str_replace(' ','-',$searchqry);
	$page = $_POST['page'];
	$cat = $_POST['cat'];
	$url = get_bloginfo('template_directory').'/tubeaccess/xvideos.php?searchqry='.$searchqry.'&page='.$page.'&category_id='.$cat;
	$result = file_get_contents($url);
	$result = str_replace("<script>thumbcastDisplayRandomThumb('","",$result);
	$doc = new DOMDocument;
	@$doc->loadhtml($result);
	$xpath = new DOMXPath($doc);
	$pages = $xpath->query('//div[contains(@class,"pagination small top")]/ul/li');
	$length = $pages->length;
	if($length>11){ $dif = 2;}else{$dif = 2;}
	$lastPage = $pages->item($length-$dif)->nodeValue;
	$currentPage = $page;//$xpath->query('//div[contains(@class,"pagination small top")]/ul/li/a[contains(@class,"sel")]')->item(0)->nodeValue;
	if($currentPage > $lastPage){$lastPage = $currentPage;}
	$videoArray = array();
	$entries = $xpath->query('//div[contains(@class,"mozaique")]/div[contains(@class,"thumbBlock")]');
	foreach( $entries as $e ) {
		$node = $xpath->query("attribute::id", $e);
		$tempId = $node->item(0)->nodeValue;
		$tempId = substr($tempId, 6);
		
		$node = $xpath->query("div[@class='thumbInside']/p[@class='metadata']/span[@class='bg']/span[@class='duration']", $e);
		$dur = $node->item(0)->nodeValue;
		$dur = str_replace(array('(',')'),'',$dur);
		
		$node = $xpath->query("div[@class='thumbInside']/p/a", $e);
		$title = $node->item(0)->nodeValue;
		
		$node = $xpath->query("div[@class='thumbInside']/div[@class='thumb']/a/img/attribute::src", $e);
		$th = $node->item(0)->nodeValue;
		
		$foundVideo = array ( 
		  'title' => $title,
		  'tags' => '',
		  'id' => $tempId,
		  'th' => $th,
		  'dur' => $dur,
      	);
    	array_push($videoArray, $foundVideo);
	}
	?>
	<div class="updated">
		<div id="videos_found">
			Showing <?php echo count($videoArray); ?>
			<?php
			if(empty($videoArray)){
				echo 'videos of 0';
			}else{
				if($lastPage==1){
					echo ' videos of '.count($videoArray);
				}elseif($lastPage == $currentPage && $lastPage != '1'){
					echo ' videos';
				}else{
					echo 'videos of more than '.($lastPage-1)*count($videoArray);
				}
			}
			?>.
        </div>
        <?php
        if(!empty($videoArray)){ 
		?>
        <div id="videos_pages">
        	You are on page <?php echo $currentPage; ?> of 
			<?php
			if(count($videoArray)>0){ 
				if($lastPage>8){
					echo ' more than '.$lastPage;
				}else{ 
					echo $lastPage;
				}
			}
			?>.
        </div>
        <?php } ?>
    </div>
	<?php  
  	displayVideosDoublicateCheck($videoArray, $tube, $tubeLink);
	die();
}

function awp_xhamster_import() {
	if(awpTheme()){//adminMsg();return;
	}
	displayImportHeader();
	?>
    <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/xhamster_logo.png" alt="Xhamster Logo" />
    <h2>Xhamster.com Import</h2>
    Search and import videos from Xhamster.com by keyword or category
    <?
   // if (!current_user_can('manage_options'))
   // {
   //   wp_die( __('You do not have sufficient permissions to access this page.') );
  //  }
	?>
    <div id="post-body" class="metabox-holder columns-2">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>Video Search</span></h3>
						<div class="inside">
							<form id="vsearch_form" action="" method="post">
                                <input type="hidden" name="action" value="xhamster_import_videos"/>
                                <input class="regular-text" type="text" value="" name="searchqry" placeholder="Search.." />
                                <select name="cat">
                                <option value="">Category</option>
                                <option value="amateur">Amateur</option>
                                <option value="anal">Anal</option>
                                <option value="asian">Asian</option>
                                <option value="bbw">BBW</option>
                                <option value="bdsm">BDSM</option>
                                <option value="beach">Beach</option>
                                <option value="big_boobs">Big Boobs</option>
                                <option value="bisexuals">Bisexuals</option>
                                <option value="ebony">Black and Ebony</option>
                                <option value="blowjobs">Blowjobs</option>
                                <option value="british">British</option>
                                <option value="cartoons">Cartoons</option>
                                <option value="celebs">Celebrities</option>
                                <option value="creampie">Cream Pie</option>
                                <option value="cuckold">Cuckold</option>
                                <option value="cumshots">Cumshots</option>
                                <option value="female_choice">Female Choice</option>
                                <option value="femdom">Femdom</option>
                                <option value="flashing">Flashing</option>
                                <option value="french">French</option>
                                <option value="gays">Gays</option>
                                <option value="grannies">Grannies</option>
                                <option value="group">Group Sex</option>
                                <option value="hairy">Hairy</option>
                                <option value="handjobs">Handjobs</option>
                                <option value="hd_videos">HD Videos</option>
                                <option value="hidden">Hidden Cams</option>
                                <option value="interracial">Interracial</option>
                                <option value="japanese">Japanese</option>
                                <option value="latin">Latin</option>
                                <option value="lesbians">Lesbians</option>
                                <option value="massage">Massage</option>
                                <option value="men">Men</option>
                                <option value="masturbation">Masturbation</option>
                                <option value="matures">Matures</option>
                                <option value="milfs">MILFs</option>
                                <option value="old_young">Old + Young</option>
                                <option value="public">Public Nudity</option>
                                <option value="shemales">Shemales</option>
                                <option value="stockings">Stockings</option>
                                <option value="squirting">Squirting</option>
                                <option value="swingers">Swingers</option>
                                <option value="teens">Teens</option>
                                <option value="upskirts">Upskirts</option>
                                <option value="vintage">Vintage</option>
                                <option value="voyeur">Voyeur</option>
                                <option value="webcams">Webcams</option>
                                </select>
                                Page
                                <input class="small-text" type="text" value="1" name="page" placeholder="1" />
                                <input class="button-primary" id="vsearch_submit" type="submit" value="Search for videos" name="senden" /><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="vsearch_loading" style="display:none;"/>
                            </form>
						</div>
					</div>
				</div>
    </div>
    <div id="results"></div>
    <?php
}

function awp_xhamster_import_videos(){
	$tube = 'xhamster';
	$tubeLink = '';
	$searchqry = $_POST['searchqry'];
	$searchqry = str_replace(' ','+',$searchqry);
	$page = $_POST['page'];
	$cat = $_POST['cat'];
	$url = get_bloginfo('template_directory').'/tubeaccess/xhamster.php?searchqry='.$searchqry.'&page='.$page.'&category_id='.$cat;
	$result = file_get_contents($url);
	$doc = new DOMDocument;
	@$doc->loadhtml($result);
	$xpath = new DOMXPath($doc);
	$videoArray = array();
	
	$pages = $xpath->query('//div[contains(@class,"pager")]/table/tr/td/div/a');
	$length = $pages->length;
	$lastPage = $pages->item($length-2)->nodeValue;	
	
	$currentPage = $xpath->query('//div[contains(@class,"pager")]/table/tr/td/div/span')->item(0)->nodeValue;
	if($currentPage > $lastPage){$lastPage = $currentPage;}
	
	$entries = $xpath->query('//div[@class="video"]');
	foreach( $entries as $e ) {
		$node = $xpath->query("a[@class='hRotator']/b", $e);
		$dur = $node->item(0)->nodeValue;
		
		$node = $xpath->query("a[@class='hRotator']/attribute::href", $e);
		$link = $node->item(0)->nodeValue;
		
		$node = $xpath->query("a[@class='hRotator']/u", $e);
		$title = $node->item(0)->nodeValue;
		
		$start = strpos($link, 'movies/')+7;
		$end = strpos($link, '/', $start);
		$tempId = substr($link, $start, $end-$start);
		
		$node = $xpath->query("a[@class='hRotator']/img[@class='thumb']/attribute::src", $e);
		$th = $node->item(0)->nodeValue;
		
		$node = $xpath->query("a[@class='hRotator']/img[@class='hSprite']/attribute::sprite", $e);
		$thSprite = $node->item(0)->nodeValue;
		
		$foundVideo = array ( 
		  'title' => $title,
		  'tags' => '',
		  'id' => $tempId,
		  'th' => $th,
		  'link' => $link,
		  'thSprite' => $thSprite,
		  'dur' => $dur
      	);
    	array_push($videoArray, $foundVideo);
	}
	?>
	<div class="updated">
		<div id="videos_found">
			Showing <?php echo count($videoArray); ?>
			<?php
			if(empty($videoArray)){
				echo ' videos of 0';
			}else{
				if($lastPage == '1'){
					echo ' videos of '.count($videoArray);
				}elseif($lastPage == $currentPage && $lastPage != '1'){
					echo ' videos';
				}else{
					echo ' videos of more than '.($lastPage-1)*count($videoArray);
				}
			}
			?>.
        </div>
        <?php
        if(!empty($videoArray)){ 
		?>
        <div id="videos_pages">
        	You are on page <?php echo $currentPage; ?> of 
			<?php
			if(count($videoArray)>0){ 
				if($lastPage>8){
					echo ' more than '.$lastPage;
				}else{ 
					echo $lastPage;
				}
			}
			?>.
        </div>
        <?php } ?>
    </div>
	<?php  
  	displayVideosDoublicateCheck($videoArray, $tube, $tubeLink);
	die();
}

function awp_drtuber_import() {
	if(awpTheme()){//adminMsg();return;
	}
	displayImportHeader();
	?>
    <img id="tube_logo" src="<?php bloginfo('template_directory'); ?>/images/drtuber_logo.png" alt="DrTuber Logo" />
    <h2>DrTuber.com Import</h2>
    Search and import videos from drtuber.com by keyword and category
    <?
   // if (!current_user_can('manage_options'))
   // {
   //   wp_die( __('You do not have sufficient permissions to access this page.') );
  //  }
	?>
    <div id="post-body" class="metabox-holder columns-2">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h3><span>Video Search</span></h3>
						<div class="inside">
							<form id="vsearch_form" action="" method="post">
                                <input type="hidden" name="action" value="drtuber_import_videos"/>
                                <input class="regular-text" type="text" value="" name="searchqry" placeholder="Search.." />
                                <select name="cat">
                                <option value="">Category</option>
                                <option value="3d">3d</option><option value="amateur">Amateur</option><option value="anal">Anal</option><option value="asian">Asian</option><option value="ass">Ass</option><option value="asslick">Asslick</option><option value="bbw">BBW</option><option value="bdsm">BDSM</option><option value="babe">Babe</option><option value="beach">Beach</option><option value="big-boobs">Big Boobs</option><option value="big-cocks">Big Cocks</option><option value="bisexual">Bisexual</option><option value="black-and-ebony">Black And Ebony</option><option value="blonde">Blonde</option><option value="blowjob">Blowjob</option><option value="brazilian">Brazilian</option><option value="british">British</option><option value="brunette">Brunette</option><option value="bukkake">Bukkake</option><option value="cfnm">CFNM</option></div><div class="cols"><option value="casting">Casting</option><option value="celebrity">Celebrity</option><option value="chinese">Chinese</option><option value="close-up">Close-up</option><option value="college">College</option><option value="creampie">Creampie</option><option value="cuckold">Cuckold</option><option value="cumshot">Cumshot</option><option value="czech">Czech</option><option value="doggystyle">Doggystyle</option><option value="double-penetration">Double Penetration</option><option value="erotic">Erotic</option><option value="european">European</option><option value="facial">Facial</option><option value="fat">Fat</option><option value="femdom">Femdom</option><option value="fetish">Fetish</option><option value="fingering">Fingering</option><option value="first-time">First time</option><option value="fisting">Fisting</option><option value="foot-fetish">Foot Fetish</option></div><div class="cols"><option value="french">French</option><option value="funny">Funny</option><option value="gangbang">Gangbang</option><option value="gaping">Gaping</option><option value="german">German</option><option value="glory-hole">Glory hole</option><option value="granny">Granny</option><option value="group-sex">Group Sex</option><option value="hairy">Hairy</option><option value="handjob">Handjob</option><option value="hardcore">Hardcore</option><option value="hd">Hd</option><option value="hentai">Hentai</option><option value="hidden-cams">Hidden Cams</option><option value="indian">Indian</option><option value="interracial">Interracial</option><option value="italian">Italian</option><option value="japanese">Japanese</option><option value="korean">Korean</option><option value="latex">Latex</option><option value="latin">Latin</option></div><div class="cols"><option value="lesbian">Lesbian</option><option value="lick">Lick</option><option value="lingerie">Lingerie</option><option value="massage">Massage</option><option value="masturbation">Masturbation</option><option value="mature">Mature</option><option value="milf">Milf</option><option value="nipples">Nipples</option><option value="nylon">Nylon</option><option value="old-young">Old+Young</option><option value="outdoor">Outdoor</option><option value="pov">POV</option><option value="panties">Panties</option><option value="pornstar">Pornstar</option><option value="public">Public</option><option value="reality">Reality</option><option value="redhead">Redhead</option><option value="russian">Russian</option><option value="shower">Shower</option><option value="small-cocks">Small cocks</option><option value="small-tits">Small tits</option></div><div class="cols"><option value="softcore">Softcore</option><option value="solo">Solo</option><option value="spanking">Spanking</option><option value="squirting">Squirting</option><option value="stockings">Stockings</option><option value="strapon">Strapon</option><option value="striptease">Striptease</option><option value="swingers">Swingers</option><option value="teen">Teen</option><option value="thai">Thai</option><option value="threesome">Threesome</option><option value="titjob">Titjob</option><option value="toys">Toys</option><option value="uniform">Uniform</option><option value="upskirt">Upskirt</option><option value="vintage">Vintage</option><option value="voyeur">Voyeur</option><option value="webcam">Webcam</option>
                                </select>
                                Page
                                <input class="small-text" type="text" value="1" name="page" placeholder="1" />
                                <input class="button-primary" id="vsearch_submit" type="submit" value="Search for videos" name="senden" /><img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="vsearch_loading" style="display:none;"/>
                            </form>
						</div>
					</div>
				</div>
    </div>
    <div id="results"></div>
    <?php
}

function awp_drtuber_import_videos(){
	$tube = 'drtuber';
	$tubeLink = 'http://www.drtuber.com/video/';
	$searchqry = $_POST['searchqry'];
	$searchqry = str_replace(' ','+',$searchqry);
	$page = $_POST['page'];
	$cat = $_POST['cat'];
	$url = get_bloginfo('template_directory').'/tubeaccess/drtuber.php?searchqry='.$searchqry.'&page='.$page.'&category_id='.$cat;
	$result = file_get_contents($url);
	$doc = new DOMDocument;
	@$doc->loadhtml($result);
	$xpath = new DOMXPath($doc);
	$videoArray = array();
	$pages = $xpath->query('//ul[contains(@class,"pagination")]/li');
	$length = $pages->length;
	$lastPage = $pages->item($length-2)->nodeValue;
	$currentPage = $xpath->query('//ul[contains(@class,"pagination")]/li[contains(@class,"selected")]/a')->item(0)->nodeValue;
	if($currentPage > $lastPage){
		$lastPage = $currentPage;
	}
	$entries = $xpath->query('//div[contains(@class,"thumbs")]/a[contains(@class,"th")]');
	foreach( $entries as $e ) {
		$node = $xpath->query("em[@class='time_thumb']/em", $e);
		$dur = $node->item(0)->nodeValue;
		
		$node = $xpath->query("img/attribute::alt", $e);
		$title = $node->item(0)->nodeValue;
		
		$node = $xpath->query("attribute::href", $e);
		$tempId = $node->item(0)->nodeValue;
		$start = strpos($tempId,'video/')+6;
		$end = strpos($tempId,'/', $start);
		$tempId = substr($tempId, $start, $end-$start);
		
		$node = $xpath->query("img/attribute::src", $e);
		$th = $node->item(0)->nodeValue;
		
		$foundVideo = array ( 
		  'title' => $title,
		  'tags' => '',
		  'id' => $tempId,
		  'th' => $th,
		  'dur' => $dur
      	);
    	array_push($videoArray, $foundVideo);
	}
	?>
	<div class="updated">
		<div id="videos_found">
			Showing <?php echo count($videoArray); ?>
			<?php
			if(empty($videoArray)){
				echo ' videos of 0';
			}else{
				if($lastPage == '1'){
					echo ' videos of '.count($videoArray);
				}elseif($lastPage == $currentPage && $lastPage != '1'){
					echo ' videos';
				}else{
					echo ' videos of more than '.($lastPage-1)*count($videoArray);
				}
			}
			?>.
        </div>
        <?php
        if(!empty($videoArray)){ 
		?>
        <div id="videos_pages">
        	You are on page <?php echo $currentPage; ?> of 
			<?php
			if(count($videoArray)>0){ 
				if($lastPage>8){
					echo ' more than '.$lastPage;
				}else{ 
					echo $lastPage;
				}
			}
			?>.
        </div>
        <?php } ?>
    </div>
    <?php
	displayVideosDoublicateCheck($videoArray, $tube, $tubeLink);
  	?>
	</div>
	<?php 
	die();
}

// Video add to post ajax function
add_action('wp_ajax_awp_add_videos', 'awp_process_videos');

add_action('wp_ajax_redtube_import_videos', 'awp_redtube_import_videos');
add_action('wp_ajax_youporn_import_videos', 'awp_youporn_import_videos');
add_action('wp_ajax_pornhub_import_videos', 'awp_pornhub_import_videos');
add_action('wp_ajax_tube8_import_videos', 'awp_tube8_import_videos');
add_action('wp_ajax_xvideos_import_videos', 'awp_xvideos_import_videos');
add_action('wp_ajax_xhamster_import_videos', 'awp_xhamster_import_videos');
add_action('wp_ajax_drtuber_import_videos', 'awp_drtuber_import_videos');

function displayImportHeader() {
	?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/backendstyle.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/thumbrotation.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/awp_tube_import.js"></script>
	<div class="wrap" style="width:800px;" >
    <?php
}

function displayVideosDoublicateCheck($videoArray, $tube, $tubeLink) {
	$i = 0;
	$rotation;
	switch($tube){
		case 'redtube': 
			$rotation = 'redtube';
			break;
		case 'youporn':
		case 'keezmovies':
		case 'tube8':
		case 'pornhub':
		case 'drtuber': 
			$rotation = 'youporn';
			break;
		case 'xvideos': 
			$rotation = 'xvideos';
			break;
	}
	echo '<form id="add_videos_form" action="" method="POST"><script language="javascript" type="text/javascript" src="http://eu-st.xhamster.com/js/jquery-1.9.1.o.min.js"></script>';
	foreach($videoArray as $key=>$video)
  	{
	  $thetitle= $video['title'];
	  $theid = $video['id'];
	  $theth = $video['th'];
	  $thedur = $video['dur'];
	  $theLink = $video['link'];
	  $thSprite = $video['thSprite'];
	  
	  // Test, if the video is already in the database
	  $query = new WP_Query( 'meta_key='.$tube.'&meta_value='.$theid );
	  
	  //if already in posts, dislay in red
	  if ( $query->have_posts()){ 
		  ?>
		  <div class="video_fail">
			  <a class="title" href="<?php if($tube == 'tube8' || $tube == 'xhamster'){ echo $theLink; }else{ echo $tubeLink.$theid; } ?>" target="_blank"><?php echo $thetitle; ?></a>
              <?php
			  if($tube == 'xhamster'){
				  ?>
				  <a target="_blank" class="xhlink" href="<?php echo $theLink; ?>" style="background-image: url(<?php echo $theth; ?>);"><img class='hSprite' src='http://eu-st.xhamster.com/images/spacer.gif' width='200' height='150' sprite='<?php echo $thSprite; ?>' id='<?php echo $theid; ?>' onmouseover='hRotator.start2(this);'></a>
                  <?php
			  }else{
			  ?>
			  <img onmouseover="<?php echo $rotation; ?>Rotation.start(this)" onmouseout="<?php echo $rotation; ?>Rotation.end(this)" src="<?php echo $theth; ?>" alt="thumb" />
              <?php
			  }
			  ?>
			  <span class="error">This video is already in your database!</span>
			  <br />Video ID: <?php echo $theid; ?>
			  <br />Duration: <?php echo $thedur; ?>
			  <br /><a class="button-secondary" href="<?php if($tube == 'tube8' || $tube == 'xhamster'){ echo $theLink; }else{ echo $tubeLink.$theid;} ?>" target="_blank">Watch</a>
		  </div>
		  <?php
		  unset($videoArray[$key]);
		}else{
			?>
        	<div class="video">
            	<a class="title" href="<?php if($tube == 'tube8' || $tube == 'xhamster'){ echo $theLink; }else{ echo $tubeLink.$theid; } ?>" target="_blank"><?php echo $thetitle; ?></a>
                <?php
				if($tube == 'xhamster'){
					?>
					<a target="_blank" class="xhlink" href="<?php echo $theLink; ?>" style="background-image: url(<?php echo $theth; ?>);"><img class='hSprite' src='http://eu-st.xhamster.com/images/spacer.gif' width='200' height='150' sprite='<?php echo $thSprite; ?>' id='<?php echo $theid; ?>' onmouseover='hRotator.start2(this);'></a>
					<?php
				}else{
					?>
					<img onmouseover="<?php echo $rotation; ?>Rotation.start(this)" onmouseout="<?php echo $rotation; ?>Rotation.end(this)" src="<?php echo $theth; ?>" alt="<?php echo $thetitle; ?>" />
					<?php
				}
				?>
                Video ID: <?php echo $theid; ?>
                <br />Duration: <?php echo $thedur; ?>
                <br /><a class="button-secondary" href="<?php if($tube == 'tube8' || $tube == 'xhamster'){ echo $theLink; }else{ echo $tubeLink.$theid; } ?>" target="_blank">Watch</a><br />
                <input value="<?php echo $i; ?>" name="deleteVideoArray[]" type="checkbox" checked="checked"> import this video
            </div>
        	<?php
			$i++;
		}
	}
	$_SESSION['data'] = $videoArray;
	$_SESSION['tube'] = $tube;	
	if(count($videoArray)>0){ 
			displayAdVideoForm();
	}
}

// Display add-videos-form to submit videos
function displayAdVideoForm() {
	?>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/awp_add_videos.js"></script>
    <div class="add_videos_box">
        		<input type="hidden" value="awp_add_videos" name="action" />
            	Add to following tube category:
            	<select name="my_category">
                        	<option value="1">uncategorized</option>
                            <?php $categories = get_categories( array('hide_empty' => 0, 'orderby' => 'name', 'type' => 'post', 'exclude' => '1') );
							foreach($categories as $category){
								echo '<option value="'.$category->term_id.'">'.$category->cat_name.'</option>';
							}
                            ?> 
                 </select>
                 Posts status:
                 <select name="post_status">
                        	<option value="draft">drafts</option>
                            <option value="publish">published</option>
                 </select>
				<input type="submit" name="add_videos_submit" id="add_videos_submit" class="button-primary" value="Add videos to posts"/>
                
				<img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="add_videos_loading" style="display:none;"/>
		</form>
	</div>
	<div id="add_videos_results"></div>
    <p><a class="alignright button" href="javascript:void(0);" onclick="window.scrollTo(0,0);" style="margin:3px 0 0 30px;">scroll to top</a></p>
    <?php
}
function header_check(){
	if(awpTheme()){
	//echo base64_decode( 'PGgyPlBsZWFzZSBhY3RpdmF0ZSB5b3VyIGxpY2Vuc2UuPC9oMj48cD5UbyBkbyB0aGF0IGp1c3QgZ28gdG8gdGhlIGFkbWluIG1lbnUgIkFXUCBTZXR0aW5ncyIgYW5kIGNsaWNrIG9uICJMaWNlbnNlIi48YnI+VGhhbmsgeW91IGZvciB1c2luZyB0aGUgQWR1bHQgV29yZHByZXNzIFRoZW1lITwvcD4=' );
//	exit;
}
}
function awp_process_videos(){
	$tube = $_SESSION['tube'];
	$videoArray = $_SESSION['data'];
	$deleteVideoArray = $_POST['deleteVideoArray'];
	$addTheseVideosArray = array();
	$my_category = $_POST['my_category'];
	$post_status = $_POST['post_status'];
	$addToTitle = ' '.get_option('addtotitle');
	// Create new array with only the videos in in the delete list
	foreach($deleteVideoArray as $videoIndex){
		array_push($addTheseVideosArray, $videoArray[$videoIndex]);
	}
	$rewriteTitle = get_option('rewriteTitle');
	foreach($addTheseVideosArray as $video)
  		{	
			$videoTitle = $video['title'];
			if($rewriteTitle == TRUE){
				$myWords=array(array('fucks','bangs','nails'),array('blows','sucks'),array('sucking','blowing'),array('fucking','banging','humping','poking','screwing'),array('nailing','penetrating','banging'),array('fucking','riding'),array('fucked','banged','nailed','penetrated'),array('guy','man','dude'),array('bitch','slut','girl','teen','woman'),array('dick','cock','penis'),array('ass','butt','booty'),array('sperm','cum','jizz'),array('bbc','big black cock','huge black cock'),array('pussy','vagina','cunt','muffin','twat'),array('anal','backdoor'),array('passion','love','need','addiction'),array('cute','sweet','sexy','kinky'),array('hot','sexy'),array('huge','big','massive','monster'),array('fat','big'),array('busty','big titted','sexy'),);
				$videoTitle = rewrite($videoTitle, $myWords);
			}
		  	$my_post = array(
		 	'post_title' => $videoTitle.$addToTitle,
		 	'post_content' => $video['tags'],
		 	'post_status' => $post_status,
		 	'post_author' => 1,
		 	'post_category' => array($my_category)
		  	);
		  	$the_post_id = wp_insert_post( $my_post );
			update_post_meta( $the_post_id, 'tube', $tube );
		  	update_post_meta( $the_post_id, $tube, $video['id'] );
		  	update_post_meta( $the_post_id, 'th', $video['th'] );
			update_post_meta( $the_post_id, 'duration', $video['dur'] );
			update_post_meta( $the_post_id, 'link', $video['link'] );
			update_post_meta( $the_post_id, 'thSprite', $video['thSprite'] );
			update_post_meta( $the_post_id, 'post_views_count', '0' );
			update_post_meta( $the_post_id, 'votes_count', '0' );
		}
		?>
	<div class="success"><?php echo count($addTheseVideosArray); ?> videos added to your database in category "<?php echo get_the_category_by_ID( $my_category ); ?>"</div>
    <?php
	die();
}

function getRotation($tube){
	switch($tube){
			case 'redtube': 
				$rotation = 'redtube';
				break;
			case 'youporn':
			case 'keezmovies':
			case 'tube8':
			case 'pornhub':
			case 'drtuber': 
				$rotation = 'youporn';
				break;
			case 'xvideos': 
				$rotation = 'xvideos';
				break;
		}
		return $rotation;
}

function getEmbedVideo($postId){
	$tube = get_post_meta($postId, 'tube', true);
	$theId = get_post_meta($postId, $tube, true);
	$theLink = get_post_meta($postId, 'link', true);
	switch($tube){
			case 'redtube':
				?>
                <iframe src="http://embed.redtube.com/?id=<?php echo $theId; ?>&bgcolor=000000" frameborder="0" height="100%" width="100%" scrolling="no"></iframe>
				<?php
            break;
			case 'youporn':
				?>
				<iframe src="http://www.youporn.com/embed/<?php echo $theId; ?>/" frameborder=0 height="100%" width="100%" scrolling=no name="yp_embed_video"></iframe>
                <?php
			break;
			case 'tube8':
				$theLink = str_replace('tube8.com/', 'tube8.com/embed/', $theLink );
				?>
                <iframe src="<?php echo $theLink; ?>" frameborder=0 height="100%" width="100%" scrolling=no name="t8_embed_video"></iframe>
				<?php
			break;
			case 'pornhub':
				?>
                <iframe src="http://www.pornhub.com/embed/<?php echo $theId; ?>" frameborder="0" height="100%" width="100%" scrolling="no"></iframe>
				<?php
			break;
			case 'xvideos':
				?>
                <iframe src="http://flashservice.xvideos.com/embedframe/<?php echo $theId; ?>" frameborder=0 height="100%" width="100%" scrolling=no></iframe>
				<?php 
			break;
			case 'xhamster': 
				?>
                <iframe id="xhamstervideo" src="http://xhamster.com/xembed.php?video=<?php echo $theId; ?>" frameborder="0" height="100%" width="100%" scrolling="no"></iframe>
				<?php
			break;
			case 'drtuber':
				?>
                <iframe src="http://www.drtuber.com/embed/<?php echo $theId; ?>" height="100%" width="100%" frameborder="0" scrolling="no"></iframe>
				<?php 
			break;
		}
}

add_action( 'after_setup_theme', 'awp_theme_setup' );

function awp_theme_setup() {
	$tempNum = get_option('numberOfVideosPerPage');
	update_option( 'posts_per_page', $tempNum );
}

add_action( 'widgets_init', 'awp_register_sidebars' );

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
function awp_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'awp_page_menu_args' );

function awp_register_sidebars() {
	register_sidebar( array(
		'id' => 'footersidebar',
		'name' => __( 'Footer Sidebar', 'awp_basic' ),
		'description' => __( 'The following widgets will appear in the footer. Drag a custom menu here, text or category widget. We recommend not to use more than 4 widgets.', 'awp_basic' ),
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) );
	register_sidebar( array(
		'id' => 'horizontal',
		'name' => __( 'Horizontal navigation', 'awp_basic' ),
		'description' => __( 'The following widgets will appear in the top navigation. Drag a custom menu here, the categories widget or the search widget.', 'awp_basic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) );
}

function awp_init_method() {
	wp_enqueue_script( 'thumbrotation', get_template_directory_uri() . '/js/thumbrotation.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery-1.9.1.o.min', get_template_directory_uri() . '/js/jquery-1.9.1.o.min.js', array(), '1.9.1', false );
	wp_enqueue_script('main_js', get_template_directory_uri().'/js/main.js', array(), '1.0', true );
	wp_localize_script('main_js', 'ajax_var', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('ajax-nonce')
	));
}
add_action( 'wp_enqueue_scripts', 'awp_init_method' );

// remove junk from head
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
function awpTheme(){if(initImport()!= 'valid'){return TRUE;}else{return FALSE;}}
function pagination($pages = '', $range = 3)
{
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         { $pages = 1; }
     }   
 
     if(1 != $pages)
     {
         echo '<div id="pagination"><div id="pagination2"><nav class="pagination"><ul>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a class='start' href='".get_pagenum_link(1)."'></a></li>";
         //if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class=\"current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive \">".$i."</a></li>";
             }
         }
 
         //if ($paged < $pages && $showitems < $pages) echo "<li><a class='start' href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a class='end' href='".get_pagenum_link($pages)."'></a></li>";
         echo '</ul></nav></div></div>';
     }
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Like functions
add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
     
    if(isset($_POST['post_like']))
    {
        $post_id = $_POST['post_id'];
         
        $meta_count = get_post_meta($post_id, "votes_count", true);
		if($meta_count == ''){
			$meta_count = 0;
		}
 		$meta_count++;
        update_post_meta($post_id, "votes_count", $meta_count);
             
        echo $meta_count;
    }
    exit;
}
function getPostCounter($postId) {
	$count = get_post_meta($postId, 'votes_count', true);
	if($count == ''){
		$count = 0;
		return $count;
	}
	return $count;
}

function getThumb($postId)
{
	$tube = get_post_meta($postId, 'tube', true); 
	$rotation = getRotation($tube);
	if($tube == 'xhamster'){
		?>
		<a title="<?php the_title(); ?>" class="xhlink thlink" href="<?php the_permalink() ?>" style="background-image: url(<?php echo get_post_meta($postId, 'th', true); ?>);"><img class='hSprite thumb_small' src='http://eu-st.xhamster.com/images/spacer.gif' width='200' height='150' sprite='<?php echo get_post_meta($postId, 'thSprite', true); ?>' id='<?php echo $theid; ?>' onmouseover='hRotator.start2(this);'>
		</a>
		<?php
	}elseif($tube == ''){
		echo '<div class="nothumb">No thumbnail available</div>';
	}else{
		?>
		<a title="<?php the_title(); ?>" class="thlink" href="<?php the_permalink() ?>">
		<img class="thumb_small" src="<?php echo get_post_meta($postId, 'th', true); ?>" alt="<?php the_title(); ?>" onmouseover="<?php echo $rotation; ?>Rotation.start(this)" onmouseout="<?php echo $rotation; ?>Rotation.end(this)" />
		</a>
		<?php
	}
}

function getRelatedCategories($postId, $relatedPostNumber){
	  $category = get_the_category($postId);
	  if($category[0]->category_count < $relatedPostNumber){
		  $tubeCategories = get_categories();
		  $postCounter = $category[0]->category_count;
		  $i = 0;
		  while($postCounter < $relatedPostNumber && $i < count($tubeCategories)-1){
			  $randIndex = rand(0, count($tubeCategories)-1);
			  if($category[0]->term_id != $tubeCategories[$randIndex]){
				  $altCats = $altCats.','.$tubeCategories[$randIndex]->term_id;
			  }
			  $postCounter = $postCounter + $tubeCategories[$randIndex]->category_count;
			  $i++;
		  }
		  $cats = $category[0]->term_id.$altCats;
	  }else{
		  $cats = $category[0]->term_id;
	  }
	  return $cats;
}
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}
// Add Plugrush RSS Feed
add_action('init', 'plugrushRSS');
function plugrushRSS(){
        add_feed('plugrushrss', 'plugrushRssFunction');
}
function plugrushRssFunction(){
	get_template_part('plugrushrss');
}
// rewrite func
function rewrite( $text, $theWords )
{
	if( is_string($text) && strlen($text) > 0 )
	{
		$text = strtolower($text);
		$wordArray = explode( ' ', $text);
		$i = 0;
		foreach($wordArray as $word)
		{
			$arrayPosition = inWhichArray($word, $theWords);
			if( $arrayPosition !== false)
			{
				$wordArray[$i] = getRandomElement($theWords[$arrayPosition]);
			}
			$i++;
		}
		return implode(' ', $wordArray);
	}
}

function inWhichArray($needle, $haystack)
{
	$firstKey = 0;
	foreach( $haystack as $subHaystack)
	{
		if(in_array($needle, $subHaystack)){
			return $firstKey;
		}
		$firstKey++;
	}
	return false;
}

function getRandomElement($wordList)
{
	$length = count($wordList);
	$random = rand(0, $length-1);
	return $wordList[$random];
}
function rta(){
	$rta = get_option( 'rtaLabel' );
	if($rta == 1){
		echo '<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />';
	}
}
?>