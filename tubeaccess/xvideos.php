<?php
	$searchqry = $_GET['searchqry'];
	$thePage = $_GET['page'];
	if(empty($thePage)){
			 $thePage=1;
			 }
	$thePage = $thePage-1;
	$cat = $_GET['category_id'];
	$curl_connection = curl_init();
	if(empty($searchqry) && empty($cat)){
		$url = "http://www.xvideos.com/new/".$thePage."/";
	}elseif(empty($searchqry) && !empty($cat)){
		$url = "http://www.xvideos.com/c/".$thePage."/".$cat;
	}else{
		$url = "http://www.xvideos.com/?k=".$searchqry."&p=".$thePage;
	}
	curl_setopt($curl_connection, CURLOPT_URL, $url);
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 90);
	curl_setopt($curl_connection, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt ($curl_connection, CURLOPT_COOKIEFILE, 'cookies.txt');
	curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl_connection, CURLOPT_HEADER, true);
	curl_setopt($curl_connection, CURLOPT_REFERER, "http://xvideos.com/");
	$result = curl_exec($curl_connection);
	echo $result;
?>
