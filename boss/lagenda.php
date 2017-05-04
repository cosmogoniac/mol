<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Agenda</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">		
	<style type="text/css">
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
			.mesos ul {
			    display: flex;
			    justify-content: space-around;
			    list-style: outside none none;
			}

			.mesos li.active,.mesos li:hover{
				background-color: rgb(188,38,62);
			    color:white;
			    cursor:pointer;
			}
			.mesos li {
				background-color: #eee;
			    border: 1px solid;
			    color:black;
			    flex-basis: 60px;
			    padding: 0.3em;
			    text-align: center;
			}
			.mostrar div{
				display:none;
				position: relative;
			}
			.mostrar div.active{
				display:block;
			}
			.mostrar ul{
				list-style: inside;
			}
			.mostrar li{
				list-style: none;
			}
			.mostrar .tit{
				font-weight:bold;
			}
			.mostrar li{
				margin-left:0.4em;
			}
			.cruz-menu,.cruz-linea,.titulos,.inside {
			    border: 1px solid;
			    color: grey;
			    cursor:pointer;
			    font-size: 0.6em;
			    margin-left: 1em;
			    padding: 0.1em;
			}
			.cruz-linea,.titulos,.inside {
				background-color: white;
				border: 1px solid;
				border-radius: 50%;
				color: rgb(188,38,62);
				cursor: pointer;
				font-size: 0.7em;
				margin-left: 1em;
				padding:0.3em;
			}

			.cruz-menu {
				background-color: white;
				color: rgb(188,38,62);
				left: 0;
				position: absolute;
				top: 0;
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
					<div class="mesos">
					</div>
					<div class="mostrar">
					<?php
						include("../agenda.html");
					?>					
					</div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		window.addEventListener("load",initia,false);

	function importar(){
		var params={'fecha':Date()};
		var r = new XMLHttpRequest();
		r.open("GET","../agenda.html", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		r.setRequestHeader("Content-length", params.length);		
		r.setRequestHeader("Connection", "close");	
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			document.querySelector(".mostrar").innerHTML=r.responseText;
			var clase=document.querySelectorAll("[data-mesnum='"+new Date().getMonth()+"']");
			for(i in clase)
				if(clase[i].tagName)
						clase[i].className=clase[i].className+" active";
			marcado();
			choose();
		};
		r.send(params);
	}

	function initia(){
		document.querySelector("button.guardar").addEventListener("click",guardar,false);
		document.querySelector("button.importar").addEventListener("click",importar,false);
		var annee=[
		{"moisnum":"8","moisnom":"Septembre"},
		{"moisnum":"9","moisnom":"Octobre"},
		{"moisnum":"10","moisnom":"Novembre"},
		{"moisnum":"11","moisnom":"Décembre"},
		{"moisnum":"0","moisnom":"Janvier"},
		{"moisnum":"1","moisnom":"Février"},
		{"moisnum":"2","moisnom":"Mars"},
		{"moisnum":"3","moisnom":"Avril"},
		{"moisnum":"4","moisnom":"Mai"},
		{"moisnum":"5","moisnom":"Juin"}
		];

		var ul=document.createElement("ul");
		for(i in annee){
			var li=document.createElement("li");
			li.textContent=annee[i].moisnom;
			li.setAttribute("data-mesnum",annee[i].moisnum);
			li.addEventListener("click",muestra,false);
			ul.appendChild(li);
		}
		document.querySelector(".mesos").appendChild(ul);

		var clase=document.querySelectorAll("[data-mesnum='"+new Date().getMonth()+"']");
		for(i in clase)
			if(clase[i].tagName)
					clase[i].className=clase[i].className+" active";
		marcado();
		choose();
	}

	function muestra(evt){
		var t=evt.target.parentNode.querySelector(".active");
		t.className="";
		evt.target.className=" active";
		var clase=document.querySelector(".mostrar .active");
		clase.className=clase.className.replace(" active","");
		// console.log(clase);
		var nwclass=document.querySelector(".mostrar [data-mesnum='"+evt.target.getAttribute("data-mesnum"));
		nwclass.className=nwclass.className+" active";
	}

	function marcado(){
		var lis=document.querySelectorAll(".mostrar li");		
		for(i in lis){
			if(lis[i].tagName){
				lis[i].firstChild.contentEditable="true";
				lis[i].firstChild.addEventListener("keydown",queteclaes,false);
				var cruz=document.createElement("span");
				var tit=document.createElement("span");
				var inside=document.createElement("span");
				inside.textContent="I";
				inside.className="inside";
				inside.addEventListener("click",insides,false);
				lis[i].appendChild(inside);
				tit.className="titulos";
				tit.textContent="T";
				tit.addEventListener("click",marcaTit,false);
				cruz.className="cruz-linea";
				cruz.textContent="x";
				cruz.addEventListener("click",borralinea,false);
				lis[i].appendChild(cruz);
				lis[i].appendChild(tit);
			}
		}
		var rutas=document.querySelectorAll(".mostrar div");
		for(a in rutas)
			if(rutas[a].tagName){
				var span=document.createElement("span");
				span.className="cruz-menu";
				span.textContent="x";
				span.addEventListener("click",borraMenu,false);
				rutas[a].appendChild(span);
			}		
	}

	function marcaTit(evt){
		// alert(evt.target.parentNode.firstChild.className);
		if(evt.target.parentNode.firstChild.className=="tit")
			evt.target.parentNode.firstChild.className="";
		else
			evt.target.parentNode.firstChild.className="tit";
	}

function insides(evt){
	var ul=document.createElement("ul");
	evt.target.parentNode.appendChild(ul);
	choose();
	var anade=evt.target.parentNode.querySelector(".anade");
	anade.click();	
}

function guardar(evt){
	if(!confirm("Estás a punto de sobreescribir la agenda ¿Deseas Continuar?"))return;
		var dpos=document.querySelector(".mostrar");
		if(dpos.childNodes[0].nodeName=="#text" && dpos.childNodes[0].nodeType=="3")		
			dpos.childNodes[0].textContent="\t";
		var t=document.querySelectorAll(".mostrar ul");
		for(i in t)
			if(t[i].tagName)
				t[0].childNodes[t[0].childNodes.length-2].textContent="\n\t\t\t";		
		var params={"tabla":dpos.innerHTML};
		var r = new XMLHttpRequest();
		r.open("POST","savegenda.php", true);
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
	var rutas=document.querySelectorAll(".mostrar ul");
	// if(rutas[0] && rutas[0].querySelector(".anade"))
	// 	return;
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
	literal.textContent="Actividad";
	literal.contentEditable="true";
	literal.addEventListener("keydown",queteclaes,false);
	plate.appendChild(literal);
	var ul=evt.target.parentNode;
	var num=ul.querySelector("li.anade");
	var cruz=document.createElement("span");
	var t=document.createElement("span");
	t.className="titulos";
	t.textContent="T";
	t.addEventListener("click",marcaTit,false);
	cruz.className="cruz-linea";
	cruz.textContent="x";
	cruz.addEventListener("click",borralinea,false);
	var inside=document.createElement("span");
	inside.className="inside";
	inside.textContent="I";
	inside.addEventListener("click",insides,false);
	plate.appendChild(inside);	
	plate.appendChild(cruz);
	plate.appendChild(t);
	if(ul.className=="agregado"){
		ul.insertBefore(plate,num);
		ul.insertBefore(document.createTextNode('\n\t\t\t'),num);
	}else{
		ul.insertBefore(document.createTextNode('\t'),num);
		ul.insertBefore(plate,num);
		ul.className="agregado";
		ul.insertBefore(document.createTextNode('\t\n\t\t\t'),num);
	}
}

function borraMenu(evt){
	var div=evt.target.parentNode;
	div.innerHTML="";
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
	if(tecla==13){
		evt.preventDefault();
		var anade=evt.target.parentNode.parentNode.querySelector(".anade");
		anade.click();
		anade.previousElementSibling.firstChild.textContent="";
		anade.previousElementSibling.firstChild.focus();	
	}
}

function borralinea(evt){
	if(evt.target.parentNode.parentNode.children.length==2 && evt.target.parentNode.parentNode.lastChild.className=="anade"){
		evt.target.parentNode.parentNode.remove();
		return;
	}
	if(evt.target.parentNode.nextSibling.nodeName=="#text" && evt.target.parentNode.nextSibling.nodeType=="3")
		evt.target.parentNode.nextSibling.remove();
	evt.target.parentNode.remove();
}
	</script>
</body>
</html>