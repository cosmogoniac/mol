<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Calendrier scolaire</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/calendrier.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Calendrier scolaire</h1>
		<section class="calendrier">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="parrafo">
				<p>
				*Certaines dates (Fiestas del Pilar) peuvent être soumises à modifications.
				</p>
				<div class="annee">
					<?php
						include_once("../horarios.html");
					?>
					<script>
						var mes=new Date().getMonth();
						var elmes=document.querySelector("div[data-mesnum='"+mes+"']");
						elmes.style.backgroundColor="rgba(192,31,57,.4)";
						var noMes=elmes.firstElementChild;
						noMes.style.color="rgba(192,31,57,.9)";
						noMes.style.textShadow="1px 1px 1px black";
					</script>
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