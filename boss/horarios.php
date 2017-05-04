<?php
$json=json_decode(file_get_contents('php://input'));
$nombre_archivo1 = '../horarios.html';
$nombre_archivo2 = '../calendrier.html';
$nombre_archivo3 = '../css/calendrier.css';
$cabecera="<!DOCTYPE html>".PHP_EOL;
$cabecera.="<html lang='es'>".PHP_EOL;
$cabecera.="<head>".PHP_EOL;
$cabecera.="<meta charset='UTF-8'>".PHP_EOL;
$cabecera.="<title>Calendrier Lycée français Molière</title>".PHP_EOL;
$cabecera.='<link rel="stylesheet" href="css/calendrier.css">'.PHP_EOL;
$cabecera.="</head>".PHP_EOL;
$cabecera.="<body>".PHP_EOL;
$cabecera.="<div class='container'>".PHP_EOL;
$estilo='.annee{border-right:1px solid;display:-webkit-flex;display:-ms-flexbox;display:flex;-ms-flex-flow: row wrap;flex-flow: row wrap;-webkit-flex-flow:row wrap;margin:auto;}'.PHP_EOL;
$estilo.='.annee .mes{border-bottom:1px solid;border-left:1px solid;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-basis:9%;flex-basis:9%;-webkit-flex-flow:column wrap;-ms-flex-flow: row wrap;flex-flow:column wrap;flex-grow:1;-webkit-flex-grow:1;font-size:71%;-webkit-justify-content:space-between;justify-content:space-between;}'.PHP_EOL;
$estilo.='.container{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction:column;}'.PHP_EOL;
$estilo.='.festivo,.finde.festivo{background-color:#93CD52 !important;}'.PHP_EOL;
$estilo.='.dia{border-top:1px solid;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;font-size:60%;-webkit-justify-content:space-around;justify-content:space-around;}'.PHP_EOL;
$estilo.='.dia>div:first-child{-webkit-flex-basis:10%;flex-basis:10%;text-align:right;margin-right:4%}'.PHP_EOL;
$estilo.='.last,.finde{flex-basis:60%;-webkit-flex-basis:60%;flex-grow:1;-webkit-flex-grow:1;}'.PHP_EOL;
$estilo.='.eldia{-webkit-flex-basis:16%flex-basis:16%;}'.PHP_EOL;
$estilo.='.mes:last-child{border-right:1px solid;}'.PHP_EOL;
$estilo.='.parrafo .annee{line-height:0.6em;}'.PHP_EOL;
$estilo.='.finde{background-color:orange;}'.PHP_EOL;
$estilo.='.elmes{background-color:#366291;color:white;text-align:center;}'.PHP_EOL;
$estilo.='.titulo{background-color:#366291;border-left:1px solid black;border-right:1px solid black;border-top:1px solid black;color:white;text-align:center;}'.PHP_EOL;
$estilo.='@media all and (max-width: 42em){.annee .mes{-webkit-flex-basis:22%!important;flex-basis:22%!important;}'.PHP_EOL;
$contenido.= $json->tabla;
$pie.="</div>".PHP_EOL;
$pie.="</body>".PHP_EOL;
$pie.="</html>".PHP_EOL;

    if (!$gestor = fopen($nombre_archivo1, 'w')) {
         echo "No se puede abrir el archivo ($nombre_archivo1)";
         exit;
    }

    if (fwrite($gestor, $contenido) === FALSE) {
        echo "No se puede escribir en el archivo ($nombre_archivo1)";
        exit;
    }

    if (!$gestor2 = fopen($nombre_archivo2, 'w')) {
         echo "No se puede abrir el archivo ($nombre_archivo2)";
         exit;
    }

    if (fwrite($gestor2, $cabecera.$contenido.$pie) === FALSE) {
        echo "No se puede escribir en el archivo ($nombre_archivo2)";
        exit;
    }

    if (!$gestor3 = fopen($nombre_archivo3, 'w')) {
         echo "No se puede abrir el archivo ($nombre_archivo3)";
         exit;
    }

    if (fwrite($gestor3, $estilo) === FALSE) {
        echo "No se puede escribir en el archivo ($nombre_archivo3)";
        exit;
    }
    echo "Horario Actualizado";

    fclose($gestor);
    fclose($gestor2);
    fclose($gestor3);
?>
