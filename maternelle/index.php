<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Maternelle</title>
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
		<h1>Maternelle</h1>
		<section class="einfantil">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="parrafo">
					<p>L’Ecole Maternelle a pour finalité d’aider chaque enfant à devenir autonome et à s’approprier des connaissances et des compétences afin de réussir les apprentissages fondamentaux dès 6 ans, tout en respectant les étapes et le rythme du développement de l’enfant.</p>
					<p>
						<img src="http://www.lyceemolieresaragosse.org/wp-content/uploads/2016/04/infantil-2.jpg" alt="infantil" title="maternelle">
					</p>
					<p>À l’école maternelle, l’enfant établit des relations avec d’autres enfants et avec des adultes. Il exerce ses capacités motrices, sensorielles, affectives, relationnelles et intellectuelles; il devient progressivement un élève. Il découvre l’univers de l’écrit.</p>
				</div>
				<div class="parrafo">
					<p>Le programme de l’école maternelle présente les grands domaines d’activité à aborder sur les trois années qui précèdent l’entrée dans la scolarité obligatoire; il fixe les objectifs à atteindre et les compétences à acquérir avant le passage à l’école élémentaire.</p>
					<p>L’objectif essentiel <strong>langage oral riche, organisé et compréhensible par l’autre</strong>.</p>
					<p>Les apprentissages se structurent autour des domaines d’activité suivants:</p>
					<ul class="lista-s">
						<li>S’approprier le langage.</li>
						<li>Agir et s’exprimer avec son corps.</li>
						<li>Découvrir l’écrit.</li>
						<li>Découvrir le monde.</li>
						<li>Devenir élève.</li>
						<li>Percevoir, sentir, imaginer, créer.</li>
					</ul>
					<div class="btn">
						<a href="<?php echo $_SESSION['route'];?>projet-maternelle-primaire/"><i class="fa fa-graduation-cap"></i>Projet d'école maternelle et primaire</a>
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