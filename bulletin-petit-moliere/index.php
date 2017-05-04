<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Bulletin "Le petit Molière"</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<script type="text/javascript" async="" src="../js/boletines.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Bulletin "Le petit Molière"</h1>
		<section class="boletin">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="news btin"></div>
			<div class="hidden"></div>
			<div class="paginacion"></div>
		</section>
		<?php
			include_once("../sidebar-blog.php");
		?>
	</div>
		
	<?php
		include_once("../footer.php");
	?>
</body>
</html>