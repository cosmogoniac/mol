<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Projet d'école maternelle et primaire</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/rutas.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/projet.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Projet d'école maternelle et primaire</h1>
		<section class="projet">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="parrafo">
				<div class="logos">
					<div class="logo mejora">
						<i class="fa fa-graduation-cap"></i>
						<span>Améliorer l'Oral et L'écrit</span>
					</div>					
					<div class="logo dominar">
						<i class="fa fa-graduation-cap"></i>
						<span>Maitriser l'espace</span>
					</div>

					<div class="logo desarrollo">
						<i class="fa fa-graduation-cap"></i>
						<span>Developper l'initiative et l'autonomie</span>
					</div>
					<div class="logo refuerzo">
						<i class="fa fa-graduation-cap"></i>
						<span>Renforcer la citoyenneté</span>
					</div>
				</div>	
				<div class="proyecto">
				<?php
					@include("../proyecto.html");
				?>
				</div>		
			</div>
		</section>
		<?php
			include_once("../sidebar-formacion.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
	<script>


	</script>
</body>
</html>