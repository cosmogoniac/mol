<?php
session_start();
if(!isset($_SESSION['route'])){
	$rutacompleta= "http://".$_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];
	if((strpos($url,"localhost")!==false))
		$rutacompleta.=(strpos($url,"framol")===false)?"/pruebamoliere":"/framol";
	else
		$rutacompleta.=(strpos($url,"framol")===false)?"/otros/moliere":"/otros/framol";

	$_SESSION['route']=$rutacompleta;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Écrire</title>
</head>
<body>
	<div class="container">
		<button class="guardar">Ecris</button>
	<!-- <button class="limpiar">Limpiar</button> -->
	</div>

	<script>
	// var botonG=document.querySelector("button.guardar");
	// botonG.addEventListener("click",guardar,false);
	window.addEventListener("load",guardar,false);

	function guardar(){
		// if(!confirm("Estás a punto de sobreescribir, ¿Deseas Continuar?"))return;
		var params={"ecrire":1};
		var r = new XMLHttpRequest();
		r.open("POST","../leer.php", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
		r.setRequestHeader("Content-length", params.length);
		r.setRequestHeader("Connection", "close");
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			location.href="<?php echo $_SESSION['route'];?>/";
		};
		r.send(JSON.stringify(params));		
	}
	</script>
</body>
</html>