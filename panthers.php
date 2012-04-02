<?php 
include 'main.php';
	$team = "Panthers";
	$url_clans = 'http://www.ghendetta.be/api/clans.json';
	$content_clans = file_get_contents($url_clans);
	$json_clans = json_decode($content_clans,true);
	$size_clans = sizeof($json_clans);

	$url_regions = 'http://www.ghendetta.be/api/regions.json';
	$content_regions = file_get_contents($url_regions);
	$json_regions = json_decode($content_regions,true);
	$size_regions = 20;
	$array_regions;
	
	for($i=0; $i<$size_regions;$i++){			
		if ($json_regions[$i]["leader"]["name"] == $team){
			$array_regions[]= $json_regions[$i]["name"];
		}
	}


echo "<h1>".$json_clans[2]["members"]." people are recruited by the ".$team." <IMG src=\"".$json_clans[2]["logo"]."\" alt=\"logo\"/></h1>";
echo "<h2>Regios that the ".$team." control: </h2>";

echo "<ul class=\"regions\">";
	for($i=0; $i<sizeof($array_regions);$i++){			
			echo "<li>".$array_regions[$i]."</li>";
	}
echo "</ul>";



	echo "</body></html>";
	
	