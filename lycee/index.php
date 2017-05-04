<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Lycée</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Lycée</h1>
		<section class="bachiller">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="parrafo">
					<p>L’élève devra désormais approfondir de plus en plus les contenus appris en cours afin d’apprendre à les utiliser et à organiser ses idées.</p>
					<p>Pendant l’année de la Seconde, <strong>l’accompagnement personnalisé</strong> mis en place permet non seulement aux élèves de travailler la méthode (la prise de notes…) mais aussi de <strong>réfléchir à leur projet d’étude</strong>, afin d’envisager la préparation du BAC (Littéraire, Scientifique ou Économique et Social).</p>
					<p>es méthodes de travail acquises pendant ces trois années de Lycée ont pour objectif d’inciter l’élève à toujours <strong>aller plus loin dans sa réflexion</strong> (les contenus des cours étant seulement une base).</p>
					<p>Il s’agit de pouvoir comprendre et analyser aussi bien les phénomènes scientifiques, qu’économiques que les différents courants littéraires.</p>
					<div class="btn">
						<a href="<?php echo $_SESSION['route'];?>/livres-secondaire"><i class="fa fa-graduation-cap"></i>Liste livres scolaires</a>
					</div>					
				</div>
				<div class="parrafo">
					<p>Pendant leur scolarité au Lycée Français Molière de Saragosse, nos élèves passent les <strong> examens du DELF (niveau B2), de Cambridge (niveau B1 ou B2) puis le Baccalauréat Français</strong> (et obtiennent également l’homologation du «Bachillerato» español) qui leur permet un <strong>accès aussi bien aux Universités Françaises (où ils ont des places réservées) qu’aux Universités Espagnoles.</strong></p>
					<p>
						<img src="http://lyceemolieresaragosse.org/wp-content/uploads/2016/04/bachillerato.jpg" alt="bachiller" title="Le Lycée au Lycée Molière de Saragosse">
					</p>					
					<p>Le Lycée est une consolidation des connaissances et méthodes acquises au Collège.</p>
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
</body>
</html>