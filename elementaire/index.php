<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Élémentaire</title>
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
		<h1>Élémentaire</h1>
		<section class="eprimaria">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="parrafo">
					<p>Les deux premières années (CP et CE1) ont pour objectifs prioritaires l’<strong>apprentissage de la lecture et de l’écriture en français et en espagnol</strong>, la <strong>connaissance et la compréhension des nombres</strong>, de leur <strong>écriture chiffrée et le calcul</strong> sur de petites quantités. La langue anglaise est enseignée dès 3 ans.</p>
					<p>
						<img src="http://www.lyceemolieresaragosse.org/wp-content/uploads/2016/04/primaria-1.jpg" alt="primaria" title="educación primaria en el colegio francés">
					</p>
					<p>L’éducation physique et sportive occupe une place importante dans les activités scolaires.</p>
					<p>Une première pratique scientifique, les premières réflexions historiques, géographiques et civiques garantissent une indispensable <strong>ouverture sur le monde et la construction d’une culture commune</strong> à tous les élèves.</p>
					<p>L’éducation artistique repose sur une pratique favorisant l’expression des élèves et sur le contact direct avec des œuvres dans la perspective d’une première initiation à l’histoire des arts.</p>
				</div>
				<div class="parrafo">
					<p>Les trois dernières années de l’école primaire (CE2- CM1- CM2) contribuent à <strong>consolider la maîtrise de la langue française et de la langue espagnole</strong>, ainsi que celle des principaux éléments de mathématiques.</p>
					<p>En fin de CM2, en <strong>langue anglaise</strong>, les élèves doivent avoir acquis les compétences nécessaires à la communication élémentaire définie par le niveau A1 du cadre européen commun de référence. Une <strong>certification par l’Université de Cambridge</strong> est délivrée après examen.</p>
					<p><strong>L’autonomie et l’initiative personnelle</strong>, conditions de la réussite scolaire, sont progressivement mises en œuvre dans tous les domaines d’activité et permettent à chaque élève de gagner en assurance et en efficacité.</p>
					<p>L'utilisation quotidienne <strong>des technologies de l'information et de la communication</strong> devient habituelle dans toutes nos formations.</p>
					<p>La formation dans les différentes disciplines font l’objet de progressions par année scolaire, jointes au programme, consultables sur 
					<div class="btn">
						<a href="<?php echo $_SESSION['route'];?>projet-maternelle-primaire"><i class="fa fa-graduation-cap"></i>Projet d'école maternelle et primaire</a>
					</div>
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