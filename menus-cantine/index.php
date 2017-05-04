<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menus Cantine</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/calendrier.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/comedor.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/comedor.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Menus Cantine</h1>
		<div class="selection"><label>Día</label><select></select></div>
		<section class="menus">
			<div class="parrafo">
				<p>Au Lycée Molière, nous servons plus de 1000 repas pour enfants et adultes.
				Les <strong>menus sont cuisinés par notre Chef</strong> et une équipe de cinq personnes.</p>
				<p>Nous élaborons chaque semaine des recettes équilibrées. Une journée végétarienne a lieu une fois par mois, un autre jour est dédié à un aliment en particulier (légumes, viande, fruits tropicaux…).</p>
				<p>Nous progressons vers une <strong>cantine scolaire durable</strong>, l’intention est de proposer ainsi des produits locaux et biologiques. Nous avons déjà des <strong>desserts lactés bios</strong>.</p>
			</div>
			<div class="losmenus">
	<?php
		include("../menu.html")
	?>
			</div>
			<div class="annee">
		<?php
				include_once("../horarios.html");
		?>
			</div>
		</section>
		<?php
			include_once("../sidebar-agenda.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
</body>
</html>		