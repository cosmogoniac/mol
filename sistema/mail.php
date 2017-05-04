<?php
$json=json_decode(file_get_contents('php://input'));
$fichero="";
foreach($json as $j=>$as){
	if($j=="nombreV"){
	   $fichero=$j;
	   break;
	 }
}
$dcorreo="moliere-zaragoza@lyceemoliere.com";
$cco="sinnoticiasdejoe@gmail.com";
$email=$json->email;
$telefono=$json->tel;
$padre=$json->nombreV;
$asunto="Cita para visita";
$mensaje="<html lang='es' dir='ltr'>";
$mensaje.="<head><meta charset='utf-8'/></head>";
$mensaje.="<body><h1>$asunto</h1><br/><br/>";
$mensaje.="<strong>Enviado por:</strong> $padre<br/><br/>";
$mensaje.="<strong>Email:</strong> $email<br/><br/>";
$mensaje.="<strong>Teléfono:</strong> $telefono<br/><br/>";
if($fichero!="nombreV"){
	$alumno=$json->nombre;
	$fecha=$json->fecha;
	$curso=$json->curso;
	$padre=$json->nombreP;
	$asunto="Inscripción Liceo Molière";
	$mensaje.="<strong>Curso:</strong> $curso<br/><br/>";
	$mensaje.="<strong>Fecha Nacimiento:</strong> $fecha<br/><br/></body></html>";
}
$headers = "From: $email\r\n";
$headers.= 'MIME-Version: 1.0' . "\r\n";
$headers.="Bcc: $cco. \r\n";
$headers.='Content-type: text/html; charset=utf-8' . "\r\n";
$headers.='Content-Transfer-Encoding: 8bit';
mail("guillermogarciarouge@gmail.com",$asunto,$mensaje,$headers);
echo "Formulario Enviado. Gracias."
?>