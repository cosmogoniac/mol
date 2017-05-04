<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Après le Lycée</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/quienes.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/tras.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Après le Lycée</h1>
		<section class="despues">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="parrafo">
				<p>Au Lycée Molière nous sommes fiers de la préparation de nos élèves. Une préparation qui leur permet de choisir des prestigieux destins comme première option, aussi bien en Espagne qu’en France, afin de continuer leurs études supérieures.</p>
				<p>Ci-dessous vous pouvez voir les destins chosis para nos anciens élèves.</p>
			</div>
			<div class="tras">
			<?php
				include_once("../tras.html");
			?>
			</div>			
		</section>
		<?php
			include_once("../sidebar-formacion.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
</body>
</html>