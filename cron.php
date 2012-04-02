<?php
	$i = 0;
	function check_content($url)
	{
		global $i;
		$content = file_get_contents($url);
		while($content == false && $i<20){
			sleep(5);
			$i +=1;
			$content = file_get_contents($url);
		}
		return $content;
	
	}

	$url_clans = 'http://www.ghendetta.be/api/clans.json';
	$content_clans = check_content($url_clans);	
	
	$url_regions = 'http://www.ghendetta.be/api/regions.json';	
	$content_regions = check_content($url_regions);

	$url_stats = 'http://www.ghendetta.be/api/stats.json';
	$content_stats = check_content($url_stats);
	
	
	if ($i < 20){
		file_put_contents("cache/clans.json",$content_clans);
		file_put_contents("cache/regions.json",$content_regions);
		file_put_contents("cache/stats.json",$content_stats);
		echo "Job done...";
	}
	else {
		echo "Error";
	}

?>