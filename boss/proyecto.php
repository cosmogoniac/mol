<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Proyecto</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">		
	<style type="text/css">
		.logo {
			background-color: #ddd;
		    border-radius: 10px;
		    box-shadow: 1px 3px 7px black;
			color:#000;		    
		    cursor: pointer;
		    padding: 1em;
		}
		.logo.active,.logo:hover{
			color: white;
		    background-color: #c01f39;
		}
		.logos, .dos {
		    align-self: center;
		    display: flex;
		    flex-flow: row wrap;
		    justify-content: space-around;
		}

		button {
		    flex-basis: 15%;
		    order: 1;
		}
		.logos {
		    flex-basis: 67%;
		}

		li .cruz-linea, li .negrita {
		    background: white none repeat scroll 0 0;
		    border: 1px solid;
		    border-radius: 50%;
		    color: red;
		    cursor: pointer;
		    font-size: 0.7em;
		    margin-left: 1em;
		    padding:0.3em;
		}
		ul{
			position:relative;
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
		.ngta{
			font-weight: bold;
		}
		.proyecto div{
			background-color: #ddd;
			display:none;
		}
		.proyecto .active{
			display:block;
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
					<div class="logos">
						<div class="logo mejora">
							<i class="fa fa-graduation-cap"></i>
							<span>Améliorer l'Oral et L'écrit</span>
						</div>					
						<div class="logo dominar">
							<i class="fa fa-graduation-cap"></i>
							<span>Dominer l'espace</span>
						</div>

						<div class="logo desarrollo">
							<i class="fa fa-graduation-cap"></i>
							<span>Developper l'initiative et l'autonomie</span>
						</div>
						<div class="logo refuerzo">
							<i class="fa fa-graduation-cap"></i>
							<span>Renforcer la citoyenneté</span>
						</div>
					</div>	
				</div>
				<div class="proyecto">
				<?php
					@include("../proyecto.html");
				?>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		window.addEventListener("load",initia,false);



	function mostrar(evt){
		// alert("si");
		var boton=(evt.target.tagName!="DIV")?evt.target.parentNode:evt.target;
		var logo=document.querySelector(".logo.active");
		logo.className=logo.className.replace(" active","");
		var clase=boton.className.substr("logo ".length);
		boton.className=boton.className+" active";
		// alert(clase);
		var ltproy=document.querySelector(".proyecto .active");
		ltproy.className=ltproy.className.replace(" active","");
		var nwactive=document.querySelector(".proyecto ."+clase);
		nwactive.className=nwactive.className+" active";
		if(!nwactive.querySelector("p")){
			activaIndicativo(nwactive);
			marcado();
			choose();
		}
	}	

	function importar(){
		var params={'fecha':Date()};
		var r = new XMLHttpRequest();
		r.open("GET","../proyecto.html", true);
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
		var logo=document.querySelectorAll(".logo");
		for(i in logo)
			if(logo[i].tagName)
				logo[i].addEventListener("click",mostrar,false);

		var ractive=document.querySelector(".logos div");
		ractive=ractive.className.substr("logo ".length);
		var muestra=document.querySelectorAll("."+ractive);
		for(i in muestra)
			if(muestra[i].tagName){
				muestra[i].className=muestra[i].className+" active";
				if(muestra[i].parentNode.className.indexOf("proyecto")>-1)
					activaIndicativo(muestra[i]);
			}
		marcado();
		choose();
	}

	function activaIndicativo(obj){
		var ul=obj.querySelectorAll("ul");
		for(a in ul){
			if(ul[a].tagName){
				var p=document.createElement("p");
				p.textContent=ul[a].className;
				obj.insertBefore(p,ul[a]);
			}
		}
	}


	function marcado(){
		var lis=document.querySelectorAll(".container .proyecto .active li:not(.anade)");		
		for(i in lis){
			if(lis[i].tagName){
				lis[i].firstChild.contentEditable="true";
				lis[i].addEventListener("keydown",queteclaes,false);
				var cruz=document.createElement("span");
				cruz.className="cruz-linea";
				cruz.textContent="x";
				cruz.addEventListener("click",borralinea,false);
				var t=document.createElement("span");
				t.textContent="T";
				t.className="negrita";
				t.addEventListener("click",negrita,false);
				lis[i].appendChild(cruz);
				lis[i].appendChild(t);				
			}
		}
		var rutas=document.querySelectorAll(".container .proyecto .active ul");
		// var select=document.querySelector("select");
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
	if(!confirm("Estás a punto de sobreescribir el proyecto, ¿Deseas Continuar?"))return;
		var params={"tabla":document.querySelector(".container .proyecto").innerHTML};
		alert(params);
		var r = new XMLHttpRequest();
		r.open("POST","project.php", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
		r.setRequestHeader("Content-length", params.length);
		r.setRequestHeader("Connection", "close");	
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			alert(r.responseText);
		};
		r.send(JSON.stringify(params));		
}

function negrita(evt){
	var negro=evt.target.parentNode.firstElementChild;
	if(negro.className=="ngta")
		negro.className="";
	else
		negro.className="ngta";
}

function choose(){
	var rutas=document.querySelectorAll(".container .proyecto ul");
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
	// alert(evt.tagName);
	var plate = document.createElement("li");
	var span=document.createElement("span");
	span.textContent="nuevo punto";
	span.contentEditable="true";
	span.addEventListener("keydown",queteclaes,false);
	plate.appendChild(span);
	var ul;
	if(evt.tagName=="UL")
		ul=evt;
	else
		ul=evt.target.parentNode;
	var num=ul.querySelector("li.anade");
	var cruz=document.createElement("span");
	cruz.className="cruz-linea";
	cruz.textContent="x";
	cruz.addEventListener("click",borralinea,false);
	plate.appendChild(cruz);
	var t=document.createElement("span");
	t.textContent="T";
	t.className="negrita";
	t.addEventListener("click",negrita,false);
	plate.appendChild(t);
	if(evt.tagName=="UL")
		ul.appendChild(plate);
	else{
		ul.insertBefore(plate,num);
	}
}

function borraMenu(evt){
	var ul=evt.target.parentNode;
	ul.innerHTML="";
	nwLine(ul);
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
	if(tecla==13){
		evt.preventDefault();
		var anade=evt.target.parentNode.parentNode.querySelector(".anade");
		anade.click();
		anade.previousElementSibling.firstChild.textContent="";
		anade.previousElementSibling.firstChild.focus();		
	}
}

function borralinea(evt){
	evt.target.parentNode.remove();
}
	</script>
</body>
</html>