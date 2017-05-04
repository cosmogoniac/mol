<?php
$json=json_decode(file_get_contents('php://input'));
if($json=="")
	die();
file_put_contents('../videos.json',json_encode($json));
echo "Videos Actualizados";
?>
