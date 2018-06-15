jQuery(document).ready(function() {
	
	$('aside.widget_categories h4').click(function(e){
		e.preventDefault();
		$('aside.widget_categories').toggleClass('hover');
	});
	
	$('#mobile-nav').click(function(e){
		e.preventDefault();
		$('nav#top-nav').toggleClass('hide-nav');
		$('#mobile-nav').toggleClass('mobile-nav-close');
	});
	
	$('div#videoOverAd a.close').click(function(e){
		e.preventDefault();
		$('div#videoOverAd').hide();
	});
	
    jQuery('a.heartLink').click(function(e){
		e.preventDefault();
		heart = jQuery(this);
		if(heart.hasClass('liked') == false){	
			post_id = heart.data('post_id');
			jQuery.ajax({
				type: 'post',
				url: ajax_var.url,
				data: 'action=post-like&nonce='+ajax_var.nonce+'&post_like=&post_id='+post_id,
				success: function(count){
					heart.text(count+' likes');
				},
			});
			heart.addClass('liked');
		}	
        return false;
    })
	$('#showCommentsLink').click(function(e){
		e.preventDefault();
		status;
		$('#comments').toggle('fast');
		if(status == '1'){
			$('#showCommentsLink').text('Add comment'); status = '0';
		}else{
			$('#showCommentsLink').text('Close comments'); status = '1';
		}
	})
	
})


