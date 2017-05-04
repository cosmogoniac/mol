<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Slider</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">
	<style type="text/css">
		.adropar {
		    flex-basis: 40%;
		    display:flex;
		    justify-content:space-around;
		}
		.col {
			border:1px solid black;
		    flex-basis: 18%;
		    height: 100vh;
			overflow:auto;
		}
		.drop{
			flex-basis:30%;
			flex-grow:1;
			border:1px solid black;
			height:100vh;
			overflow:auto;
		}
		.imagenes strong {
		    flex-basis: 2%;
		}

		.imagen {
		    flex-basis: 80%;
		}
		.imagenes {
		    margin-bottom: 0.3em;
		}
		.imagenes:hover{
			border-bottom:1px solid red;
		}
		#main, .imagenes {
		    display: flex;
		    flex-flow: row wrap;
		    justify-content: space-around;
		}

		.imagenes span {
		    background: white none repeat scroll 0 0;
		    border: 1px solid;
		    border-radius: 50%;
		    color: red;
		    cursor: pointer;
		    margin-left: 1em;
		}
		.botones button{
			display:inline-flex;
		}		
	</style>
</head>
<body>
	<div class="botones">
		<button class="guardar">guardar</button>
		<button class="importar">importar</button>
	</div>
	<div id="main">
		<div class="col dropable">
		<?php
			$images = scandir( '..' );
			unset( $images[0], $images[1] );
			// $images=sort($images);
			$a=1;
			foreach($images as $imagen)
				if(is_dir("../".$imagen)){
					echo "<div class='imagenes' id='im".(time()*rand())."'><strong></strong><div class='imagen'>$imagen</div><span>x</span></div>";
				}
		?>
		</div>
		<div class="adropar">
			<div class="drop dropable"></div>
			<div class="drop dropable"></div>
		</div>
	</div>
	<script type="text/javascript">
		document.querySelector(".guardar").addEventListener("click",guardar,false);
		document.querySelector(".importar").addEventListener("click",importar,false);
		// var cierres=document.querySelectorAll(".imagenes span");
		window.addEventListener("load",numera,false);

		function numera(k){
			var cierres=document.querySelectorAll("#main .imagenes span");
			for(i in cierres){
				if(cierres[i].tagName){
					if(k!=1)
						cierres[i].addEventListener("click",borra,false);
					if(cierres[i].parentNode.parentNode.parentNode.id=="main")
						cierres[i].parentNode.firstChild.textContent=(parseInt(i)+1)+".- ";
					elcierre=cierres[i].parentNode;
					elcierre.addEventListener("dragstart",drag,false);
					elcierre.setAttribute("draggable","true");
				}
			}
			var dropables=document.querySelectorAll(".dropable");
			for(i in dropables)
				if(dropables[i].tagName){
					dropables[i].addEventListener("dragover",allowDrop,false);
					dropables[i].addEventListener("drop",drop,false);
				}
		}

		function importar(){
			var params={'fecha':Date()};
			var r = new XMLHttpRequest();
			r.open("GET","../listadir.html", true);
			r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			r.setRequestHeader("Content-length", params.length);		
			r.setRequestHeader("Connection", "close");	
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				document.querySelector(".adropar").innerHTML=r.responseText;
				numera();
			};
			r.send(params);
		}

		function guardar(evt){
			if(!confirm("Estás a punto de sobreescribir la lista de directorios, ¿Deseas Continuar?"))return;
				var dpos=document.querySelector(".adropar");
				// if(dpos.childNodes[0].nodeName=="#text" && dpos.childNodes[0].nodeType=="3")		
				// 	dpos.childNodes[0].textContent="\t\t\t";
				// var t=document.querySelectorAll(".routes ul");
				// for(i in t)
				// 	if(t[i].tagName)
				// 		t[0].childNodes[t[0].childNodes.length-2].textContent="\n\t\t\t\t\t";		
				var params={"tabla":dpos.innerHTML};
				var r = new XMLHttpRequest();
				r.open("POST","listadir.php", true);
				r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
				r.setRequestHeader("Content-length", params.length);
				r.setRequestHeader("Connection", "close");	
				r.onreadystatechange = function () {
					if (r.readyState != 4 || r.status != 200) return;
					alert(r.responseText);
				};
				r.send(JSON.stringify(params));		
		}

		function drag(evt){
			evt.dataTransfer.setData("text", evt.target.id);
		}

		function drop(evt) {
		    evt.preventDefault();
		    var data = evt.dataTransfer.getData("text");
		    if(evt.target.className!="imagenes")
		    	evt.target.appendChild(document.getElementById(data));
		    else
		    	evt.target.parentNode.insertBefore(data,evt.target.parentNode);
		}

		function borra(evt){
			evt.target.parentNode.remove();
			numera(1);
		}

		function allowDrop(evt) {
	    evt.preventDefault();
	    console.log(evt.target.className);
	    if (evt.target.className.indexOf("dropable")>-1 || evt.target.className.indexOf("imagenes")>-1 )
	        evt.dataTransfer.dropEffect = "all"; 
	    else
	        evt.dataTransfer.dropEffect = "none"; 
		}

	</script>
</body>
</html>