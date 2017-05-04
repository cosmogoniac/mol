<?php
$json=json_decode(file_get_contents('php://input'));
$fichero="";
$dcorreo="moliere-zaragoza@lyceemoliere.com";
$cco="sinnoticiasdejoe@gmail.com";
$nombre=$json->nombre;
$email=$json->email;
$telefono=$json->tel;
$razones=$json->razones;
$horario=$json->horario;
$asunto="Puertas Abiertas";
$mensaje="<html lang='es' dir='ltr'>";
$mensaje.="<head><meta charset='utf-8'/></head>";
$mensaje.="<body><h1>$asunto</h1><br/><br/>";
$mensaje.="<strong>Enviado por:</strong> $nombre<br/><br/>";
$mensaje.="<strong>Email:</strong> $email<br/><br/>";
$mensaje.="<strong>Teléfono:</strong> $telefono<br/><br/>";
$mensaje.="<strong>Horario:</strong> $horario<br/><br/>";
$mensaje.="<strong>¿Cómo ha conocido la celebración de las puertas abiertas?</strong><br/>$razones";
$headers = "From: $email\r\n";
$headers.= 'MIME-Version: 1.0' . "\r\n";
$headers.="Bcc: $cco. \r\n";
$headers.='Content-type: text/html; charset=utf-8' . "\r\n";
$headers.='Content-Transfer-Encoding: 8bit';
mail("guillermogarciarouge@gmail.com",$asunto,$mensaje,$headers);
echo "Formulario Enviado. Gracias."
?>