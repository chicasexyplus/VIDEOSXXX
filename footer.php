    <footer>
    	<div id="footerInside">
        	<?php 
			$adFooter1 = get_option('adFooter1');
			$adFooter2 = get_option('adFooter2');
			$adFooter3 = get_option('adFooter3');
			if(!empty($adFooter1) || !empty($adFooter2) || !empty($adFooter3)){
				echo '<div id="footerAds">';
				if(!empty($adFooter1)){
					echo '<div class="ad300">'.$adFooter1.'</div>';
				}
				if(!empty($adFooter2)){
					echo '<div class="ad300">'.$adFooter2.'</div>';
				}
				if(!empty($adFooter3)){
					echo '<div class="ad300">'.$adFooter3.'</div>';
				}
				echo '</div>';
			}
			?>
            <div id="footerSidebar">
            	<?php get_sidebar('footersidebar'); ?>
            </div>
            
        </div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>