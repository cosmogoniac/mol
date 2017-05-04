<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Banda</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">		
	<style type="text/css">
		div.banda {
		    background-color: #c01f39;
		    color: #eee;
	     	display: flex;
		    font-size: 1.6em;
		    padding: 1em;
		}
		div.banda .literal {
		    font-weight: bold;
			flex-basis: 68%;
		}
		div.banda > span{
		    align-self: center;
		}
		input {
		    background-color: #f0f0f0;
		    border: 1px solid;
		    font-size: 2em;
		    margin-top:1em;
		    width: 90%;
		}
		.globo {
		    transition: all 0.5s ease-in-out 0s;
		}
		.globo a {
			background-color: #fff;
		    border-radius: 100px;
		    color: #333333;
		    font-size: 0.8em;
		    padding: 1em;
		    text-decoration: none;
		}
		.ruta {
		    text-align: center;
		}
		.ruta > button {
		    cursor: pointer;
		    display: block;
		    font-size: 2em;
		    margin: 1em auto;
		    transition: all 0.5s ease-in-out 0s;
		}
		.ruta > button:hover{
			background:#c01f39;
			color:white;
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
				<div class="dos">
					<div class="botones">
						<button class="importar">Importar</button>
						<button class="guardar">Guardar</button>
					</div>
				</div>
				<div class="bandaK">
				<?php
					@include("../banda.html");
				?>
				</div>
				<div class="ruta">
					<input class="rutalit" pattern="^https?://.+">
					<button>No activa</button>
				</div>
			</div>
		</section>
	</div>
<script type="text/javascript">
	window.addEventListener("load",initia,false);

	function importar(){
		var params={'fecha':Date()};
		var r = new XMLHttpRequest();
		r.open("GET","../banda.html", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		r.setRequestHeader("Content-length", params.length);		
		r.setRequestHeader("Connection", "close");	
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			document.querySelector(".bandaK").innerHTML=r.responseText;
			comienza();

		};
		r.send(params);
	}

	function initia(){
		document.querySelector("button.guardar").addEventListener("click",guardar,false);
		document.querySelector("button.importar").addEventListener("click",importar,false);
		document.querySelector(".ruta button").addEventListener("click",oculta,false);
		comienza();
	}

	function oculta(){
		var clase=document.querySelector(".bandaK .banda");
		if(clase.className.indexOf("hidden")>-1)
			clase.className="banda";
		else
			clase.className="banda hidden";
		bandActif();
	}

	function bandActif(){
		var clase=document.querySelector(".bandaK .banda");
		var boton=document.querySelector(".ruta button");
		if(clase.className.indexOf("hidden")>-1)
			boton.textContent="Activa";
		else
			boton.textContent="No activa";
	}

	function comienza(){
		var spanes=document.querySelectorAll("span.literal,.globo a");
		var input=document.querySelector(".rutalit");
		input.value=document.querySelector(".globo a").href;
		for(i in spanes){
		  	if(spanes[i].tagName){
		    	spanes[i].setAttribute("contenteditable",true);		
				spanes[i].addEventListener("keydown",queteclaes,false);
			}				
		}
		bandActif();		
	}
	function guardar(evt){
		var input=document.querySelector(".rutalit");
		if(!input.checkValidity()){
			alert("¡Ruta Incorrecta, Modifícala!");
			return;
		}		
		if(!confirm("Estás a punto de sobreescribir la banda, ¿Deseas Continuar?"))return;
			document.querySelector(".globo a").href=input.value;
			var params={"banda":document.querySelector(".bandaK").innerHTML};
			var r = new XMLHttpRequest();
			r.open("POST","bandaK.php", true);
			r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
			r.setRequestHeader("Content-length", params.length);
			r.setRequestHeader("Connection", "close");	
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				alert(r.responseText);
			};
			r.send(JSON.stringify(params));		
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