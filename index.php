<!DOCTYPE html>
<html lang=fr>
<head>
<title>Lycée français Molière</title>
<link rel=stylesheet type=text/css href=css/homnu.css>
<link rel="shortcut icon" type=image/png href=favicon.png>
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
<script type=text/javascript defer async src=js/comain.js></script>
</head>
<body>
<?php
		include_once("header.php");
	?>
<div class=main>
<?php
			include("imagenes.php");
		?>
</div>
<?php
		include("banda.html");
	?>
<div class=enlaces>
<div class="enz clack">
<a href=<?php echo $_SESSION['route'];?>/choisir-moliere/>
<span class='willy willy-ok'></span>
<h3>10 bonnes raisons</h3>
</a>
</div>
<div class="enz clack">
<a href=<?php echo $_SESSION['route'];?>rendez-nous-visite/>
<span class='willy willy-ojo'></span>
<h3>Rendez-nous visite</h3>
</a>
</div>
<div class="enz clack">
<a href=<?php echo $_SESSION['route'];?>inscriptions/>
<span class='willy willy-lapiz'></span>
<h3>Inscriptions</h3>
</a>
</div>
<div class="enz clack">
<a href=<?php echo $_SESSION['route'];?>tarifs-scolaires/>
<span class='willy willy-euro'></span>
<h3>Tarifs</h3>
</a>
</div>
</div>
<div class=banda>
<span class=literal>Télécharger la liste de livres scolaires du Secondaire</span>
<span class=globo>
<a href=<?php echo $_SESSION['route'];?>livres-secondaire/>Année scolaire 2016-2017</a>
</span>
</div>
<div class=vidcuad>
<div class=video>
<img src=images/varias/videoMol.jpg class=videomol alt="Colegio privado Molière">
<iframe class=hidden></iframe>
</div>
<div class=cuadro>
<div class="cd clack">
<div class="sprite infantil-sm"></div>
<a href=<?php echo $_SESSION['route'];?>maternelle/><span>maternelle</span></a>
</div>
<div class="cd clack">
<div class="sprite primaria-sm"></div>
<a href=<?php echo $_SESSION['route'];?>elementaire/><span>élémentaire</span></a>
</div>
<div class="cd clack">
<div class="sprite eso-sm"></div>
<a href=<?php echo $_SESSION['route'];?>college/><span>collège</span></a>
</div>
<div class="cd clack">
<div class="sprite bachiller-sm"></div>
<a href=<?php echo $_SESSION['route'];?>lycee/><span>lycée</span></a>
</div>
</div>
</div>
<div class=banda>
<span class=literal>Au Lycée Molière, nous formons des élèves internationaux</span>
<span class=globo>
<a href=<?php echo $_SESSION['route'];?>apres-lycee/>Après le Lycée</a>
</span>
</div>
<div class=tablon>
<article class=tbl>
<p>Lors des dernières années du Lycée, les élèves recevront un accompagnement personnalisé pour leur orientation vers leurs futures études.</p>
<span class="globo gris"><a href=<?php echo $_SESSION['route'];?>orientation-post-bac>Orientation</a></span>
</article>
<article class=tbl>
<p>Accès à la bibliothèque de l’Institut français, à des remises sur les livres et le materiel scolaire.</p>
<span class="globo gris"><a href=<?php echo $_SESSION['route'];?>ventajas-moliere>Partenaires Molière</a></span>
</article>
<div class=avn>
<span class=globo><a href=http://www.apemoliere.org/>Association Parents d’élèves</a></span>
<span class=globo><a href=<?php echo $_SESSION['route'];?>extrascolaires>Activités extrascolaires</a></span>
<span class=globo><a href=<?php echo $_SESSION['route'];?>colonies-moliere>Colonies</a></span>
<span class=globo><a href=<?php echo $_SESSION['route'];?>offre-emploi>Offres d’emploi</a></span>
<span class=globo><a href=<?php echo $_SESSION['route'];?>partenaires-moliere>Librairie Cálamo</a></span>
</div>
</div>
<div class=noticias>
<div class=separacion><span class=mid><span class=line></span></span><span class=lit>Noticias</span><span class=mid><span class=line></span></span></div>
<div class=lasnews>
<?php
			include("lasnews.html");
?>
</div>
</div>
<div class=banda-iconos>
<div class=liens>
<span class='willy willy-tierra'></span>
<span><a href=<?php echo $_SESSION['route'];?>liens-utiles>Liens utiles</a></span>
</div>
<div class=rutas>
<span class='willy willy-bus'></span>
<span><a href=<?php echo $_SESSION['route'];?>trajets-bus>Trajets d’autobus</a></span>
</div>
<div class=menus>
<span class='willy willy-cubiertos'></span>
<span><a href=<?php echo $_SESSION['route'];?>menus-cantine>Menus cantine</a></span>
</div>
<div class=menus>
<span class='willy willy-libros'></span>
<span><a href=http://1340025z.esidoc.fr/ target=" _blank">Bibliothèque Secondaire</a></span>
</div>
<div class=zona>
<span class='willy willy-llave'></span>
<span><a href=http://www.primaire.lyceemolieresaragosse.org/ target=" _blank">Zone privée Primaire</a></span>
</div>
<div class=zona>
<span class='willy willy-llave'></span>
<span><a href=http://lyceemolieresaragosse.la-vie-scolaire.fr/ target=" _blank">Zone privée Secondaire</a></span>
</div>
</div>
<?php
	include_once("footer.php");
?>
</body>
</html>