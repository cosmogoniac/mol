<?php
session_start();
ob_start (); 
define( 'WP_USE_THEMES', false );
// require($_SESSION['route']."/blog/wp-load.php");
wp_logout();
wp_redirect( $_SESSION['route'], 301 ); exit;
?>