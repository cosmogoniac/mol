<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Agenda</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/agenda.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Agenda</h1>
		<section class="agenda">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="meses">
					<ul>
						<li data-mes="9">Septembre</li>
						<li data-mes="10">Octobre</li>
						<li data-mes="11">Novembre</li>
						<li data-mes="12">Décembre</li>
						<li data-mes="1">Janvier</li>
						<li data-mes="2">Février</li>
						<li data-mes="3">Mars</li>
						<li data-mes="4">Avril</li>
						<li data-mes="5">Mai</li>
						<li data-mes="6">Juin</li>
					</ul>
				</div>
				<div class="mostrar">
					<?php
						include("../agenda.html");
					?>
				</div>
			</div>
		</section>
		<?php
			include_once("../sidebar-agenda.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
	<script>
		var meses=document.querySelectorAll(".meses ul li");
		var fecha=new Date();
		var elmes=fecha.getMonth();
		var elmes=elmes+1;
		var mesLista=document.querySelector("[data-mes='"+elmes+"']");
		mesLista.className="mesActive";
		var nombreMes=limpiaCar(mesLista.textContent.toLowerCase());
		document.querySelector("div."+nombreMes).className=nombreMes+" active";
		for(i in meses)
			if(meses[i].tagName)
				meses[i].addEventListener("click",muestra,false);


		function muestra(evt){
			document.querySelector(".mostrar").scrollTop=0;
			document.querySelector(".mesActive").className="";
			evt.target.className="mesActive";
			var activo=document.querySelector(".active");
			activo.className=activo.className.replace(" active","");
			var mes=limpiaCar(evt.target.textContent.toLowerCase());
			document.querySelector("."+mes).className=mes+" active";
		}
function limpiaCar(cadena){
   var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.";
   for (var i = 0; i < specialChars.length; i++) {
       cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
   }   
   cadena = cadena.toLowerCase();
   cadena = cadena.replace(/ /g,"_");
   cadena = cadena.replace(/á/gi,"a");
   cadena = cadena.replace(/à/gi,"a");
   cadena = cadena.replace(/â/gi,"a");
   cadena = cadena.replace(/è/gi,"e");
   cadena = cadena.replace(/é/gi,"e");
   cadena = cadena.replace(/í/gi,"i");
   cadena = cadena.replace(/ó/gi,"o");
   cadena = cadena.replace(/ô/gi,"o");
   cadena = cadena.replace(/ú/gi,"u");
   cadena = cadena.replace(/ñ/gi,"n");
   return cadena;
}		
	</script>
</body>
</html>