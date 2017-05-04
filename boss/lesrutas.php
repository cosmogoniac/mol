<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Rutas</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">		
	<style type="text/css">
		.buslogo {
			background-color: #ddd;
		    border-radius: 10px;
		    box-shadow: 1px 3px 7px black;
			color:#000;		    
		    cursor: pointer;
		    padding: 1em;
		}
		.buslogo:hover{
			color: white;
		    background-color: #c01f39;
		}
		.logosyrutas, .dos {
		    align-self: center;
		    display: flex;
		    flex-flow: row wrap;
		    justify-content: space-around;
		}

		button {
		    flex-basis: 15%;
		    order: 1;
		}
		.logosyrutas {
		    flex-basis: 67%;
		}

		li .cruz-linea {
		    background: white none repeat scroll 0 0;
		    border: 1px solid;
		    border-radius: 50%;
		    color: red;
		    cursor: pointer;
		    font-size: 0.7em;
		    margin-left: 1em;
		    padding:0.3em;
		}

		.bus .buslogo {
		    align-self: start;
		    flex-basis: 20%;
			-webkit-transition: all 0.5s ease-in-out 0s;
			transition: all 0.5s ease-in-out 0s;			    
		}
		.bus:hover .buslogo,.bus.active .buslogo{
			color: white;
		    background-color: #c01f39;
		}
		.lit{
			font-weight: bold;
		}
		.rutas{
			display:none;
			position: relative;
		}
		.rutas.active{
			display:block;
			margin:0;
		}
		.rutas li strong{
			margin-right:0.5em;
		}
		.rutas li strong {
		    margin-right: 0.5em;
		}
		.rutasBloque {
		    padding: 0 4em;
		}		
		.cruz-menu {
		    border: 1px solid red;
		    color: red;
		    cursor: pointer;
		    left: 0;
		    position: absolute;
		    top: 0;
		}
		.anade {
		    border: 1px solid red;
		    cursor: pointer;
		    list-style: outside none none;
		    width: 63px;
		}
		.mananas,.tardes{
			background-color: #ddd;
		}
	</style>
</head>
<body>
	<div id="main">
		<?php
			include_once("nav.php");
		?>
		<section>
			<div class="container">
				<div class="dos">
					<div class="botones">
						<button class="importar">Importar</button>
						<button class="guardar">Guardar</button>
					</div>
					<div class="logosyrutas">
						<div class="bus ruta1">
							<div class="buslogo ruta1">
								<i class="fa fa-bus"></i>
								<span>Ruta 1</span>
							</div>					
						</div>
						<div class="bus ruta2">
							<div class="buslogo ruta2">
								<i class="fa fa-bus"></i>
								<span>Ruta 2</span>
							</div>

						</div>
						<div class="bus ruta3">
							<div class="buslogo ruta3">
								<i class="fa fa-bus"></i>
								<span>Ruta 3</span>
							</div>
						</div>
						<div class="bus ruta4">
							<div class="buslogo ruta4">
								<i class="fa fa-bus"></i>
								<span>Ruta 4</span>
							</div>
						</div>
					</div>	
				</div>
				<div class="routes">
					<div class="rutasBloque">
				<?php
					@include("../rutas.html");
				?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		window.addEventListener("load",initia,false);

		var rutas=document.querySelectorAll(".buslogo");
		for(i in rutas)
			if(rutas[i].tagName)
				rutas[i].addEventListener("click",mostrar,false);

		var ractive=document.querySelectorAll(".ruta1");
		for(i in ractive)
			if(ractive[i].tagName)
				ractive[i].className=ractive[i].className+" active";

	function mostrar(evt){
		var boton=(evt.target.tagName!="DIV")?evt.target.parentNode:evt.target;
		var ruta=boton.querySelector("span").textContent.replace(" ","").toLowerCase();
		var busactive=document.querySelector(".bus.active");
		busactive.className=busactive.className.replace(" active","");
		var boton2=document.querySelector(".buslogo.active");
		boton2.className=boton2.className.replace(" active","");
		boton.className=boton.className+" active";
		boton.parentNode.className=boton.parentNode.className+" active";
		var tactivo=document.querySelectorAll(".rutas.active");

		for(i in tactivo)
			if(tactivo[i].tagName){
				tactivo[i].className=tactivo[i].className.replace(" active","");
			}

		// alert(".mananas .rutas."+ruta);
		var texto=document.querySelector(".mananas .rutas."+ruta);
		texto.className=texto.className+" active";
		texto=document.querySelector(".tardes .rutas."+ruta);
		texto.className=texto.className+" active";
	}	

	function importar(){
		var params={'fecha':Date()};
		var r = new XMLHttpRequest();
		r.open("GET","../rutas.html", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		r.setRequestHeader("Content-length", params.length);		
		r.setRequestHeader("Connection", "close");	
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			document.querySelector(".rutasBloque").innerHTML=r.responseText;
			var ractive=document.querySelectorAll(".ruta1");
			for(i in ractive)
				if(ractive[i].tagName)
					ractive[i].className=ractive[i].className+" active";			
			marcado();
			choose();
		};
		r.send(params);
	}

	function initia(){
		document.querySelector("button.guardar").addEventListener("click",guardar,false);
		document.querySelector("button.importar").addEventListener("click",importar,false);
		marcado();
		choose();
	}

	function marcado(){
		var lis=document.querySelectorAll(".rutas li");		
		for(i in lis){
			if(lis[i].tagName){
				lis[i].firstChild.contentEditable="true";
				lis[i].addEventListener("keydown",queteclaes,false);
				var cruz=document.createElement("span");
				cruz.className="cruz-linea";
				cruz.textContent="x";
				cruz.addEventListener("click",borralinea,false);
				lis[i].appendChild(cruz);
			}
		}
		var rutas=document.querySelectorAll(".rutas");
		var select=document.querySelector("select");
		// var dia=document.querySelectorAll(".menu .dia");
		for(a in rutas)
			if(rutas[a].tagName){
				var span=document.createElement("span");
				span.className="cruz-menu";
				span.textContent="x";
				span.addEventListener("click",borraMenu,false);
				rutas[a].appendChild(span);
			}		
	}



function guardar(evt){
	if(!confirm("Estás a punto de sobreescribir las rutas, ¿Deseas Continuar?"))return;
		var params={"tabla":document.querySelector(".rutasBloque").innerHTML};
		var r = new XMLHttpRequest();
		r.open("POST","routes.php", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
		r.setRequestHeader("Content-length", params.length);
		r.setRequestHeader("Connection", "close");	
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			alert(r.responseText);
		};
		r.send(JSON.stringify(params));		
}



function choose(){
	var rutas=document.querySelectorAll(".rutas");
	if(rutas[0] && rutas[0].querySelector(".anade"))
		return;
	for(i in rutas)
		if(rutas[i].tagName){
			// rutas[i].dataset.menunum=menus[i].firstElementChild.firstChild.textContent;
			// var men=rutas[i].querySelector("ul");
			var plate = document.createElement("li");
			plate.textContent = "Add Line";
			plate.className="anade";
			plate.addEventListener("click",nwLine,false);
			rutas[i].appendChild(plate);
		}
}



function nwLine(evt){
	var plate = document.createElement("li");
	var strong=document.createElement("strong");
	strong.textContent="8:00";
	var literal=document.createTextNode("parada nueva");
	plate.appendChild(strong);
	plate.appendChild(literal);
	plate.contentEditable="true";
	plate.addEventListener("keydown",queteclaes,false);
	var ul=evt.target.parentNode;
	var num=ul.querySelector("li.anade");
	var cruz=document.createElement("span");
	cruz.className="cruz-linea";
	cruz.textContent="x";
	cruz.addEventListener("click",borralinea,false);
	plate.appendChild(cruz);
	ul.insertBefore(plate,num);
}

function borraMenu(evt){
	var ul=evt.target.parentNode;
	ul.innerHTML="";
	var plate = document.createElement("li");
	var strong=document.createElement("strong");
	strong.textContent="8:00";
	var literal=document.createTextNode("parada nueva");
	plate.appendChild(strong);
	plate.appendChild(literal);
	// plate.textContent="escribe el nuevo plato";
	plate.contentEditable="true";
	plate.addEventListener("keydown",queteclaes,false);
	var cruz=document.createElement("span");
	cruz.className="cruz-linea";
	cruz.textContent="x";
	cruz.addEventListener("click",borralinea,false);
	plate.appendChild(cruz);
	ul.appendChild(plate);
	// var ul=evt.target.parentNode;
	var plata = document.createElement("li");
	plata.textContent = "Add Line";
	plata.className="anade";
	plata.addEventListener("click",nwLine,false);
	ul.appendChild(plata);
	var span=document.createElement("span");
	span.className="cruz-menu";
	span.textContent="x";
	span.addEventListener("click",borraMenu,false);
	ul.appendChild(span);
}

function queteclaes(evt){
	var ev = (evt) ? evt : event;
	try{
		var tecla=(ev.which) ? ev.which:event.keyCode;
	}catch(e){
		return;
	}
	if(tecla==13)
		evt.preventDefault();
}

function borralinea(evt){
	evt.target.parentNode.remove();
}
	</script>
</body>
</html>