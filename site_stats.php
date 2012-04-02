<?php 
include 'main.php';

	$url_requests = 'cache/requests.json';
	$content_requests = @file_get_contents($url_requests);
	$json_requests = json_decode($content_requests,true);
	$size_requests= sizeof($json_requests);
	
	$url_all = 'cache/all.json';
	$content_all = @file_get_contents($url_all);
	$json_all = json_decode($content_all,true);
	$size_all= sizeof($json_all);
	
	$url_stats = 'cache/stats.json';
	$content_stats = @file_get_contents($url_stats);
	$json_stats = json_decode($content_stats,true);
	
	if ( $content_requests == false || $content_all == false || $content_stats == false){
			echo "<h1>Loading data failed. Try again please.</h1>";
	}
	else {
		echo "<h1>".$json_stats['users']." users have fought ".$json_stats['battles']." battles and made ".$json_stats['requests']." requests in ".$size_all." days</h1>";
		#Request - Container
			echo "<script>var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container-requests',
						type: 'line',
						marginRight: 130,
						marginBottom: 25,
						backgroundColor: \"#eeeff3\",
					},
					title: {
						text: 'Requests / Day',
						x: -20 //center
					},
					subtitle: {
						text: 'Source: Ghendetta.be',
						x: -20
					},
					xAxis: {
						categories:[";for ( $i=$size_requests -1 ; $i>=0 ; $i-- ){
									echo "'".$json_requests[$i]['date']."',";
									}
					echo "]
					},
					yAxis: {
						min : 0,
						title: {
							text: 'Requests'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
						
					},
					tooltip: {
						formatter: function() {
								return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': '+ this.y ;
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -10,
						y: 100,
						borderWidth: 0
					},
					series: [{
						name: 'Web requests',
						data: [";
						for ( $i=$size_requests -1 ; $i>=0 ; $i-- ){
									echo $json_requests[$i]['requests'].",";							
									}
					
					echo" ]},
						 {name: 'All requests (web + API)',
						 data: [";
					for ( $i=$size_all -1 ; $i>=0 ; $i-- ){
						echo $json_all[$i]['requests'].",";
					}
						
					echo" ]}
					]
				});
			});
			</script>";


			echo "<div id='container-requests' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
	}
	echo "</body></html>";
	
	
	
?>

