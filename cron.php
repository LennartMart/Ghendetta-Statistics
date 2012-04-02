<?php

	$i = 0;
	$url_clans = 'http://www.ghendetta.be/api/clans.json';
	$content_clans = file_get_contents($url_clans);
	while($content_clans == false && $i<20){
		sleep(5);
		$i +=1;
		$content_clans = file_get_contents($url_clans);
	}
	
	
	$url_regions = 'http://www.ghendetta.be/api/regions.json';	
	$content_regions = file_get_contents($url_regions);
	while($content_regions == false && $i<20){
		sleep(5);
		$i +=1;
		$content_regions = file_get_contents($url_regions);
	}	
	
	$url_requests = 'http://www.ghendetta.be/api/requests.json';
	$content_requests = file_get_contents($url_requests);
	while($content_requests == false && $i<20){
		sleep(5);
		$i +=1;
		$content_requests = file_get_contents($url_requests);
	}	

	
	$url_all = 'http://ghendetta.be/api/requests/all.json';
	$content_all = file_get_contents($url_all);
	while($content_all == false && $i<20){
		sleep(5);
		$i +=1;
		$content_all = file_get_contents($url_all);
	}	

	$url_stats = 'http://www.ghendetta.be/api/stats.json';
	$content_stats = file_get_contents($url_stats);
	while($content_stats == false && $i<20){
		sleep(5);
		$i +=1;
		$content_stats = file_get_contents($url_stats);
	}	
	
	
	
	if ($i < 20){
		file_put_contents("cache/clans.json",$content_clans);
		file_put_contents("cache/regions.json",$content_regions);
		file_put_contents("cache/requests.json",$content_requests);
		file_put_contents("cache/all.json",$content_all);
		file_put_contents("cache/stats.json",$content_stats);
		echo "Job done...";
	}
	else {
		echo "Error";
	}

?>