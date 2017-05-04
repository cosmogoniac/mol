<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Contact</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/inscripciones.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/contacto.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Contact</h1>
		<section class="contacto">
			<div class="biparrafo">
				<div class="parrafo">
					<form class="">
						<div>
							<h3>Formulaire de contact</h3>
							<input name="nombre" class="nombre" placeholder="Nom et prénom" pattern="^[(A-Za-z  áéíóúAÉÍÓÚÑñ)]{3,20}$">
							<input name="email" placeholder="Mèl*" required="" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$" type="email">
							<textarea name="contenido" class="contenido" required="" placeholder="Message"></textarea>
							<div class="envio"><button class="limpiar">Effacer</button><input type="submit" class="enviar" value="Envoi"></div>
						</div>
					</form>
				</div>
				<div class="parrafo">
					<h3>Coordonnées</h3>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2980.697843695515!2d-0.8842586845656482!3d41.6622699792399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd59149406bce401%3A0xf1b465b7902189bf!2sCalle+Manuel+Marraco+Ram%C3%B3n%2C+8%2C+50018+Zaragoza!5e0!3m2!1ses!2ses!4v1483386933351" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
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