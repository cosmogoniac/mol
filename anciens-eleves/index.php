<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Réseau d'anciens élèves</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/inscripciones.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/inscripcion.js"></script>
	<script type="text/javascript" async="" src="../js/alumni.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Réseau d'anciens élèves</h1>
		<section class="alumni">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="triparrafo">
				<h3>Réseau d'anciens élèves du Lycée français Molière:</h3>
				<p>
					Le Réseau Alumni Molière [RAM] est un lieu de rencontre pour les anciens élèves du Lycée français Molière.
				</p>
				<p>
					Si tu es un ancien élève ou bien tu en connais, remplis le formulaire ci-dessous <a class="viaja">en bas de page</a>.
				</p>
			</div>
			<div class="separacion">
				<span class="mid"><span class="line"></span></span>
				<span class='lit'><span class="fa fa-info-circle"></span>Réseau Alumni Molière</span>
				<span class="mid"><span class="line"></span></span>
			</div>
			<div class="biparrafo">
				<div class="news"></div>
				<div class="news"></div>
			</div>
			<hr>								
			<form name="inscripcion" class="inscripcion" enctype='application/json'>
				<div class="alumno">
					<h3>Ancien Élève</h3>
					<input name="nombre" class="nombre" required placeholder="Nom et prénom"  pattern="^[(A-Za-z  áéíóúAÉÍÓÚÑñ)]{3,20}$">
					<input name="promocion" class="promocion" placeholder="Promotion">
					<input type="email" name="email" placeholder="Email*" required pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$">
					<textarea name="comentarios" class="comentarios" placeholder="Commentaires"></textarea>
				</div>
				<div class="envio"><button class="limpiar">Effacer</button><input type="submit" class="enviar" value="Envoi"></div>
			</form>

		</section>
		<?php
			include_once("../sidebar-somos.php");
		?>
	</div>
		
	<?php
		include_once("../footer.php");
	?>
</body>
</html>