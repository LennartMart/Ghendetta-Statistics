<?php

	$url_clans = 'http://www.ghendetta.be/api/clans.json';
	$content_clans = file_get_contents($url_clans);
	$json_clans = json_decode($content_clans,true);
	$size_clans = sizeof($json_clans);
	
	$url_requests = 'http://www.ghendetta.be/api/requests.json';
	$content_requests = file_get_contents($url_requests);
	$json_requests = json_decode($content_requests,true);
	$size_requests= sizeof($json_requests);
	
	$url_all = 'http://ghendetta.be/api/requests/all.json';
	$content_all = file_get_contents($url_all);
	$json_all = json_decode($content_all,true);
	$size_all= sizeof($json_all);
	
	
	echo "<html><head><title>Ghendetta - Statistics</title><script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'></script>
	<script type ='text/javascript' src='/static/highcharts.js'></script>
	<script type ='text/javascript'src='/static/exporting.js'></script></head><body>";
	
#Request - Container
	echo "<script>var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'container-requests',
				type: 'line',
				marginRight: 130,
				marginBottom: 25
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


	echo "<script>$(function () {
    var chart;

    $(document).ready(function() {

        chart = new Highcharts.Chart({

            chart: {

                renderTo: 'container-clans',

                plotBackgroundColor: null,

                plotBorderWidth: null,

                plotShadow: false

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

    
});
	</script>";

					

	echo "<script>
		$(function () {
    var chart;

    $(document).ready(function() {

        chart = new Highcharts.Chart({

            chart: {

                renderTo: 'container-points',

                type: 'column',

                margin: [ 50, 50, 100, 80]

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

                        'Points: '+ Highcharts.numberFormat(this.y, 1);

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

	echo "<div id='container-requests' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
	echo "<div id='container-clans' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
	echo "<div id='container-points' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
	echo "</body></html>";
	
	
	
?>
