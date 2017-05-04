<?php
$json=json_decode(file_get_contents('php://input'));
$contenido= $json->banda;
$contenido=str_replace(" contenteditable=\"true\"", "", $contenido);

$nombre_archivo1 = '../banda.html';
if (!$gestor = fopen($nombre_archivo1, 'w')) {
     echo "No se puede abrir el archivo ($nombre_archivo1)";
     exit;
}

if (fwrite($gestor, trim($contenido)) === FALSE) {
    echo "No se puede escribir en el archivo ($nombre_archivo1)";
    exit;
}

echo "Banda Actualizada";

fclose($gestor);
?>
