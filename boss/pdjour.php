<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>menu</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">	
	<link rel="stylesheet" href="../css/calendrier.css">
	<style type="text/css">
		.botones {
		    display: flex;
		    justify-content: flex-end;
		}
		.botones button{
			order:1;
		}
		.elmes{
			cursor: pointer;
		}
		.teldia{
			background-color: #c01f39;
			color:white;
		}
		.hab .last:hover {
		    background-color: #c01f39;
		}
		.hab .last:hover::before {
			color:white;
		    content: "...pulsa...";
		    padding-left:2em;
		}		
		.mois{display:none;}
		.menu
		{
		  -webkit-transition: all 0.5s ease;
		  transition: all 0.5s ease;			
			opacity:0;
			position:absolute;
			margin-top:4em;
			z-index:0;
		}
		.menu.active{
			display:block;
			margin-top:0;
			opacity:1;
			z-index:1;
		}
		.menu:nth-child(odd){
			align-self:flex-start;
		}

		.cruz-menu,.cruz-linea {
		    border: 1px solid;
		    color: grey;
		    cursor:pointer;
		    font-size: 0.6em;
		    margin-left: 1em;
		    padding: 0.1em;
		}
		.annee{
			flex-grow:1;
		}
		.anade{
			list-style: none;
			border:1px solid;
			cursor:pointer;
		    display: inline;
		    line-height: 3em;
		    padding: 0.2em;			
		}

		.dosbloques {
		    align-content: flex-start;
		    display: flex;
		}

		.dosbloques .lesmenus {
		    flex-basis: 0;
		    flex-flow: row wrap;
		    padding-left:10%;		    
		}

		.mes.activo {
		    border-left: 1px solid;
		    display: block;
		    font-size:1em;
		    flex-grow: 1;
		}
		.mes.oculto{
			font-size:0.8em;
			display: none;
		}
		.mois.activo{
			display:block;
		}
		.last{cursor:pointer;}
		.lit{font-weight: bold;}
		select {
		    background-color: beige;
		    display: block;
		    text-align: right;
		    width: 10%;
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

				<!-- <div class="titulo">Menu Scolaire</div> -->
				<div class="dosbloques">
					<div class="lesmenus">
				<?php
						// @include("manu.html");
						@include("../menu.html");
				?>
					</div>
					<div class="annee">
			<?php
						@include("../horarios.html");
			?>
					</div>
				</div>
			</div>
			<div class="botones">
				<button class="guardar">Guardar</button>
				<select></select>
			</div>			
		</section>
	</div>			

	<script type="text/javascript">
		var lesmoischoisir={8:'septembre',9:'octobre',10:'novembre',11:'décemebre',0:'janvier',1:'février',2:'mars',3:'avril',4:'mai',5:'juin'};
		window.addEventListener("load",initia,false);

	function initia(){
		var lis=document.querySelectorAll(".lesmenus li");
		document.querySelector("button.guardar").addEventListener("click",guardar,false);
		for(i in lis){
			if(lis[i].tagName){
				lis[i].firstChild.contentEditable="true";
				lis[i].firstChild.addEventListener("keydown",queteclaes,false);
				var cruz=document.createElement("span");
				cruz.className="cruz-linea";
				cruz.textContent="x";
				cruz.addEventListener("click",borralinea,false);
				lis[i].appendChild(cruz);
			}
		}
		var menus=document.querySelectorAll(".menu");
		var select=document.querySelector("select");
		var dia=document.querySelectorAll(".menu .dia");
		for(a in dia)
			if(dia[a].tagName){
				var span=document.createElement("span");
				span.className="cruz-menu";
				span.textContent="x";
				span.addEventListener("click",borraMenu,false);
				dia[a].appendChild(span);
			}
			var meses=document.querySelectorAll(".elmes");
			for(i in meses)
				if(meses[i].tagName)
					meses[i].addEventListener("click",mes,false);			
	}


function guardar(evt){
	if(!confirm("Estás a punto de sobreescribir los menús, ¿Deseas Continuar?"))return;
		if(document.querySelector(".teldia"))
			document.querySelector(".teldia").className="";
		var lesmenus=document.querySelector(".lesmenus");
		if(lesmenus.childNodes[0].nodeName=="#text" && lesmenus.childNodes[0].nodeType=="3")		
			lesmenus.childNodes[0].textContent="";
		var t=document.querySelectorAll(".menu.active ul");
		for(i in t)
			if(t[i].tagName)
				t[0].childNodes[t[0].childNodes.length-2].textContent="\n\t\t";

		var params={"tabla":lesmenus.innerHTML};
		var r = new XMLHttpRequest();
		r.open("POST","menus.php", true);
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
	var menus=document.querySelectorAll(".mois.activo .menu");
	if(menus[0] && menus[0].querySelector(".anade"))
		return;
	document.querySelector(".mes.activo .dia.hab").firstElementChild.className="teldia";
	for(i in menus)
		if(menus[i].tagName){
			menus[i].dataset.menunum=menus[i].firstElementChild.firstChild.textContent;
			var men=menus[i].querySelector("ul");
			var plate = document.createElement("li");
			plate.textContent = "Add Line";
			plate.className="anade";
			plate.addEventListener("click",nwLine,false);
			men.appendChild(plate);
		}
}

function verAnyo(evt){
	touteannee("");
	var select=document.querySelector("select");
	if(document.querySelector(".activo"))
		document.querySelector(".activo").className=document.querySelector(".activo").className.replace(" activo","");
	if(document.querySelector(".menu.active")){
		document.querySelector(".menu.active").className="menu";
	}
	select.innerHTML="";
}

function touteannee(activo){
	var meses=document.querySelectorAll(".mes");
	if(document.querySelector(".teldia"))
	document.querySelector(".teldia").className="";
		for(a in meses)
		if(meses[a].tagName)
			meses[a].className="mes "+activo;
}
		
function sinoesactivo(month){
	var lesmenus=document.querySelector(".lesmenus");
	var nwmonth=document.createElement("div");
	nwmonth.className="mois";
	if(month==0)
		month=0;
	nwmonth.dataset.moisnum=month;
	var nmnwmth=document.createElement("div");
	nmnwmth.className="litermes";
	nmnwmth.textContent=lesmoischoisir[month];
	nwmonth.appendChild(document.createTextNode('\n\t'));//salto del nombre del mes
	nwmonth.appendChild(nmnwmth);
	// nwmonth.appendChild(document.createTextNode('\n'));//salto del nombre del mes
	// alert(nwmonth.dataset.moisnum);
	var dias=document.querySelectorAll(".mes.activo .dia .last:not(.festivo)");
	// document.querySelector(".mois[moisnum='"+month+"']").className="mois active";
	// console.log("--->"+dias.length);
	var select=document.querySelector("select");
	select.innerHTML="";
	for(i in dias){
		if(dias[i].tagName){
			//crea el menumes
			var menu=document.createElement("div");
			// menu.appendChild(document.createTextNode('\n'));//aqui no
			var diacon=dias[i].parentNode.firstElementChild.textContent;
			menu.className="menu";
			menu.dataset.menunum=diacon;
			var tsjours=document.createElement("div");
			tsjours.className="dia";
			tsjours.textContent=diacon;
			var cruzmenu=document.createElement("span");
			cruzmenu.textContent="x";
			cruzmenu.className="cruz-menu";
			cruzmenu.addEventListener("click",borraMenu,false);
			// tsjours.appendChild(document.createTextNode('\n'));//aqui no
			tsjours.appendChild(cruzmenu);
			// tsjours.appendChild(document.createTextNode('\n'));//aqui no
			var span=document.createElement("span");
			span.className="cruz-linea";
			span.textContent="x";
			span.addEventListener("click",borralinea,false);
			menu.appendChild(document.createTextNode('\n\t\t'));
			menu.appendChild(tsjours);
			menu.appendChild(document.createTextNode('\n\t\t'));
			var ul=document.createElement("ul");
			var plate = document.createElement("li");
			var edita=document.createElement("span");
			edita.textContent="escribe el nuevo plato";
			edita.contentEditable="true";
			edita.addEventListener("keydown",queteclaes,false);
			plate.appendChild(edita);
			plate.appendChild(span);
			ul.appendChild(document.createTextNode('\n\t\t\t'));
			ul.appendChild(plate);
			ul.appendChild(document.createTextNode('\n\t\t'));
			var li=document.createElement("li");
			li.className="anade";
			li.textContent="Add Line";
			li.addEventListener("click",nwLine,false);
			ul.appendChild(li);
			// ul.appendChild(document.createTextNode('\n'));
			menu.appendChild(ul);
			menu.appendChild(document.createTextNode('\n\t'));
			nwmonth.appendChild(document.createTextNode('\n\t'));
			nwmonth.appendChild(menu);
			// nwmonth.appendChild(document.createTextNode('\n\t'));
			if(i==0)
				lesmenus.appendChild(document.createTextNode('\n'));
			lesmenus.appendChild(nwmonth);
		}
	}
				// lesmenus.appendChild(document.createTextNode('\n'));

	select.addEventListener("change",texto,false);
	document.querySelector(".mois[data-moisnum='"+month+"']").className="mois activo";
	var mesmen=document.querySelector(".mois[data-moisnum='"+month+"'] .menu");
	mesmen.className=mesmen.className+" active";
	console.log(mesmen.className);
}

function activamenus(evt){
	//activa el mes de los menús
	var dub=evt.target.parentNode;
	var elmes=dub.getAttribute("data-mesnum");
	// alert(elmes);
	var activalo=document.querySelector("[data-moisnum='"+elmes+"']");
	if(activalo){
		activalo.className=activalo.className+" activo";
		//activa el menu del primer día
		activalo.querySelector(".menu").className=activalo.querySelector(".menu").className+" active";
	}else{
		dub.className="mes activo";
		var menumes=document.querySelector("[data-moisnum='"+elmes+"']");
		// alert(!menumes);
		// menumes.className=menumes.className+" active";
		if(!menumes){
			sinoesactivo(elmes);
		}
	}
	//activa el mes concreto
	evt.target.parentNode.className=evt.target.parentNode.className.replace("oculto","activo");
	return elmes;
}

function mes(evt){
	//Si estoy en mes, vuelvo al año
	if(document.querySelector(".activo")){
		verAnyo();
		document.querySelector(".dosbloques .lesmenus").style="flex-basis:0";
		return;
	}else{
		//muestraelmes
		touteannee("oculto");
		//activa mes y menus del mes
		// alert(evt.target.parentNode.getAttribute("data-mesnum"));
		document.querySelector(".dosbloques .lesmenus").style="flex-basis:46%";
		activamenus(evt);
		//recoge el evento de pulsar en el día para sacar el menú oportuno y carga el select
		last();
		choose();
	}
}


function last(elmes){
	var select=document.querySelector("select");
	var dia=document.querySelectorAll(".mes.activo .last:not(.festivo)");
	var menus=document.querySelector(".menu");
	for(i in dia)
		if(dia[i].tagName){
			var dianum=dia[i].parentNode.firstElementChild.textContent;
			dia[i].addEventListener("click",combina,false);
			dia[i].parentNode.dataset.mesnum=dianum;
			var opcion=document.createElement("option");
			opcion.textContent=dianum;
			select.appendChild(opcion);		
		}
		select.addEventListener("change",texto,false);
}

function combina(evt){
	var select=document.querySelector("select");
	var num=evt.target.parentNode.firstElementChild.textContent;
	var opciones=select.options;
	var opcion;
	for(i in opciones)
	  if(opciones[i].textContent==num){
    	select.selectedIndex=i;
		if ("createEvent" in document) {
		    var evt = document.createEvent("HTMLEvents");
		    evt.initEvent("change", false, true);
		    select.dispatchEvent(evt);
		}
		else
		    select.fireEvent("onchange");		    	
	  }
	if(document.querySelector(".teldia"))
		document.querySelector(".teldia").className="";
	var t=document.querySelector(".menu.active");
	var m=document.querySelector(".mes.activo [data-mesnum='"+t.getAttribute("data-menunum")+"']");
	m.firstElementChild.className="teldia";
}


function nwLine(evt){
	var plate = document.createElement("li");
	var span=document.createElement("span");
	span.textContent="escribe el nuevo plato";
	span.contentEditable="true";
	span.addEventListener("keydown",queteclaes,false);
	plate.appendChild(span);
	var ul=evt.target.parentNode;
	var num=ul.querySelector("li.anade");
	var cruz=document.createElement("span");
	cruz.className="cruz-linea";
	cruz.textContent="x";
	cruz.addEventListener("click",borralinea,false);
	plate.appendChild(cruz);
	if(ul.className=="agregado"){
		ul.insertBefore(plate,num);
		ul.insertBefore(document.createTextNode('\n\t\t\t'),num);
	}else{
		ul.insertBefore(document.createTextNode('\t'),num);
		ul.insertBefore(plate,num);
		ul.insertBefore(document.createTextNode('\n\t\t\t'),num);
		ul.className="agregado";
	}
}

function borraMenu(evt){
	var ul=evt.target.parentNode.nextElementSibling;
	ul.innerHTML="";
	var plate = document.createElement("li");
	plate.textContent="escribe el nuevo plato";
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
	// ul.insertBefore(plate,num);			
	// var num=(evt.target.parentNode.parentNode.firstElementChild.firstChild.textContent);
	// var select=document.querySelector("select");
	// select.value=num;
	// select[select.selectedIndex].remove();
	// evt.target.parentNode.parentNode.remove();
	// document.querySelector(".menu").className=document.querySelector(".menu").className+" active";

}

function texto(evt){
	var activo=document.querySelectorAll(".mois.activo .menu.active");
	console.log(activo);
	for(i in activo)
		if(activo[i].tagName)
			activo[i].className="menu";
	// alert(evt.target.value);
	var objeto=document.querySelector(".mois.activo .menu[data-menunum='"+evt.target.value+"']");
	objeto.className=objeto.className+" active";
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
		// console.log(evt.parentNode.parentNode.querySelector(".anade"));
		var anade=evt.target.parentNode.parentNode.querySelector(".anade");
		anade.click();
		anade.previousElementSibling.firstChild.textContent="";
		anade.previousElementSibling.firstChild.focus();
	}
}

function borralinea(evt){
	if(evt.target.parentNode.nextSibling.nodeName=="#text" && evt.target.parentNode.nextSibling.nodeType=="3"){
		evt.target.parentNode.nextSibling.remove();
		// alert("borrando");
	}
	evt.target.parentNode.remove();
}
	</script>
</body>
</html>