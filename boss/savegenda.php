﻿<?php
$json=json_decode(file_get_contents('php://input'));
$contenido= $json->tabla;
$contenido=str_replace(" contenteditable=\"true\"", "", $contenido);
// $contenido=preg_replace('/ data-menunum="[0-9]+"/',"",$contenido);
$contenido=preg_replace('/ activo/',"",$contenido);
$contenido=preg_replace('/ active/',"",$contenido);
// $contenido=preg_replace('/class="aniade"/',"",$contenido);
$contenido=preg_replace('/\<span class="cruz-menu">x<\/span>/',"",$contenido);
$contenido=preg_replace('/\<span class="cruz-linea">x<\/span>/',"",$contenido);
$contenido=preg_replace('/\<span class="inside">I<\/span>/',"",$contenido);
$contenido=preg_replace('/\<span class="titulos">T<\/span>/',"",$contenido);
$contenido=preg_replace('/\class="agregado"/',"",$contenido);

$contenido=preg_replace('/\<li class="anade">Add Line<\/li>/',"",$contenido);
// $contenido=preg_replace('/<span class="cruz-menu">x</span>/',"",$contenido);

// $contenido=preg_replace('/>/',">\n\r",$contenido);

$nombre_archivo1 = '../agenda.html';
    if (!$gestor = fopen($nombre_archivo1, 'w')) {
         echo "No se puede abrir el archivo ($nombre_archivo1)";
         exit;
    }

    if (fwrite($gestor, $contenido) === FALSE) {
        echo "No se puede escribir en el archivo ($nombre_archivo1)";
        exit;
    }

    echo $contenido;

    fclose($gestor);
?>
