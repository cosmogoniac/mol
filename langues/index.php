<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Multilinguisme</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
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
		<h1>Multilinguisme</h1>
		<section class="idiomas">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="parrafo">
				<div class="separacion"><span class="mid"><span class="line"></span></span><span class='lit'>Multilinguisme dès 3 ans</span><span class="mid"><span class="line"></span></span></div>
				<p>Nous formons des élèves internationaux. Voilà pourquoi l’apprentissage des langues est une partie essentielle de notre projet éducatif.</p>
				<p>Le français, l’anglais et l’espagnol sont trois langues qui cohabitent dans notre école. Ci-dessous, voici comment s’intègrent les langues au Lycée français Molière.</p>
			</div>
			<div class="botones">
				<div class="txtybtn">
					<div class="separacion"><span class="mid"><span class="line"></span></span><span class='lit'>Français</span><span class="mid"><span class="line"></span></span></div>				
					<div class="btn">
						<a href="<?php echo $_SESSION['route'];?>/francais/"><i class="fa fa-check"></i>Plus d'informations</a>
					</div>
				</div>
				<div class="txtybtn">
					<div class="separacion"><span class="mid"><span class="line"></span></span><span class='lit'>English</span><span class="mid"><span class="line"></span></span></div>
					<div class="btn">
						<a href="<?php echo $_SESSION['route'];?>/anglais/"><i class="fa fa-check"></i>More information</a>
					</div>
				</div>
				<div class="txtybtn">
					<div class="separacion"><span class="mid"><span class="line"></span></span><span class='lit'>Español</span><span class="mid"><span class="line"></span></span></div>
					<div class="btn">
						<a href="<?php echo $_SESSION['route'];?>/espagnol/"><i class="fa fa-check"></i>Más informacion</a>
					</div>
			</div>			
		</section>
		<?php
			include_once("../sidebar-metodo.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
</body>
</html>