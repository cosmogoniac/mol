<?php
session_start();
ob_start(); 
// $json=json_decode(file_get_contents('php://input'));
define( 'WP_USE_THEMES', false );
define( 'COOKIE_DOMAIN', false );
define( 'DISABLE_WP_CRON', true );
global $user;
// include_once("http://www.lyceemolieresaragosse.org/wp-load.php");
$logueado="";
if ( is_user_logged_in() ) {
	$logueado="logueado";
    $user = wp_get_current_user();
}else{
		ob_start (); 
		header ( "HTTP/1.1 200 OK" ); /* Sometimes error occurs,so to fix we set headers */ 
		$creds = array(); 
		$creds['user_login'] = $_POST['email']; 
		$creds['user_password'] = $_POST['apellido']; 
		// $creds['user_login'] = $json->email; 
		// $creds['user_password'] = $json->apellido; 
		$creds['remember'] = true ;
		if(!isset($_SESSION['route'])){
			$rutacompleta= "http://".$_SERVER["HTTP_HOST"];
			$url= $_SERVER["REQUEST_URI"];
			if((strpos($url,"localhost")!==false))
				$rutacompleta.=(strpos($url,"framol")===false)?"/pruebamoliere":"/framol";
			else
				$rutacompleta.=(strpos($url,"framol")===false)?"/otros/moliere":"/otros/framol";

			$_SESSION['route']=$rutacompleta;
		}
		// Sigining in a WP User
		$user = wp_signon ($creds,false);
		// var_dump($user);
		// echo $json->apellido;
		if( is_wp_error ($user)) 
		{ 
			wp_redirect("<?php echo $_SESSION['route'];?>/boss/boxess.html");
			exit;
		}
		// $logueado="logueado";
		$_SESSION['usag']=$user->ID;
		$_SESSION['lecour']=$_POST['email'];;
		wp_redirect("<?php echo $_SESSION['route'];?>/boss/calendario.php");
		ob_end_flush();
}
// echo $logueado;
?>
