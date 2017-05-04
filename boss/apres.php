<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Después del Molière</title>
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
		.biparrafo{
			display:none;
			position:relative;
		}
		.biparrafo.active {
		    display: flex;
		    flex-flow: row wrap;
		    justify-content: space-around;
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
		    right: 0;
		    position: absolute;
		    top: 0;
		}
		.anade {
		    background-color: #999;
		    border: 1px solid red;
		    color: white;
		    cursor: pointer;
		    list-style: outside none none;
		    margin-top: 1em;
		    padding: 0.4em;
			-webkit-transition: all 0.2s ease-in-out 0s;
			transition: all 0.2s ease-in-out 0s;			    
		    width: 63px;
		}
		.anade:hover{
			background-color: #666;
			color:#c01f39;
			text-shadow:1px 1px 1px black;
		}
		.parrafo {
		    background-color: #eee;
		    margin-top: 1em;
		    position: relative;
		}

		.parrafo p {
		    background-color: #ddd;
		    font-weight: bold;
		    margin: auto;
		    text-align: center;
		}
		.parrafo > ul {
		    margin: 0;
		}		
	</style>
</head>
<body>
	<div id="main">
		<?php
			include("nav.php");
		?>
		<section>
			<div class="container">
				<div class="dos">
					<div class="botones">
						<button class="importar">Importar</button>
						<button class="guardar">Guardar</button>
					</div>
					<div class="logosyrutas">
						<div class="bus ciencias">
							<div class="buslogo ciencias">
								<i class="fa fa-cogs"></i>
								<span>Bachiller de Ciencias</span>
							</div>					
						</div>
						<div class="bus esocial">
							<div class="buslogo esocial">
								<i class="fa fa-cogs"></i>
								<span>Bachiller Económico y Social</span>
							</div>

						</div>
						<div class="bus letras">
							<div class="buslogo letras">
								<i class="fa fa-cogs"></i>
								<span>Bachiller de Letras</span>
							</div>
						</div>
					</div>	
				</div>
				<div class="routes">
					<div class="after">
				<?php
					@include("../tras.html");
				?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		window.addEventListener("load",initia,false);



	function mostrar(evt){
		var boton=(evt.target.tagName!="DIV")?evt.target.parentNode:evt.target;
		var ruta;
		if(boton.className.indexOf("buslogo")>-1){
			var t=boton.className.replace(" active","");
			ruta=t.substr(t.indexOf(" ")+1);
		}
		var busactive=document.querySelector(".bus.active");
		busactive.className=busactive.className.replace(" active","");
		var boton2=document.querySelector(".buslogo.active");
		boton2.className=boton2.className.replace(" active","");
		boton.className=boton.className+" active";
		boton.parentNode.className=boton.parentNode.className+" active";
		var tactivo=document.querySelectorAll(".biparrafo.active");

		for(i in tactivo)
			if(tactivo[i].tagName){
				tactivo[i].className=tactivo[i].className.replace(" active","");
			}

		var texto=document.querySelector(".biparrafo."+ruta);
		texto.className=texto.className+" active";
	}	

	function importar(){
		var params={'fecha':Date()};
		var r = new XMLHttpRequest();
		r.open("GET","../tras.html", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		r.setRequestHeader("Content-length", params.length);		
		r.setRequestHeader("Connection", "close");	
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			document.querySelector(".routes .after").innerHTML=r.responseText;
			var ractive=document.querySelector(".biparrafo.ciencias");
			ractive.className=ractive.className+" active"
			marcado();
			choose();
		};
		r.send(params);
	}

	function initia(){
		document.querySelector("button.guardar").addEventListener("click",guardar,false);
		document.querySelector("button.importar").addEventListener("click",importar,false);
		var rutas=document.querySelectorAll(".buslogo");
		for(i in rutas)
			if(rutas[i].tagName)
				rutas[i].addEventListener("click",mostrar,false);

		var ractive=document.querySelectorAll(".ciencias");
		for(i in ractive)
			if(ractive[i].tagName)
				ractive[i].className=ractive[i].className+" active";		
		marcado();
		choose();
	}

	function marcado(){
		var lis=document.querySelectorAll(".biparrafo li,.biparrafo p");		
		for(i in lis){
			if(lis[i].tagName){
				if(lis[i].tagName=="P"){
					lis[i].contentEditable="true";
					lis[i].addEventListener("keydown",queteclaes,false);
				}else{
					lis[i].firstChild.contentEditable="true";
					lis[i].firstChild.addEventListener("keydown",queteclaes,false);
					var cruz=document.createElement("span");
					cruz.className="cruz-linea";
					cruz.textContent="x";
					cruz.addEventListener("click",borralinea,false);
					lis[i].appendChild(cruz);
				}
			}
		}
		var rutas=document.querySelectorAll(".biparrafo .parrafo");
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
		var dpos=document.querySelector(".after");
		if(dpos.childNodes[0].nodeName=="#text" && dpos.childNodes[0].nodeType=="3")		
			dpos.childNodes[0].textContent="\t\t\t";
		var t=document.querySelectorAll(".routes ul");
		for(i in t)
			if(t[i].tagName)
				t[0].childNodes[t[0].childNodes.length-2].textContent="\n\t\t\t\t\t";		
		var params={"tabla":dpos.innerHTML};
		var r = new XMLHttpRequest();
		r.open("POST","despues.php", true);
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
	var rutas=document.querySelectorAll(".parrafo ul");
	if(rutas[0] && rutas[0].querySelector(".anade"))
		return;
	for(i in rutas)
		if(rutas[i].tagName){
			if(!rutas[i].querySelector(".anade")){
				var plate = document.createElement("li");
				plate.textContent = "Add Line";
				plate.className="anade";
				plate.addEventListener("click",nwLine,false);
				rutas[i].appendChild(plate);
			}
		}
}


function nwLine(evt){
	var plate = document.createElement("li");
	var literal=document.createElement("span");
	literal.textContent="Opción Elegida, Ciudad. [NºOp.]";
	literal.contentEditable="true";
	literal.addEventListener("keydown",queteclaes,false);
	plate.appendChild(literal);
	var ul=evt.target.parentNode;
	var num=ul.querySelector("li.anade");
	var cruz=document.createElement("span");
	cruz.className="cruz-linea";
	cruz.textContent="x";
	cruz.addEventListener("click",borralinea,false);
	plate.appendChild(cruz);
	if(ul.className=="agregado"){
		ul.insertBefore(plate,num);
		ul.insertBefore(document.createTextNode('\n\t\t\t\t\t\t'),num);
	}else{
		ul.insertBefore(document.createTextNode('\t'),num);
		ul.insertBefore(plate,num);
		ul.className="agregado";
		ul.insertBefore(document.createTextNode('\t\n\t\t\t\t\t\t'),num);
	}
}

function borraMenu(evt){
	var div=evt.target.parentNode;
	div.innerHTML="";
	var p=document.createElement("p");
	p.textContent="2010-2010";
	p.contentEditable="true";
	div.appendChild(p);
	var ul=document.createElement("ul");
	div.appendChild(ul);
	choose();
	div.lastChild.firstChild.click();
	var span=document.createElement("span");
	span.className="cruz-menu";
	span.textContent="x";
	span.addEventListener("click",borraMenu,false);
	div.appendChild(span);
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
	if(evt.target.parentNode.nextSibling.nodeName=="#text" && evt.target.parentNode.nextSibling.nodeType=="3")
		evt.target.parentNode.nextSibling.remove();
	evt.target.parentNode.remove();
}
	</script>
</body>
</html>