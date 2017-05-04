<?php
$protocol = "HTTP/1.0";
if ( "HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"] )
  $protocol = "HTTP/1.1";
header( "$protocol 503 Service Unavailable", true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );
header( "Retry-After: 3600" );
?>
<!DOCTYPE html>
<html>
<head>
	<title>Maintenance...</title>
	<link href='http://fonts.googleapis.com/css?family=Crafty+Girls' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			font-family: 'Crafty Girls', "Helvetica Neue", Arial, Helvetica, sans-serif;
			background: #ccc;
		}
		.wrapper {
			width: 400px;
			margin: 30px auto;
			padding: 30px;
			background: #fff;
		}
		h1 { color: orange; text-align: center;}
		h3 {color: #888;}
	</style>
</head>
<body>
	<div class="wrapper">
		<h1>Maintenance...</h1>
		<h3>Nous revenons rapidement Le site se met à jour</h3>
	</div>

</body>
</html>
<?php die(); ?>