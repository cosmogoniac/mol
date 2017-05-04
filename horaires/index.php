<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Horaire</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/horarios.css">
	<script type="text/javascript" async="" defer src="../js/horarios.js"></script>
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Horaire</h1>
		<section class="horario">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo up">
				<div class="clases">
					<ul>
						<li>Maternelle</li>
						<li>Élémentaire</li>
						<li>Collège: 6ème à 3ème</li>
						<li>Lycée: 2nde, 1ère, Terminale</li>
					</ul>
				</div>
				<div class="horarios">
					<div class="perenne">
						<span>Matin</span>
						<span>Après-Midi</span>
						<span>Mercredi</span>
					</div>				
					<div class="horas">
						<div class="tresColumnas">
							<span>9h</span><span>11h45</span>
						</div>
						<div class="tresColumnas">
							<span>13h45</span><span>16h45</span>
						</div>
						<div class="tresColumnas">
							<span>9h</span><span>12h</span>
						</div>
					</div>
					<div class="horas">
						<div class="tresColumnas">
							<span>9h</span><span>13h</span>
						</div>
						<div class="tresColumnas">
							<span>15h</span><span>16h45</span>
						</div>
						<div class="tresColumnas">
							<span>9h</span><span>12h</span>
						</div>
					</div>
					<div class="horas">
						<div class="tresColumnas">
							<span>9h</span><span>13h</span>
						</div>
						<div class="tresColumnas">
							<span>14h</span><span>16h50</span>
						</div>
						<div class="tresColumnas">
							<span>9h</span><span>13h</span>
						</div>
					</div>
					<div class="horas">
						<div class="tresColumnas">
							<span>8h</span><span>13h</span>
						</div>
						<div class="tresColumnas">
							<span>14h</span><span>16h50</span>
						</div>
						<div class="tresColumnas">
							<span>8h</span><span>13h</span>
						</div>
					</div>
				</div>
			</div>
			<div class="biparrafo">
				<div class="clases down"></div>
				<div class="parrafo">
					<p>Les cours sont assurés du lundi au vendredi.</p>
					<p>Le mercredi, la classe s’arrête à 12h.</p>
					<p>L’après-midi est réservée aux activités périscolaires proposées par L’APE.</p>
				</div>
			</div>
		</section>
		<?php
			include_once("../sidebar-agenda.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
</body>
</html>