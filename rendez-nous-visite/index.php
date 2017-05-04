<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Rendez-nous visite</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/inscripciones.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<script type="text/javascript" async="" src="../js/inscripcion.js"></script>
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	<style>

	</style>
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Rendez-nous visite</h1>
		<section class="ven">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="columnas">
				<div class="columna">
					<p>
						Le Lycée français Molière de Saragosse est un établissement ouvert sur le monde. Nous accueillons des enfants de tous les horizons et de toutes les cultures en leur offrant un <strong>niveau académique d’excellence</strong> et un suivi personnalisé à chaque étape de leur vie scolaire: nous les préparons à avoir un futur meilleur.
					</p>
					<p>
						C’est pour cela que nous aimerions que vous puissiez nous rendre visite pour mieux nous connaître. Nous savons que le choix d’une école est un acte important, alors avant de prendre votre décision: <strong>venez nous voir!</strong>.
					</p>
					<p>
						Complétez ce simple formulaire et nous nous mettrons en contact avec vous afin de fixer une date et une heure de visite.
					</p>
					<form name="inscripcion" class="inscripcion" enctype='application/json'>
						<div class="formulario">
							<input name="nombreV" class="nombre" placeholder="Nom"  pattern="^[(A-Za-z  áéíóúAÉÍÓÚÑñ)]{3,20}$">
							<input type="email" name="email" placeholder="Courriel*" required pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$">
							<input name="tel" class="tel" type="date" placeholder="Téléphone" pattern="^[0-9]{9}$">
							<!-- <div class="corrige">El email es obligatorio</div> -->
						</div>
						<div class="envio"><button class="limpiar">Effacer</button><input type="submit" class="enviar" value="Envoi formulaire"></div>
					</form>
				</div>
				<div class="columna">
					<div class="doble">
						<p>
							Muriel Romero Fabre, <em>directrice de l’École Primaire</em>, vous recevra personnellement. a visite dure environ 1heure, elle a un caractère informatif, <strong>sans aucun compromis.</strong>. Pendant la visite, elle vous présentera les points suivants:
						</p>
						<figure>
							<img class="wp-image-4288 alignright" src="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/muriel.jpg" alt="muriel" width="140" height="200">
							<figcaption>Muriel Romero Fabre</figcaption>
						</figure>
					</div>
					<div class="simple">
						<ul class="lista-s">
							<li>Objectifs du Lycée et situation dans le réseau international.</li>
							<li>Caractéristiques du <strong>système d’enseignement français</strong> et notre <strong>projet éducatif</strong>.</li>
							<li><strong>Équivalences </strong> entre le système français et le système espagnol.</li>
							<li><strong>Certificats et diplômes</strong> que va obtenir votre enfant.</li>
							<li><strong>Voyages pédagogiques</strong> et<strong> échanges culturels</strong>, en France et Angleterre, organisés périodiquement tout au long de la scolarité.</li>
							<li>Puis vous visiterez notre Établissement: l’École Primaire, le Collège, le Lycée, la cantine… vous pourrez parler avec les professeurs et vous verrez nos élèves pendant leurs activités.</li>
							<li>Bien entendu, elle répondra à toutes les questions que vous vous posez.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="unica">
				<div class="separacion">
					<span class="mid"><span class="line"></span></span>
					<span class='lit'><span class="fa fa-lightbulb-o"></span>Étudier au Lycée français Molière</span>
					<span class="mid"><span class="line"></span></span>
				</div>
				<div class="triple">
					<div class="videos">
						<iframe class="vidone"></iframe>
					</div>
					<div class="videos">
						<iframe class="vidone"></iframe>
					</div>
					<div class="videos">
						<iframe class="vidone"></iframe>
					</div>
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