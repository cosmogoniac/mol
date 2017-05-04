<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>calendario</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">	
	<style>

		.annee {
		    border-right: 1px solid;
		    display: flex;
		    flex-basis: 100%;
		    flex-flow: row wrap;
		    margin: auto;
		    width: 100%;
		}
		.annee .mes {
		    flex-basis: 19%;
		}
		.container {
		    display: flex;
		    flex-direction: column;
		}
		.mes {
		    border-bottom: 1px solid;
		    border-left: 1px solid;
		    display: flex;
		    flex-basis: 15%;
		    flex-flow: column wrap;
		    flex-grow: 1;
		    font-size:71%;
		    justify-content: space-between;s
		}

		.festivo,.finde.festivo{
			background-color:#93CD52!important;
		}

		.dia {
		    border-top: 1px solid;
		    display: flex;
		    flex-grow:1;
		    font-size: 60%;
		    justify-content: space-around;
		}

		.dia > div:first-child {
		    flex-basis: 10%;
		    text-align: right;
		    margin-right:4%;
		}
		.last,.finde {
			cursor:pointer;
		    flex-basis: 60%;
		    flex-grow: 1;
		    margin-right:4%;
		}
		.eldia{
		    flex-basis: 16%;
		}

		.mes:last-child {
		    border-right: 1px solid;
		}

		.finde{
			background-color: orange;
		}

		.elmes {
			background-color: #366291;
			color:white;
			text-align:center;
		}
		.titulo {
		    background-color: #366291;
		    border-left: 1px solid black;
		    border-right: 1px solid black;
		    border-top: 1px solid black;
		    color: white;
		    text-align: center;
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
			<div class="botones">
				<button class="guardar">Guardar</button>
				<!-- <button class="limpiar">Limpiar</button> -->
				<button class="importar">Importar</button>
				<button class="generar">Limpiar</button>
			</div>
			<div class="titulo">CALENDRIER SCOLAIRE - LYCEE MOLIERE SARAGOSSE 2016-2017</div>
				<div class="annee">
					<?php
						@include("../horarios.html");
					?>
				</div>
		</section>
	</div>
	<script>
	festivity();
	var botonG=document.querySelector("button.guardar");
	botonG.addEventListener("click",guardar,false);
	// var botonI=document.querySelector("button.limpiar");
	// botonI.addEventListener("click",limpiar,false);
	var botonIm=document.querySelector("button.importar");
	botonIm.addEventListener("click",importar,false);
	var botonGe=document.querySelector("button.generar");
	botonGe.addEventListener("click",generar,false);


	function generar(){
		var lesmois={8:'septembre',9:'octobre',10:'novembre',11:'décemebre',0:'janvier',1:'février',2:'mars',3:'avril',4:'mai',5:'juin'};
		var lesjours=['D','L','Ma','Me','J','V','S'];

		//creo Año
		var annee=document.createElement("div");
		var diapasa=1;
		annee.className="annee";
		var lan=new Date().getFullYear();
		// si estamos en el año del fin de curso
		if(new Date().getMonth()<5)
			lan--;
		var desdeZ=new Date("September 1,"+lan);
		mess=desdeZ.getMonth();
		var hastaZ=new Date("June 30,"+(lan+1));
		var moi=0;
		var a=0;
		while(desdeZ<hastaZ){
			desdeZ.setFullYear(lan,mess,diapasa);
			mes=desdeZ.getMonth();
		 	a++;
			if(mes!=moi){
				//creo mes
				var mois=document.createElement("div");
				mois.className="mes";
				mois.dataset.mesnum=mes;
				//creo nombre mes
				var nombreMes=document.createElement("div");
				nombreMes.className="elmes";
				nombreMes.textContent=lesmois[mes];
				//agrego nombre mes
				mois.appendChild(nombreMes);
				// if(mes>8)
				annee.appendChild(mois);
				moi=mes;
			}

			var jours=document.createElement("div");
			var diasemana=lesjours[desdeZ.getDay()];
			jours.className="dia";
			if(diasemana!="D" && diasemana!="S")
				jours.className=jours.className+" hab";
			else
				jours.className=jours.className+" nohab";
			var jour=document.createElement("div");
			jour.textContent=desdeZ.getDate();
			jours.appendChild(jour);
			var eldia=document.createElement("div");
			eldia.className="eldia";
			eldia.textContent=diasemana;
			jours.appendChild(eldia);
			var tres=document.createElement("div");
			tres.className=(diasemana!="D" && diasemana!="S")?"last":"finde";
			jours.appendChild(tres);
		  	mois.appendChild(jours);
			diapasa++;
		}

		document.querySelector(".annee").remove();
		document.querySelector(".container").appendChild(annee);
		festivity();
	}

	function guardar(){
		if(!confirm("Estás a punto de sobreescribir los horarios, ¿Deseas Continuar?"))return;
		var params={"tabla":document.querySelector(".annee").innerHTML};
		var r = new XMLHttpRequest();
		r.open("POST","horarios.php", true);
		r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
		r.setRequestHeader("Content-length", params.length);
		r.setRequestHeader("Connection", "close");	
		r.onreadystatechange = function () {
			if (r.readyState != 4 || r.status != 200) return;
			alert(r.responseText);
		};
		r.send(JSON.stringify(params));		
}

function festivity(){
	var festivos=document.querySelectorAll(".finde, .last");
	if(festivos.length>1){
		for(i in festivos)
			if(festivos[i].tagName)
				festivos[i].addEventListener("click",festivo,false);	
	}
}

function importar(url){
	var r = new XMLHttpRequest();
	var params={'fecha':Date()};
	r.open("GET","../horarios.html", true);
	r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
	r.setRequestHeader("Content-length", params.length);
	r.setRequestHeader("Connection", "close");

	r.onreadystatechange = function () {
		if (r.readyState != 4 || r.status != 200) return;
		document.querySelector(".annee").innerHTML=r.responseText;
		festivity();
	};
	r.send(params);
}



function festivo(e){
	if(e.target.className.indexOf("festivo")<0){
		e.target.className = e.target.className+" festivo";
		e.target.parentNode.className = e.target.parentNode.className.replace(" hab","");
		e.target.parentNode.className=e.target.parentNode.className+" nohab";
	}
	else{
		e.target.className = e.target.className.replace(" festivo","");
		e.target.parentNode.className = e.target.parentNode.className.replace(" nohab","");
		e.target.parentNode.className=e.target.parentNode.className+" hab";
	}


}

	</script>
</body>
</html>
