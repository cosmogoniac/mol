<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Tarifs scolaires</title>
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
		<h1>Tarifs scolaires</h1>
		<section class="tarifas">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="parrafo">
				<p><strong>Les Tarifs et prix du Lycée français Molière pour l’année scolaire 2016-2017 sont les suivants:</strong>
				<span class="btn">
					<a href="<?php echo $_SESSION['ruta'];?>/bourses/"><i class="fa fa-map-o"></i> Bourses</a>
				</span>
				</p>
			</div>
			<div class="statis">
				<div class="separacion">
					<span class="mid"><span class="line"></span></span>
					<span class='lit'><span class="fa fa-eur"></span>Tarifs</span>
					<span class="mid"><span class="line"></span></span>
				</div>
				<div class="tableau">
					<div class="tit">
						<h3>Inscriptions</h3>
					</div>
					<div class="biparrafo">
						<span>Inscription</span><span class="annee">€ année</span>
					</div>
					<div class="biparrafo">
						<span><strong>Première Inscription</strong></span><span class="annee">525,00</span>
					</div>
					<div class="biparrafo">
						<span><strong>Maternelles</strong></span><span class="annee">350,00</span>
					</div>
					<div class="biparrafo">
						<span><strong>Primaires</strong></span><span class="annee">350,00</span>
					</div>
					<div class="biparrafo">
						<span><strong>Secondaire</strong></span><span class="annee">135,00</span>
					</div>
				</div>
				<div class="tabla">
					<div class="tit">
						<h3>Scolarité</h3>
						<p class="italico">[Inscription en Juillet. Facturation bimensuelle: 5 paiements]</p>
					</div>
					<div class="tres">
						<span></span><span class="annee">€ mes</span><span class="annee">€ año</span>
					</div>
					<div class="tres">
						<span><strong>Maternelles</strong></span><span class="annee">379,00</span><span class="annee">3.790,00</span>
					</div>
					<div class="tres">
						<span><strong>Primaires</strong></span><span class="annee">388,00</span><span class="annee">3.880,00</span>
					</div>
					<div class="tres">
						<span><strong>Collège: 6ème / 5ème</strong></span><span class="annee">458,00</span><span class="annee">4.580,00</span>
					</div>
					<div class="tres">
						<span><strong>Collège: 4ème / 3ème</strong></span><span class="annee">470,00</span><span class="annee">4.700,00</span>
					</div>
					<div class="tres">
						<span><strong>Lycée: 2nde</strong></span><span class="annee">470,00</span><span class="annee">4.700,00</span>
					</div>
					<div class="tres">
						<span><strong>Lycée: 1ère et Terminale</strong></span><span class="annee">470,00</span><span class="annee">4.700,00</span>
					</div>
				</div>
				<div class="separacion">
					<span class="mid"><span class="line"></span></span>
					<span class='lit'><span class="fa fa-eur"></span>Extras</span>
					<span class="mid"><span class="line"></span></span>
				</div>				
				<div class="tabla">
					<div class="tit">
						<h3>Demi-pension</h3>
					</div>
					<div class="tres">
						<span></span><span class="annee">€ mes</span><span class="annee">€ año</span>
					</div>
					<div class="tres">
						<span><strong>Mois DP 4 jours(LMJV)</strong></span><span class="annee">89,00</span><span class="annee">890,00</span>
					</div>
					<div class="tres">
						<span><strong>Mois DP 5 jours</strong></span><span class="annee">103,00</span><span class="annee">1030,00</span>
					</div>
					<div class="tres">
						<span><strong>Carnet de 5 tickets</strong></span><span class="annee">42,50</span><span class="annee"></span>
					</div>				
				</div>
				<div class="tabla">
					<div class="tit">
						<h3>Transport</h3>
					</div>
					<div class="tres">
						<span></span><span class="annee">€ mes</span><span class="annee">€ año</span>
					</div>
					<div class="tres">
						<span><strong>Tarif</strong></span><span class="annee">86,00</span><span class="annee">860,00</span>
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