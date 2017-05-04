<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Videos</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">
	<style type="text/css">
	h3{
		text-align:center;
	}
	.container {
	    display: flex;
	    flex-flow: column wrap;
	}
	.losvideos > div {
	    display: flex;
	}	
	
	.losvideos div span {
	    align-self: center;
	    background-color: #eee;
	    border: 1px solid;
	    display: block;
	    margin: 0.4em;
	    width: 122px;
	}

	.losvideos button {
	    background-color: #c01f39;
	    color: white;
	    cursor: pointer;
	    font-size: 1.2em;
	    font-weight: bold;
	    margin: 0.4em 1em;
  		-webkit-transition: all 0.5s ease-in-out 0s;
	  	transition: all 0.5s ease-in-out 0s;		
	    width: 110px;
	}

	.losvideos button:hover {
	    background-color: #888;
	    color: #000;
	}	
	.videos {
	    background-color: #ddd;
	    border: 1px solid;
	    flex-basis: 20%;
	    padding: 2em;
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
				<h3>Vídeos</h3>
				<div class="botones">
					<button class="importar">Importar</button>
					<button class="guardar">Guardar</button>
				</div>
				<div class="videos">
					<select>
						<option value="espanol">Español</option>
						<option value="ingles">Ingles</option>
						<option value="frances">Frances</option>
						<option value="director">Carta al director</option>
						<option value="metodo">Método</option>
						<option value="ven">Ven a Conocernos</option>
					</select>
					<div class="losvideos"></div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		window.addEventListener("load",initia,false);
		var select=document.querySelector("select");
		var documento;
		function importar(){
			document.querySelector(".losvideos").innerHTML="";
			var params={'fecha':Date()};
			var xml=new XMLHttpRequest();
			xml.open("GET","../videos.json",true);
			xml.setRequestHeader("Content-type","text/xml;charset=UTF8");
			xml.setRequestHeader("Content-length", params.length);
			xml.setRequestHeader("Connection","close");
			xml.onreadystatechange=function(){
			if(xml.readyState!=4 || xml.status!=200) return;
				documento=JSON.parse(xml.responseText);
				var i=0;
				for(i in documento['videos'])
				  if(documento['videos'][i].id==select.value)
				    break;
				for(a in documento['videos'][i].video){
					var div=document.createElement("div");
					var span=document.createElement("span");
					var boton=document.createElement("button");
					boton.innerHTML="-";
					boton.addEventListener("click",borra,false);
					// var boton2=document.createElement("button");
					// boton.value="-";
					span.contentEditable=true;
					span.addEventListener("keydown",queteclaes,false);
					span.textContent=documento['videos'][i].video[a];
					div.appendChild(span);
					div.appendChild(boton);
					document.querySelector(".losvideos").appendChild(div);
				}
				var boton=document.createElement("button");
				boton.className="anade";
				boton.innerHTML="+";
				boton.addEventListener("click",anade,false);
				document.querySelector(".losvideos").appendChild(boton);

				 // console.log(documento['videos'][top].video[a]);
			}
			xml.send(params);
		}

		function anade(evt){
			// alert("si");
			var div=document.createElement("div");
			var span=document.createElement("span");
			var boton=document.createElement("button");
			boton.innerHTML="-";
			boton.addEventListener("click",borra,false);
			span.contentEditable=true;
			span.addEventListener("keydown",queteclaes,false);
			div.appendChild(span);
			div.appendChild(boton);
			document.querySelector(".losvideos").insertBefore(div,document.querySelector(".losvideos").lastChild);
		}
		function borra(evt){
			var padre=hijoH4(evt.target.parentNode);
			documento.videos[select.selectedIndex].video.splice(padre);
			evt.target.parentNode.remove();
		}
		function initia(){
			document.querySelector("button.guardar").addEventListener("click",guardar,false);
			document.querySelector("button.importar").addEventListener("click",importar,false);
		}

		// q-CtVB3PxZg
		function hijoH4(a) {
		    var t;
		    var b = Array.prototype.slice.call(a.parentNode.children);
		    t = (b.indexOf(a));
		    return t
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

		function guardar(evt){
			var losvid=document.querySelectorAll(".losvideos div span");
			if(!confirm("Estás a punto de sobreescribir los menús, ¿Deseas Continuar?"))return;
			for(i in losvid)
				if(losvid[i].tagName)
					documento.videos[select.selectedIndex].video[i]=losvid[i].textContent;

			var r = new XMLHttpRequest();
			r.open("POST","guardaxml.php", true);
			r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
			r.setRequestHeader("Content-length", documento.length);
			r.setRequestHeader("Connection", "close");	
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				alert(r.responseText);
			};
			r.send(JSON.stringify(documento));	

		}
	</script>
</body>
</html>