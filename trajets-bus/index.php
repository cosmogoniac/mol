<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Itinéraires autobus Lycée Molière Saragosse</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/rutas.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/rutas.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Itinéraires autobus</h1>
		<section class="rutasautobus">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="logosyrutas">
					<div class="bus">
						<div class="buslogo itineraire1">
							<i class="fa fa-bus"></i>
							<span>Itinéraire 1</span>
						</div>					
					</div>
					<div class="bus">
						<div class="buslogo itineraire2">
							<i class="fa fa-bus"></i>
							<span>Itinéraire 2</span>
						</div>
					</div>
					<div class="bus">
						<div class="buslogo itineraire3">
							<i class="fa fa-bus"></i>
							<span>Itinéraire 3</span>
						</div>
					</div>
					<div class="bus">
						<div class="buslogo itineraire4">
							<i class="fa fa-bus"></i>
							<span>Itinéraire 4</span>
						</div>
					</div>
				</div>
				<div class="rutasBloque">
			<?php
				include_once("../rutas.html");
			?>
				</div>			
			</div>
			<hr class="blue">
			<div class="biparrafo">
				<p>Nous vous rappelons que les horaires sont orientatifs, ils dépendent de la circulation. C’est pourquoi nous vous demandons d’être à l’arrêt 5 minutes avant. Merci.</p>
				<p>Nous vous demandons d’être ponctuel à l’arrêt du bus. Dans le cas exceptionnel où vous n’y seriez pas, vous pourrez récupérer votre enfant au dernier arrêt de l’itinéraire du bus.</p>
			</div>
		</section>
		<?php
			include_once("../sidebar-agenda.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
	<script>


	</script>
</body>
</html>