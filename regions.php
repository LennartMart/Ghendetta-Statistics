<?php 
include 'main.php';
	$url_clans = 'cache/clans.json';
	$content_clans = @file_get_contents($url_clans);
	$url_regions = 'cache/regions.json';
	$content_regions = @file_get_contents($url_regions);
	
	if($content_clans == false  || $content_regions == false) { 
		echo "<h1>Loading data failed. Try again please.</h1>";
	}
	else {
	$json_clans = json_decode($content_clans,true);
	$size_clans = sizeof($json_clans);


	$json_regions = json_decode($content_regions,true);
	$size_regions = 20;
	$array_clans;
	$array_colors;
	for($i=0; $i<$size_regions;$i++){			
			$array_clans[$json_regions[$i]["leader"]["name"]] +=1;
	}
	foreach ( $json_clans as $clan){
			$array_colors[$clan["name"]] = $clan["color"];
	}
	

	echo "<script>
		$(function () {
    var chart;

    $(document).ready(function() {

        chart = new Highcharts.Chart({

            chart: {

                renderTo: 'container-regions',

                type: 'column',

                margin: [ 50, 50, 100, 80],
				
				backgroundColor: \"#eeeff3\",

            },
            title: {

                text: 'Regions / clan'

            },

            xAxis: {

                categories: [";
					foreach ( $array_clans as $key => $value ) {
						echo "'".$key."',";
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

                    text: 'Regions'

                }

            },

            legend: {

                enabled: false

            },

            tooltip: {

                formatter: function() {

                    return '<b>'+ this.x +'</b><br/>'+

                        'Regions: '+ this.y;

                }

            },

                series: [{

                name: 'Points',

                data:[ 
				";
					foreach ( $array_clans as $key => $value ) {
						echo "{ y:".$value.", color:'#".$array_colors[$key]."'},";
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
echo "<script>
	function doNav(theUrl)
	{
		document.location.href = theUrl;
	}
	</script>
	";
echo "<h1> Overview of all regions</h1>";
echo "<p><table class=\"regions\"> 
 <thead>
    <tr>
      <th>Regio</th>
      <th>Clan</th>
	  <th>Points</th>
    </tr>
  </thead>";
  foreach ($json_regions as $regio){
		echo "<tr onclick=\"doNav('region.php?id=".$regio["regionid"]."')\">";
		echo "<td>".$regio["name"]."</td>";
		echo "<td>".$regio["leader"]["name"]."</td>";
		echo "<td>".$regio["leader"]["points"]."</td>";
		echo "</tr>";
	}
echo "</table>";
echo "<div id='container-regions' style='min-width: 400px; height: 400px; margin: 0 auto'></div>";
}
echo "</body></html>";

?>