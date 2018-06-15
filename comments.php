<?php
	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
		die ( 'Please do not load this page directly. Thanks.' );

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

	<h3 id="comments"><?php comments_number( 'No momments', 'One comment', '% Comments' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ul id="commentlist">
		<?php wp_list_comments( 'avatar_size=0&reply_text=' ); ?>
	</ul>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'awp_basic' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( __( '&laquo; &Auml; Kommentare', 'blm_basic' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Neuere Kommentare &raquo;', 'blm_basic' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<?php 
	$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Send',
        // change the title of the reply section
        'title_reply'=>'Write a Reply or Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
		'comment_notes_before' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<textarea id="commentTextarea" name="comment" aria-required="true"></textarea>',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' =>
			  ( $req ? '' : '' ) .
			  '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			  '" size="30"' . $aria_req . ' />',
		
			'email' =>
			  ( $req ? '' : '' ) .
			  '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			  '" size="30"' . $aria_req . ' />',
		
			'url' => ''
			)
		  ),
	);
	comment_form($comments_args); 
?>

<?php endif; // if you delete this the sky will fall on your head ?>