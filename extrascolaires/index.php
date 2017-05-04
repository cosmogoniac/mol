<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Activités extraescolaires</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<script type="text/javascript" async="" src="../js/menu.js"></script>
	<script type="text/javascript" async="" src="../js/buscar.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Activités extraescolaires</h1>
		<section class="actividades">
			<div class="biparrafo">
				<div class="parrafo marcalink noflex">
					<p>L'association de parents d’élèves (APE) organise pour tous les élèves du Lycée français Molière des activités extrascolaires qui peuvent être consultées sur la <a href="http://www.apemoliere.org/web/Inicio.aspx" target="_blank">page web</a> et le catalogue à partir du lien suivant.</p>
					<div class="cuadrado">
						<h2>Colonies Moliere</h2>
						<div class="microSep"></div>
						<p>L'association des parents d’élèves(APE) organise les Colonies Molière.</p>
						<div class="btn">
							<a href="<?php echo $_SESSION['route'];?>/colonies-moliere/" title=""><i class="fa fa-adjust"></i> Voir</a>
						</div>
					</div>
				</div>
				<div class="parrafo marcalink noflex">
					<p><strong>Documentación</strong></p>
					<p><a href="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/activa1617.pdf" target="_blank" rel="">Activa 2016/2017</a></p>
					<p><a href="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/aloha1617.pdf" target="_blank" rel="">Aloha 2016/2017</a></p>
					<p><a href="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/informatica1617.pdf" target="_blank" rel="">Informática Curso 2016/2017.</a></p>
					<p><a href="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/nenoos1617.pdf" target="_blank" rel="">Nenoos 2016/2017</a></p>
					<p><a href="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/robotica1617.pdf" target="_blank" rel="">Robótica 2016/2017</a></p>
					<p><a href="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/inscripcion1617.pdf" target="_blank" rel="">Hoja de Inscripción 2016/2017</a></p>
					<div class='btn'>
						<a href="http://www.lyceemolieresaragosse.org/wp-content/uploads/2013/01/catalogo1617.pdf" title="" target="_blank"><i class="fa fa-futbol-o"></i> Catalogue pdf 2016-17</a>
					</div>
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