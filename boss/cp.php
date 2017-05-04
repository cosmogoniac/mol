<?php
session_start();
$json=json_decode(file_get_contents('php://input'));
echo $json->apellido;
ob_start (); 
define( 'WP_USE_THEMES', false );
// require("http://lyceemolieresaragosse.org/wp-load.php");
// require("../../liceo/index.php");
global $current_user;
wp_set_current_user($_SESSION['usag'], $_SESSION['lecour']);
get_currentuserinfo();
if (is_user_logged_in()) {
	$ps=$json->apellido;
	wp_set_password($ps,$current_user->ID);
	get_currentuserinfo();
	$ps=$current_user->user_pass;
	echo "Operación realizada!";
}else{
	echo "Operación NO realizada";
}
?>