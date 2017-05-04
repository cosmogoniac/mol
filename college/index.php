<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Collège</title>
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
		<h1>Collège</h1>
		<section class="eso">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="parrafo">
					<p>Le Collège permet aux enfants de consolider les acquis de l’École Primaire par des <strong>chemins pédagogiques diversifiés et adaptés à leur profil</strong> (la mise en place d’un accompagnement personnalisé en 6ème, 5ème et 4ème), le passage à plusieurs enseignants est un premier pas vers une plus grande autonomie.</p>
					<p>Les exercices de lecture, de compréhension de textes vont êtres renforcés afin de <strong>bien maîtriser la langue française</strong>, la comprendre, l'utiliser afin de réussir dans toutes les matières où la lecture et la compréhension des consignes devient de plus en plus importante.</p>
					<p>Au Lycée Français Molière, pendant cette période l’élève passe les <strong>examens du DELF niveau A2 et B1, les examens de Cambridge (établissement habilité) niveau A2.</strong></p>
					<div class="btn">
						<a href="<?php echo $_SESSION['route'];?>/livres-secondaire"><i class="fa fa-graduation-cap"></i>Livres scolaires de secondaire</a>
					</div>					
				</div>
				<div class="parrafo">
					<p>Pendant sa scolarité au Collège l’élève doit acquérir la maîtrise du socle commun de connaissances et compétences afin qu’il puisse accomplir avec succès sa scolarité et poursuivre sa formation au Lycée.</p>
					<p>
						<img src="http://www.lyceemolieresaragosse.com/wp-content/uploads/2016/04/eso-1.jpg" alt="eso" title="Le Collège au Lycée Molière de Saragosse">
					</p>					
					<p>La fin de la scolarité du Collège est validée par l’obtention du Brevet des Collèges.</p>
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