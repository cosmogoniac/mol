<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscriptions</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/inscripciones.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/inscripcion.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Inscriptions</h1>
		<section class="inscripciones">
			<div class="cruzada"><span class="cierra">X</span></div>
			<h3>Suivez les indications suivantes pour vous inscrire au Lycée français Molière:</h3>
			<div class="biparrafo">
				<p>
					<span>1º</span> remplissez le formulaire web de préinscription ci-dessous ou composez le numéro <strong>976 525 444</strong>.
				</p>
				<p>
					<span>2º</span> venez découvrir le Lycée français Molière en assistant à une visite guidée avec la Directrice de l’école Primaire.
				</p>
			</div>
			<div class="separacion">
				<span class="mid"><span class="line"></span></span>
				<span class='lit'><span class="fa fa-info-circle"></span>Formulaire de préinscription</span>
				<span class="mid"><span class="line"></span></span>
			</div>			
			<form name="inscripcion" class="inscripcion" enctype='application/json'>
				<div class="alumno">
					<h3>Données de l'élève</h3>
					<input name="nombre" class="nombre" placeholder="Prénom et nom de famille"  pattern="^[(A-Za-z  áéíóúAÉÍÓÚÑñ)]{3,20}$">
					<input name="fecha" class="fecha" placeholder="date de naissance dd/mm/yyyy" pattern="^(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}$">
					<input name="curso" class="curso" required placeholder="Classe sollicitée*">
				</div>
				<div class="progenitor">
					<h3>Données du parent</h3>
					<input name="nombreP" class="nombre" placeholder="Prénom et nom de famille"  pattern="^[(A-Za-z  áéíóúAÉÍÓÚÑñ)]{3,20}$">
					<input name="tel" class="tel" type="tel" placeholder="teléphone" pattern="^[0-9]{9}$">
					<input type="email" name="email" placeholder="Courriel*" required pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$">
				</div>
				<div class="envio"><button class="limpiar">Effacer</button><input type="submit" class="enviar" value="Envoyer"></div>
			</form>
			<hr>
			<div class="biparrafo">
				<div class="parragraphe">
					<p>
						Le<strong> Liceo Francés Molière Zaragoza</strong> –établissement géré par la <em>Mission Laïque Française</em>  prépare ses élèves afin d’obtenir le <em>Diplôme National du Brevet</em> et ses différentes modalités: <em>Baccalauréat français L, ES y S</em>.
					</p>
					<p class="pic">
						<img class="size-full wp-image-3736 aligncenter" src="http://www.lyceemolieresaragosse.org/wp-content/uploads/2011/07/inscripciones-moliere.jpg" alt="inscripciones-moliere" width="300" height="202">
					</p>
					<p>
						Notre établissement suit scrupuleusement les programmes de l’Education nationale française. Les diplômes du <em>Brevet</em> et du <em>Baccalauréat</em> sont remis par <em>l’Académie de Toulouse</em> (dont nous dépendons administrativement).  Ils donnent accès à la même formation universitaire qui est offerte aux étudiants titulaires du <em>Baccalauréat</em> en France. Nos élèves pourront intégrer, en fonction de leurs résultats, une classe préparatoire aux grandes écoles françaises.
					</p>
					<p>
						Depuis 2007, tous les élèves espagnols de Terminale sont exemptés de passer la PAU (Preuve d’Accès Universitaire) et ont accès direct aux universités espagnoles.
					</p>
				</div>
				<div class="parragraphe">
					<p>
						Toute demande d’admission sera soumise à l’examen du dossier scolaire et, en particulier, aux résultats des deux dernières années scolaires. Il est indispensable de joindre les documents qui correspondent à la demande.
					</p>
					<div class="btn clack tarifas">
						<a href="<?php echo $_SESSION['route'];?>/tarifs-scolaires/"><i class="fa fa-cubes"></i> Voir tarifs</a>
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