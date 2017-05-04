<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Journée de portes Ouvertes</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/inscripciones.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/inscripcion.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Journée de portes Ouvertes</h1>
		<section class="puertas">
			<div class="biparrafo">
				<div class="parrafo">
					<form class="">
						<div>
							<h3>¡Venez nous rendre visite!</h3>
							<input name="nombre" class="nombre" placeholder="Nom*" pattern="^[(A-Za-z  áéíóúAÉÍÓÚÑñ)]{3,20}$">
							<input name="email" placeholder="Email*" required="" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$" type="email">
							<input type="tel" name="tel" placeholder="Téléphone*" pattern="^[0-9]{9}$" required>
							<select name="horario">
								<option selected>14h</option>
								<option>14h30</option>
								<option>15h</option>
								<option>15h30</option>
								<option>16h</option>
							</select>
							<label for="razones">Comment avez-vous appris la nouvelle des portes ouvertes?</label>
							<textarea name="razones" class="razones" placeholder="J'ai appris la nouvelle...?"></textarea>
							<label>* Necesario</label>
							<div class="envio"><button class="limpiar">Effacer</button><input type="submit" class="enviar" value="Envoyer"></div>
						</div>
					</form>
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