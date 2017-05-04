<?php
session_start();
if(!isset($_SESSION['route'])){
	$rutacompleta= "http://".$_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];
	if((strpos($url,"localhost")!==false))
		$rutacompleta.=(strpos($url,"framol")===false)?"/pruebamoliere":"/framol";
	else
		$rutacompleta.=(strpos($url,"framol")===false)?"/otros/moliere":"/otros/framol";

	$_SESSION['route']=$rutacompleta;
}
define( 'WP_USE_THEMES', false );
define( 'COOKIE_DOMAIN', false );
define( 'DISABLE_WP_CRON', true );
// require_once("http://www.lyceemolieresaragosse.org/wp-load.php");
global $current_user;
// echo sha1('24r46024ggr.2017');
wp_set_current_user($_SESSION['usag'], $_SESSION['lecour']);
get_currentuserinfo();
if ( is_user_logged_in() && current_user_can('administrator')) {
?>
		<aside>
			<ul>
				<li class="calendario"><a href="calendario.php"><i class="fa fa-calendar"></i>Calendario</a></li>
				<li class="pdjour"><a href="pdjour.php"><i class="fa fa-cutlery"></i>Menú</a></li>
				<li class="lesrutas"><a href="lesrutas.php"><i class="fa fa-bus"></i>Rutas</a></li>
				<li class="camaras"><a href="camaras.php"><i class="fa fa-video-camera"></i>Vídeos</a></li>
				<li class="lagenda"><a href="lagenda.php"><i class="fa fa-calendar"></i>Agenda</a></li>
				<li class="apres"><a href="apres.php"><i class="fa fa-cogs"></i>Después del moliere</a></li>
				<li class="colonias"><a href="colonias.php"><i class="fa fa-plane"></i>Colonias</a></li>
				<li class="slider"><a href="slider.php"><i class="fa fa-file-powerpoint-o"></i>Diapos</a></li>
				<li class="proyecto"><a href="proyecto.php"><i class="fa fa-graduation-cap"></i>Proyecto</a></li>
				<li class="frites"><a href="frites.php"><i class="fa fa-user-o"></i>Apellido</a></li>
				<li class="banda"><a href="banda.php"><i class="fa fa-minus-square-o"></i>Banda Primera</a></li>				
				<li class="web"><a target="_blank" href="<?php echo $_SESSION['route']?>/"><i class="fa fa-firefox"></i>Web</a></li>
				<li class="wp"><a href="http://www.lyceemolieresaragosse.org/wp-admin/edit.php"><i class="fa fa-wordpress"></i>Wordpress</a></li>
				<li class="sesion"><a href="cierra.php"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>
			</ul>
		</aside>
		<script>
			var active=location.pathname.substring(location.pathname.lastIndexOf("/")+1,location.pathname.lastIndexOf("."));
			document.querySelector("li."+active).className=document.querySelector("li."+active).className+" activa";
		</script>

<?php
	}else{
		wp_redirect($_SESSION['route'].'/boss/boxess.html',301); exit;
	}
	ob_end_flush ();
?>