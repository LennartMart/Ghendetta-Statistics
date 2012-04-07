<?php

echo "<!doctype html>  

<!--[if lt IE 7 ]> <html lang=\"en\" class=\"no-js ie6\"> <![endif]-->
<!--[if IE 7 ]>    <html lang=\"en\" class=\"no-js ie7\"> <![endif]-->
<!--[if IE 8 ]>    <html lang=\"en\" class=\"no-js ie8\"> <![endif]-->
<!--[if IE 9 ]>    <html lang=\"en\" class=\"no-js ie9\"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang=\"en\" class=\"no-js\"> <!--<![endif]-->

<head>

<!-- BEGIN Meta tags -->
<meta charset=\"utf-8\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">

<title>Ghendetta - Statistics</title>

<meta name=\"description\" content=\"Some statistics of Ghendetta\" />

<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"/img/favicon.png\">
<link rel=\"stylesheet\" href=\"css/style.css\">


<!-- BEGIN Navigation bar CSS - This is where the magic happens -->
<link rel=\"stylesheet\" href=\"css/navbar.css\">
<!-- END Navigation bar CSS -->

<!-- BEGIN JavaScript -->
<script type=\"text/javascript\">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30508953-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\" type=\"text/javascript\"></script>
<script type =\"text/javascript\" src=\"/static/highcharts.js\"></script>
<script type =\"text/javascript'src='/static/exporting.js\"></script>
<script type=\"text/javascript\"> 
$(document).ready(function(){

	// Requried: Navigation bar drop-down
	$(\"nav ul li\").hover(function() {
		$(this).addClass(\"active\");
		$(this).find(\"ul\").show().animate({opacity: 1}, 400);
		},function() {
		$(this).find(\"ul\").hide().animate({opacity: 0}, 200);
		$(this).removeClass(\"active\");
	});
	
	// Requried: Addtional styling elements
	$('nav ul li ul li:first-child').prepend('<li class=\"arrow\"></li>');
	$('nav ul li:first-child').addClass('first');
	$('nav ul li:last-child').addClass('last');
	$('nav ul li ul').parent().append('<span class=\"dropdown\"></span>').addClass('drop');

});
</script>
<!-- END JavaScript -->

</head>

<body>

	<h3>Some statistics of Ghendetta</h3>

	<div class=\"wrapper\">
	
		<!-- BEGIN Dark navigation bar -->
		<nav class=\"dark\">
			<ul class=\"clear\">
				<li><a href=\"index.php\">Home</a></li>
				<li><a href=\"site_stat.php\">Site statistics</a></li>
				<li><a href=\"clans.php\">Clans</a>
					<ul>
						<li><a href=\"hawks.php\">Hawks</a></li>
						<li><a href=\"wolves.php\">Wolves</a></li>
						<li><a href=\"panthers.php\">Panthers</a></li>
						<li><a href=\"snakes.php\">Snakes</a></li>
					</ul>
				</li>
				<li><a href=\"regions.php\">Regions</a></li>
				<li><a href=\"about.php\">About</a></li>
				
			</ul>
		</nav>
		<!-- END Dark navigation bar -->
		
	</div>";