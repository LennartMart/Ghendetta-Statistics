<?php 
include 'main.php';
	$url_regions = 'cache/regions.json';
	$content_regions = @file_get_contents($url_regions);
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
		$json_regions = json_decode($content_regions,true);
		$json_regio = json_decode($content_regio,true);
		
		echo "<script>
				$(function () {
			var chart;

			$(document).ready(function() {

				chart = new Highcharts.Chart({

					chart: {

						renderTo: 'container-battles',

						type: 'column',

						margin: [ 50, 50, 100, 80],
						
						backgroundColor: \"#eeeff3\",

					},
					title: {

						text: 'Battles of each Clan'

					},

					xAxis: {

						categories: [";
							for($j=0;$j<sizeof($json_regio);$j++) {
								echo "'".$json_regio[$j]['name']."',";
							}


						echo"],

						labels: {

							rotation: -45,

							align: 'right',

							style: {

								fontSize: '13px',

								fontFamily: 'Verdana, sans-serif'

							}

						}

					},

					yAxis: {

						min: 0,

						title: {

							text: 'Battles'

						}

					},

					legend: {

						enabled: false

					},

					tooltip: {

						formatter: function() {

							return '<b>'+ this.x +'</b><br/>'+

								'Battles: '+ this.y;

						}

					},

						series: [{

						name: 'Battles',

						data:[ 
						";
							for( $j=0;$j<sizeof($json_regio);$j++) {
								echo "{ y:".$json_regio[$j]['battles'].", color:'#".$json_regio[$j]["color"]."'},";
							}

							echo "
						],

						dataLabels: {

							enabled: true,

							rotation: -90,

							color: '#FFFFFF',

							align: 'right',

							x: -3,

							y: 10,

							formatter: function() {

								return this.y;

							},

							style: {

								fontSize: '13px',

								fontFamily: 'Verdana, sans-serif'

							}

						}

					}]

				});

			});

			
		});
		</script>";
		//Getting name of region
		$i=0;
		$found = false;
		$region_name;
		while($i<sizeof($json_regions) && $found == false){
			if($json_regions[$i]["regionid"] == $region_id){
				$region_name = $json_regions[$i]["name"];
				$found = true;
			}
			$i +=1;
		}
		echo '<h1>The clan that rules '.$region_name.' is the '.$json_regio[0]["name"].' !</h1>';
		echo '<p>
			  <ol class=\'leaders\'>';
		for($j=0;$j<sizeof($json_regio);$j++){
			echo "<li><IMG src=\"".$json_regio[$j]["shield"]."\" alt=\"logo\"/>: ".$json_regio[$j]["points"]." points </li>";
		}
		echo "</ol></p>";
		echo "<div id='container-battles' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
	}
	echo "</body></html>";
	
	
		
?>