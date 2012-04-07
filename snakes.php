<?php 
include 'main.php';
	$team = "Snakes";
	$url_clans = 'cache/clans.json';
	$content_clans = @file_get_contents($url_clans);
	$json_clans = json_decode($content_clans,true);
	$size_clans = sizeof($json_clans);

	$url_regions = 'cache/regions.json';
	$content_regions = @file_get_contents($url_regions);
	$json_regions = json_decode($content_regions,true);
	$size_regions = 20;
	$array_regions;
	if ( $content_regions == false || $content_clans == false ){
			echo "<h1>Loading data failed. Try again please.</h1>";
	}
	else {
		for($i=0; $i<$size_regions;$i++){			
			if ($json_regions[$i]["leader"]["name"] == $team){
				$array_regions[]= $json_regions[$i]["name"];
			}
		}
		echo "<h1>".$json_clans[3]["members"]." people are recruited by the ".$team." <IMG src=\"".$json_clans[3]["shield"]."\" alt=\"logo\"/></h1>";
		echo "<h2>They fought ".$json_clans[3]["battles"]." fights bravely and conquered: </h2>";
		echo "<ul class=\"regions\">";
			for($i=0; $i<sizeof($array_regions);$i++){			
					echo "<li>".$array_regions[$i]."</li>";
			}
		echo "</ul>";
	}



	echo "</body></html>";
	
	