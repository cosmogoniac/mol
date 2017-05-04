<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Colonias</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">	
	<link rel="stylesheet" href="../css/calendrier.css">
	<style type="text/css">
.organizadas > div {
    border: 1px solid;
    display:none;
    margin: 1em;
    padding: 1em;
}
.organizadas .feprec{
    background-color: #eee;
    display: flex;
    flex-flow: row wrap;
    justify-content: space-around;
}
.organizadas .feprec > span {
    border-bottom: 1px solid;
    flex-basis:48%;
    text-align:right;
}

.organizadas .feprec > span.blinea {
    flex-basis: 1%;
}
.organizadas .feprec > span:first-child {
    background: #ddd none repeat scroll 0 0;
    border-bottom: 1px solid;
    flex-basis: 48%;
    padding-right: 2%;
}
.organizadas .active{
    display:block;
}	
.vacaciones > ul {
    display: flex;
    flex-flow: row wrap;
    justify-content: space-around;
    list-style: outside none none;
}
.vacaciones li {
    background-color: #eee;
    border: 1px solid;
    cursor:pointer;
    padding: 0.2em;
  -webkit-transition: all 0.5s ease-in-out 0s;
  transition: all 0.5s ease-in-out 0s;    
}

.vacaciones li.active,.vacaciones li:hover{
    background-color:rgb(192,31,57);
    color:white;
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
					<div class="vacacions">
				<?php
						// @include("manu.html");
						@include("../colonias.html");
				?>
					</div>
				</div>
			</div>
			<div class="botones">
				<button class="guardar">Guardar</button>
				<input class="nuevas" placeholder="Nuevas Vacaciones">
				<input class="numes" placeholder="Mes Num">
			</div>			
		</section>
	</div>			

	<script type="text/javascript">
	window.addEventListener("load",initia,false);

	function initia(){
	 var lis=document.querySelectorAll(".vacaciones li")
	 for(i in lis)
	 	if(lis[i].tagName)
	 		lis[i].addEventListener("click",muestra,false);

	 var rula=document.querySelectorAll(".vacaciones li[data-mesnum]");
	 // alert(rula.length);
	 var mes=new Date().getMonth();
	 // var i=rula.length-1;
	 var vector=Array();
	 // rula.sort();
	 for(i in rula)
	 	if(rula[i].tagName)
	 	vector.push(parseInt(rula[i].getAttribute("data-mesnum")));
	 vector=vector.sort(function(a, b){return a-b});
	 for(i in vector)
	 	if(vector[i]>mes)
	 		break;

	 var este=document.querySelector("[data-mesnum='"+vector[i]+"']");
	 este.className=este.className+" active";
	 var cuerpo=proceso(este.textContent);
	 var active=document.querySelector(".organizadas ."+cuerpo);
	 active.className=active.className+" active";

	 var ul=document.querySelector(".vacaciones ul");
	 var li=document.createElement("li");
	 li.textContent="+";
	 li.className="newVacation";
	 li.addEventListener("click",newVacation,false);
	 ul.appendChild(li);
	 var orgadiv=document.querySelectorAll(".organizadas div:not(.feprec)");
	 for(i in orgadiv)
	 	if(orgadiv[i].tagName)
	 		nwBttn(orgadiv[i]);
	}

	function nwBttn(div){
		var btn=document.createElement("button");
		btn.textContent="Add Line";
		btn.addEventListener("click",nwLine,false);
		div.appendChild(btn);
	}
	function nwLine(padre){
		if(!padre.tagName)
			var padre=padre.target.parentNode;
		var feprec=document.createElement("div");
		 feprec.className="feprec";
		 var unspan=document.createElement("span");
		 unspan.contentEditable="true";
		 unspan.textContent="Literal";
		 var dospan=document.createElement("span");
		 dospan.contentEditable="true";
		 dospan.textContent="Precio";
		 var cruzlinea=document.createElement("span");
		 cruzlinea.className="blinea";
		 cruzlinea.textContent="x";
		 cruzlinea.addEventListener("click",borralinea,false);
		 feprec.appendChild(unspan);
		 feprec.appendChild(dospan);
		 feprec.appendChild(cruzlinea);
		 padre.insertBefore(feprec,padre.querySelector("button"));
	}
	function proceso(misajour){
	 misajour=misajour.toLowerCase();
	 misajour=misajour.split(" ");
	 misajour=misajour.join("-");
	 return misajour;
	}
	function borralinea(evt){
		evt.target.remove();
	}
	function newVacation(evt){
		var numes=trim(document.querySelector(".numes").value);
		var nuevas=trim(document.querySelector(".nuevas").value);
		if(numes=="" || nuevas==""){
			alert("Rellena los inputs")
			return;
		}
		if(document.querySelector("[data-mesnum='"+numes+"']")){
			alert("Número de mes ya existente");
			return;
		}
		var nwCls=proceso(nuevas);
		if(document.querySelector("."+nwCls)){
			alert("Nombre de vacación existente");
			return;
		}
		 var ul=document.querySelector(".vacaciones ul");
		 var li=document.createElement("li");
		 li.addEventListener("click",muestra,false);
		 li.textContent=nuevas;
		 li.setAttribute("data-mesnum",numes);
		 ul.insertBefore(li,document.querySelector(".vacaciones ul").lastChild);
		 var div=document.createElement("div");
		 div.className=nwCls;
		 nwLine(div);
		 document.querySelector(".numes").value="";
		 document.querySelector(".nuevas").value="";
		 document.querySelector(".organizadas").appendChild(div);
		 document.querySelector(".vacaciones li[data-mesnum='"+numes+"']").click();
	}

	function trim(word){
		word=word.replace(/^\s*/g,"");
		word=word.replace(/\s*$/g,"");
		return word;
	}

	 function muestra(evt){
	 	var tar=evt.target;
	 	var t=proceso(tar.textContent);
	 	evt.target.parentNode.querySelector(".active").className="";
	 	evt.target.className="active";
	 	document.querySelector(".organizadas .active").className=document.querySelector(".organizadas .active").className.replace(" active","");
	 	var mostrar=document.querySelector(".organizadas ."+t);
	 	mostrar.className=mostrar.className+" active";
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



	</script>
</body>
</html>