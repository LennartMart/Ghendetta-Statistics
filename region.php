<?php 
include 'main.php';
	
	$region_id = (int)$_GET["id"];
	if(is_int($region_id) == false){
		echo "<h1>Wrong ID</h1>";
	}
	else if ($region_id <1 || $region_id >20){
		echo "<h1>Wrong ID</h1>";

	}
	else{
		$url_regio = "cache/regio/".$region_id.".json";
		$content_regio = @file_get_contents($url_regio);	
		$json_regio = json_decode($content_regio,true);
		$url_clans = 'cache/clans.json';
		$content_clans = @file_get_contents($url_clans);
		$json_clans = json_decode($content_clans,true);
		//sorting the clans on posession
		$sorted_clans = array();
		for ($j=0;$j<sizeof($json_regio["clans"]);$j++){
			$sorted_clans[$j+1] = $json_regio["clans"][$j+1]["possession"];
		
		}
		arsort($sorted_clans);
		echo "<script>$(function () {
			var chart;

			$(document).ready(function() {

				chart = new Highcharts.Chart({

					chart: {

						renderTo: 'container-clans',

						plotBackgroundColor: null,

						plotBorderWidth: null,

						plotShadow: false,
						
						backgroundColor: \"#eeeff3\",

					},
					colors: [";foreach ($sorted_clans as $key => $value){
								echo "'#".$json_regio["clans"][$key]['color'];
								echo "',";
							} echo "],

					title: {

						text: 'Strength of each clan'

					},

					tooltip: {

						formatter: function() {

							return '<b>'+ this.point.name +'</b>: '+ this.y + '%';

						}

					},

					plotOptions: {

						pie: {

							allowPointSelect: true,

							cursor: 'pointer',

							dataLabels: {

								enabled: false

							},

							showInLegend: true

						}

					},

					series: [{

						type: 'pie',

						name: 'Browser share',

						data: [
							{

								name: '";
								reset($sorted_clans);
								$first_id = key($sorted_clans);
								echo $json_regio["clans"][$first_id]['name']; echo"',

								y:"; echo $json_regio["clans"][$first_id]["possession"]; echo",

								sliced: true,

								selected: true

							},
							";
							$skip_first = 0;
							foreach ($sorted_clans as $key => $value){
								if($skip_first != 0){
									echo "['".$json_regio["clans"][$key]['name']."',".$json_regio["clans"][$key]["possession"];
									echo "],";
								}
								$skip_first +=1;
							}
							echo "



						]

					}]

				});

			});

			
		})	</script>";
		
		reset($sorted_clans);
		echo '<h1>The clan that rules '.$json_regio["name"].' is the '.$json_clans[$json_regio["leader"]-1]["name"].' !</h1>';
		echo "<div id='container-clans' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
		echo '<p>
			  <ol class=\'leaders\'>';
		foreach ($sorted_clans as $key => $value){
			echo "<li><IMG src=\"".$json_regio["clans"][$key]["shield"]."\" alt=\"shield\"/>: ".$value." % </li>";
		}
		echo "</ol></p>";
		
		
	}
	echo "</body></html>";
	
	
		
?>