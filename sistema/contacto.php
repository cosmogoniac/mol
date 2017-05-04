<?php
$json=json_decode(file_get_contents('php://input'));
$dcorreo="moliere-zaragoza@lyceemoliere.com";
$cco="sinnoticiasdejoe@gmail.com;";
$cco.="guillermo@artesanoweb.es";
// $cco.="christophe.gallais@mlfmonde.org";
$nombre=$json->nombre;
$email=$json->email;
$contenido=$json->contenido;
$asunto="Formulario de Contacto";
$mensaje="<html lang='es' dir='ltr'>";
$mensaje.="<head><meta charset='utf-8'/></head>";
$mensaje.="<body><h1>$asunto</h1><br/><br/>";
$mensaje.="<strong>Enviado por:</strong> $nombre<br/><br/>";
$mensaje.="<strong>Email:</strong> $email<br/><br/>";
$mensaje.="$contenido<br/><br/>";
$headers = "From: $email\r\n";
$headers.= 'MIME-Version: 1.0' . "\r\n";
$headers.="Bcc: $cco. \r\n";
$headers.='Content-type: text/html; charset=utf-8' . "\r\n";
$headers.='Content-Transfer-Encoding: 8bit';
mail("guillermogarciarouge@gmail.com",$asunto,$mensaje,$headers);
echo "Formulario Enviado. Gracias.";
?>