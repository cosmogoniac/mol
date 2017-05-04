<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Liens Utiles</title>
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
		<h1>Liens Utiles</h1>
		<section class="enlaces">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="parrafo marcalink noflex">
					<h5>Orientation</h5>
						<ul class="lista-s">
							<li>Autres:
								<ul>
									<li><i class="fa fa-link"></i><a href="http://www.onisep.fr" target="_blank">Lien vers le site de l’Office National d’Information sur les Enseignements et les Professions</a>
									</li>
									<li><i class="fa fa-link"></i><a href="<?php echo $_SESSION['route'];?>/consejo-escolar/">Conseil d'école</a></li>
								</ul>
							</li>
						</ul>
					<ul class="lista-s">
						<li>S'informer sur le web:
							<ul>
								<li><i class="fa fa-link"></i><a href="http://www.lewebpedagogique.com" target="_blank">Blog du Webpédagogique pour réviser le bac</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.lettres.net/" target="_blank">Lettres.net (conseils pour le Français)</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.pedagonet.com/other/oral1.htm" target="_blank">Préparer l’oral</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.cndp.fr/secondaire/idd/" target="_blank">Guide des sources d’information du CNDP</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.evene.fr/citations/index.php" target="_blank">Citations du monde</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.liensutiles.org/" target="_blank">Liensutiles.org</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.telecharger.com/" target="_blank">Logiciels</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.dsi-info.ca/moteurs-de-recherche.html" target="_blank">Moteurs de recherche</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.dsi-info.ca/moteurs-de-recherche/langages/operateurs-logiques.html" target="_blank">Réaliser une recherche ciblée en utilisant les opérateurs logiques</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="parrafo marcalink noflex">
					<h5>Réseau</h5>
					<ul class="lista-s">
						<li><i class="fa fa-link"></i><a href="http://www.apemoliere.org" target="_blank">Asociation parents d'élèves</a></li>
						<li><i class="fa fa-link"></i><a href="http://www.ambafrance-es.org/index.php" target="_blank">Ambassade de France</a></li>
						<li><i class="fa fa-link"></i><a href="http://www.mission-laique.asso.fr/" target="_blank">Mission Laïque Française</a></li>
						<li><i class="fa fa-link"></i><a href="http://www.institutfrancais.es/zaragoza/" target="_blank">Institut français</a></li>
						<li><i class="fa fa-link"></i><a href="http://portal.aragob.es/index.html" target="_blank">Gobierno de Aragón</a></li>
					</ul>
					<h5>Francophonie</h5>
					<ul class="lista-s">
						<li><i class="fa fa-link"></i><a href="http://www.courrierinternational.com/planetepresse/planeteP_accueil.asp" target="_blank">Presse francophone</a></li>
						<li><i class="fa fa-link"></i><a href="http://www.institutfrancais.es/madrid/videos/trayectoria-futuro-valor-anadido-frances" target="_blank">La valeur ajoutée du français</a></li>
					</ul>
					<h5>Sites pédagogiques</h5>
					<ul class="lista-s">
						<li><i class="fa fa-link"></i><a href="http://eduscol.education.fr/" target="_blank">Eduscol</a></li>
						<li><i class="fa fa-link"></i><a href="http://www.education.gouv.fr/" target="_blank">Education.gouv</a></li>
					</ul>
					<h5>Dictionnaires et encyclopédies</h5>
					<ul class="lista-s">
						<li>Dictionnaires:
							<ul>
								<li><i class="fa fa-link"></i><a href="http://dico.isc.cnrs.fr/dico/fr/chercher" target="_blank">Dictionnaire des synonymes</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.lexilogos.com/francais_langue_dictionnaires.htm" target="_blank">Dictionnaire Lexilogos</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.le-dictionnaire.com/" target="_blank">· Dictionnaire.com</a></li>
							</ul>
						</li>
						<li>Encyclopédies:
							<ul>
								<li><i class="fa fa-link"></i><a href="http://agora.qc.ca/" target="_blank">Encyclopédie de l’AGORA</a></li>
								<li><i class="fa fa-link"></i><a href="http://www.liensutiles.org/encyclo.htm" target="_blank">· Encyclopédies thèmatiques et générales</a></li>
								<li><i class="fa fa-link"></i><a href="http://fr.wikipedia.org/wiki/Accueil" target="_blank">· Wikipédia  L’encyclopédie libre</a></li>
							</ul>
						</li>
					</ul>
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