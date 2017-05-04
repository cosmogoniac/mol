<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Qui sommes-nous?</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/quienes.css">
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
		<h1>Qui sommes-nous?</h1>
		<section class="somos">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="parrafo">
					<p>Le <strong>Lycée français Molière de Saragosse</strong> est un établissement français à caractère bilingue et biculturel qui accueille les enfants de toute nationalité, de la classe maternelle -3 ans- à la classe de Terminale -18 ans.</p>
				</div>
				<div class="parrafo">
					<p>Un établissement homologué par le Ministère Espagnol de l’Education et par le Ministère Français de l’Education Nationale.</p>
					<p>Il est géré par la <em>Mission Laïque Française</em>, association pour la diffusion de la langue et de la culture française à l’étranger.</p>
				</div>
			</div>
			<div class="biparrafo">
				<div class="parrafo">
					<p>
						Tout élève sortant du Lycée Français MOLIERE peut réintégrer tout établissement français ou espagnol, avec la reconnaissance officielle des enseignements reçus.
					</p>			
				</div>
				<div class="parrafo">
					<p>
						En plus du programme officiel français sont dispensés les enseignements de Lengua-Literatura et Sociales (Histoire-Géographie en Espagnol) par des <strong>enseignants espagnols</strong>.
					</p>
					<p>
						Dès l’âge de 3 ans, un enseignement de la langue anglaise complète la formation linguistique des élèves.
					</p>		
				</div>
			</div>
			<div class="botones">
				<div class="btn">
					<a href="<?php echo $_SESSION['route'];?>/brevet-college/"><i class="fa fa-paper-plane"></i>Brevet des Collèges</a>
				</div>
				<div class="btn">
					<a href="<?php echo $_SESSION['route'];?>/equivalences-formatives/"><i class="fa fa-random"></i>Equivalences formation</a>
				</div>
				<div class="btn">
					<a href="<?php echo $_SESSION['route'];?>/titres-diplomes/"><i class="fa fa-graduation-cap"></i>Titres et diplômes</a>
				</div>
			</div>
			<div class="statis">
				<div class="separacion">
					<span class="mid"><span class="line"></span></span>
					<span class='lit'><span class="fa fa-signal"></span>Statistiques scolaires</span>
					<span class="mid"><span class="line"></span></span>
				</div>
				<div class="tabla">
					<div class="tit">
						<h3>Baccalauréat</h3>
					</div>
					<div class="tres">
						<span></span><span class="annee">2014</span><span class="annee">2015</span>
					</div>
					<div class="tres">
						<span>Mention très bien</span><span class="annee">33,33%</span><span class="annee">34,38%</span>
					</div>
					<div class="tres">
						<span>Mention bien</span><span class="annee">25,00%</span><span class="annee">40,62%</span>
					</div>
					<div class="tres">
						<span>Mention assez bien</span><span class="annee">25,00%</span><span class="annee">9,37%</span>
					</div>
					<div class="tres">
						<span>Passable</span><span class="annee">16.67%</span><span class="annee">15,63%</span>
					</div>
					<div class="tres">
						<span>Refusé</span><span class="annee">0,00%</span><span class="annee">0,00%</span>
					</div>
				</div>
				<div class="tabla">
					<div class="tit">
						<h3>Brevet</h3>
					</div>
					<div class="tres">
						<span></span><span class="annee">2014</span><span class="annee">2015</span>
					</div>
					<div class="tres">
						<span>Mention très bien</span><span class="annee">17,78%</span><span class="annee">14,59%</span>
					</div>
					<div class="tres">
						<span>Mention bien</span><span class="annee">28,89%</span><span class="annee">31,25%</span>
					</div>
					<div class="tres">
						<span>Mention assez bien</span><span class="annee">35,56%</span><span class="annee">33,33%</span>
					</div>
					<div class="tres">
						<span>Passable</span><span class="annee">15,55%</span><span class="annee">20,83%</span>
					</div>
					<div class="tres">
						<span>Refusé</span><span class="annee">2,22%</span><span class="annee">0,00%</span>
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