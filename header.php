<?php
session_start();
if(!isset($_SESSION['route'])){
	$rutacompleta= "http://".$_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];
	if((strpos($url,"localhost")!==false))
		$rutacompleta.=(strpos($url,"framol")===false)?"/pruebamoliere/":"/framol/";
	else
		$rutacompleta.=(strpos($url,"framol")===false)?"/otros/moliere/":"/otros/framol/";

	$_SESSION['route']=$rutacompleta;
	echo "<input id='rutacompleta' type='hidden' value='".$rutacompleta."'>";
}
?>
	<div class='tapando'></div>
	<div class='arriba'>
		<span class="willy willy-arriba"></span>
	</div>
	<div id="container">
		<div class="header">				
			<header>
				<div class='coord'><span class="phone"><span class="fa fa-phone"></span>+34 976 525 444</span><span class="mail"><span class="fa fa-envelope"></span>moliere-zaragoza@lyceemoliere.com</span></div>
				<div class="social-links">
					<a href="https://twitter.com/lyceemoliere" target="_blank"><span class="fa fa-twitter"></span></a>
					<a href="https://www.facebook.com/liceofranceszaragoza/" target="_blank"><span class="fa fa-facebook"></span></a>
					<a href="https://es.pinterest.com/lyceemoliere/" target="_blank"><span class="fa fa-pinterest"></span></a>
					<a href="https://www.youtube.com/channel/UCEzeM_wqi-NSE9uTdnsvjJA" target="_blank"><span class="fa fa-youtube-play"></span></a>
					<a href="https://www.linkedin.com/in/lyceemolierezaragoza?trk=nav_responsive_tab_profile" target="_blank"><span class="fa fa-linkedin"></span></a>
					<a href="http://www.lyceemolieresaragosse.org/" rel="nofollow" class="sprite flag-france" title="Espagnol"></a>
				</div>
			</header>
			<div class="navegacion">
				<div class="espacio-logo">
					<a href="<?php echo $_SESSION['route'];?>"><div class="sprite logo"></div></a>
					<div class="legende">Lycée privé français</div>
				</div>
				<nav class="principal">
					<div class="cierre">X</div>
					<ul class="first-level">
						<li><a href="<?php echo $_SESSION['route'];?>/">ACCUEIL</a></li>
						<li>NOUS
							<ul class="second-level">
								<li><a href="<?php echo $_SESSION['route'];?>qui-sommes-nous">Qui sommes-nous?</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>mot-du-directeur">Mot du directeur</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>inscriptions">Inscriptions</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>titres-diplomes">Titres et diplômes</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>organigramme">Organigramme</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>anciens-eleves">Anciens élèves</a></li>
							</ul>
						</li>
						<li><a href="<?php echo $_SESSION['route'];?>methode">MÉTHODE</a></li>
						<li>LANGUES
							<ul class="second-level">
								<li><a href="<?php echo $_SESSION['route'];?>langues">Multilinguisme</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>francais">Français</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>anglais">Anglais</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>espagnol">Espagnol</a></li>
							</ul>					
						</li>
						<li>AGENDA
							<ul class="second-level">
								<li><a href="<?php echo $_SESSION['route'];?>agenda">Agenda</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>horaires">Horaires</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>calendrier-scolaire">Vacances</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>menus-cantine">Menus cantine</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>trajets-bus">Trajets autobus scolaire</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>extrascolaires">Activités extrascolaires</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>livres-secondaire">Livres de secondaire</a></li>
							</ul>					
						</li>
						<li>ACTUALITÉ
							<ul class="second-level">
								<li><a href="<?php echo $_SESSION['route'];?>blog">Blog</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>bulletin-petit-moliere">Bulletin 'Le petit Molière</a></li>
								<li><a href="<?php echo $_SESSION['route'];?>medias">Mediás</a></li>
							</ul>
						</li>
						<li><a href="<?php echo $_SESSION['route'];?>contact">CONTACT</a></li>
						<?php
							 if($_SERVER['SCRIPT_URI']==$_SESSION['route']){
						 		echo "<li><span class='willy willy-lupa'></span></li>";
						 		echo "<li><div class='buscar oculto'>";
						 		echo "<input placeholder='Buscar ...' type='search'><span class='willy willy-flecha flecha'></span>";
								echo "</div></li>";
						 	}
						?>
					</ul>
				</nav>
				<nav class="reduciendo"><span class="willy willy-barras"></span><span>MENU</span></nav>
			</div>
		</div>