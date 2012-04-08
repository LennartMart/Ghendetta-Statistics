<?php 
include 'main.php';

	$url_clans = 'http://ghendetta.be/api/clans.json';
	$content_clans = @file_get_contents($url_clans);
	$json_clans = json_decode($content_clans,true);
	$size_clans = sizeof($json_clans);
	
	if ( $content_clans == false ){
			echo "<h1>Loading data failed. Try again please.</h1>";
	}
	else{
		echo "<h1>Current clans are: ";
		for ($i =0; $i <$size_clans-1; $i++){
								echo $json_clans[$i]['name']; 
								echo ",";
							}
		echo $json_clans[$size_clans-1]['name']."</h1>";
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
					colors: [";for ($i =0; $i <$size_clans; $i++){
								echo "'#".$json_clans[$i]['color'];
								echo "',";
							} echo "],

					title: {

						text: 'Members of each Clan'

					},

					tooltip: {

						formatter: function() {

							return '<b>'+ this.point.name +'</b>: '+ this.y;

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

								name: '";echo $json_clans[0]['name']; echo"',

								y:"; echo $json_clans[0]['members']; echo",

								sliced: true,

								selected: true

							},
							";
							for ($i =1; $i <$size_clans; $i++){
								echo "['".$json_clans[$i]['name']."',".$json_clans[$i]['members'];
								echo "],";
							}
							echo "



						]

					}]

				});

			});

			
		})	</script>";
echo "<script>$(function () {
			var chart;

			$(document).ready(function() {

				chart = new Highcharts.Chart({

					chart: {

						renderTo: 'container-battles',

						plotBackgroundColor: null,

						plotBorderWidth: null,

						plotShadow: false,
						
						backgroundColor: \"#eeeff3\",

					},
					colors: [";for ($i =0; $i <$size_clans; $i++){
								echo "'#".$json_clans[$i]['color'];
								echo "',";
							} echo "],

					title: {

						text: 'Battles / Clan'

					},

					tooltip: {

						formatter: function() {

							return '<b>'+ this.point.name +'</b>: '+ this.y + ' battles';

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

								name: '";echo $json_clans[0]['name']; echo"',

								y:"; echo $json_clans[0]['battles']; echo",

								sliced: true,

								selected: true

							},
							";
							for ($i =1; $i <$size_clans; $i++){
								echo "['".$json_clans[$i]['name']."',".$json_clans[$i]['battles'];
								echo "],";
							}
							echo "



						]

					}]

				});

			});

			
		})	</script>";
			echo "<script>
				$(function () {
			var chart;

			$(document).ready(function() {

				chart = new Highcharts.Chart({

					chart: {

						renderTo: 'container-points',

						type: 'column',

						margin: [ 50, 50, 100, 80],
						
						backgroundColor: \"#eeeff3\",

					},
					title: {

						text: 'Points per clan'

					},

					xAxis: {

						categories: [";

							for ($i =0; $i <$size_clans; $i++){
								echo "'".$json_clans[$i]['name']."',";
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

							text: 'Points'

						}

					},

					legend: {

						enabled: false

					},

					tooltip: {

						formatter: function() {

							return '<b>'+ this.x +'</b><br/>'+

								'Points: '+this.y;

						}

					},

						series: [{

						name: 'Points',

						data:[ 
						";

							for ($i =0; $i <$size_clans; $i++){
								echo "{ y:".$json_clans[$i]['points'].","."color:'#".$json_clans[$i]['color']."'},";
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

			echo "<div id='container-clans' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
			echo "<div id='container-battles' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
			echo "<h1>Points : strength of each clan</h1>";
			echo "<div id='container-points' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
	}
	echo "</body></html>";
	
	
	
?>