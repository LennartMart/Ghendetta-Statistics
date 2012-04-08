<?php 
include 'main.php';

	$url_stats = 'http://ghendetta.be/api/stats.json';
	$content_stats= @file_get_contents($url_stats);
	$json_stats = json_decode($content_stats,true);
	$size_stats = sizeof($json_stats);
	

	echo "<h1>".$json_stats["users"]." users, better known as clan members.</h1>";
	echo "<h1>".$json_stats["battles"]." check-ins, better known as battles.</h1>";
	echo "<p><i>Due to technical reasons, Ghendetta has closed his request API.<br/>You can find the chart of the first days <a href=\"site_stats.php\">here</a></i></p>";
	
	echo "</body></html>";
	
?>