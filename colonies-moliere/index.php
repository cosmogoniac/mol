<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Les colonies Molière</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/comun.css">
	<link rel="stylesheet" type="text/css" href="../css/aside.css">
	<script type="text/javascript" async="" src="../js/comun.js"></script>
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
</head>
<body>
	<?php
		include_once("../header.php");
	?>
	<div class="entera">
		<h1>Les colonies Molière</h1>
		<section class="colonias">
			<div class="cruzada"><span class="cierra">X</span></div>
			<div class="biparrafo">
				<div class="parrafo">
					<p>Le Lycée français Molière offre des <strong>colonies de vacacances</strong> para los alumnos del colegio durante las semanas de vacaciones del curso.</p>
					<p>Les colonies Molière sont organisées par <a href="http://norabola.com/" target="_blank">Norabola Producciones</a>. De nombreuses activités s’y derroulent: cirque, téathre, musique, danse, arts plastiques, sports, conteurs d’histoires, recettes de cuisine, clown, etc., sans oublier les langues française et anglaise. Nous y retrouverons aussi des personages inédits.</p>	
					<p>Les colonies de <strong>pour Noël</strong>, auront lieu les jours <strong>23 décembre, du 26 au 30 décembre et du 2 au 5 janvier</strong> dans les installations du Lycée, <strong>de 8h30 à 14h</strong>.</p>			
				</div>
				<div class="parrafo marcalink noflex">
					<p>À cette occasion, elles ont pour titre <strong>'Planète Imaginaire'</strong> et l'axe des activités sera l'imagination des enfants.</p>
					<p>
						<img src="http://www.lyceemolieresaragosse.org/wp-content/uploads/2016/02/Colonie-Planete-Imaginaire-No-rabola-Producciones-Molière.jpg" title="colonies Molière" alt="colonies Molière">
					</p>
					<p>Le <strong><a href="http://www.apemoliere.org/web/UserFiles/file/Norabola%202016-2017.pdf" target="_blank">formulaire d' inscription</a> </strong>peut s'envoyer à <a class="moz-txt-link-abbreviated" href="mailto:colonias.moliere@gmail.com">colonias.moliere@gmail.com</a>. Nous vous rappelons que les enfants peuvent s’inscrire à la colonie complète ou bien des jours isolés.</p>
					<div class="cuadrado">
						<p>Pour en savoir plus:</p>
						<p>Norabola Producciones</p>
						<p>656 335 584</p>
						<p><a href="mailto:norabola.info@gmail.com">norabola.info@gmail.com</a></p>
						<p><a href="http://www.norabola.com/">www.norabola.com</a></p>
					</div>
					
				</div>
			</div>
			<div class="coloniasfechas">
				<div class="vacaciones">
					<ul>
						<li data-mesnum="10">Toutsaint</li>
						<li data-mesnum="11">Noel</li>
						<li data-mesnum="1">Carnaval</li>
						<li data-mesnum="3">Paques</li>
						<li data-mesnum="5">Juin</li>
						<li data-mesnum="6">Grandes Vacances</li>
					</ul>
				</div>
				<div class="organizadas">
					<div class="toutsaint">
						<div class='feprec'>
							<span>31 Oct et 2, 3 et 4 Nov</span>
							<span>85€</span>
						</div>
					</div>
					<div class="noel">
						<div class="feprec">
							<span>1ème semaine (23, 26-30 Déc)</span>
							<span>116€</span>
						</div>
						<div class="feprec">
							<span>2ème semaine (2-5 Jan)</span>
							<span>85€</span>
						</div>
						<div class="feprec">
							<span>1ème semaine + 2ème semaine</span>
							<span>172€</span>
						</div>
					</div>
					<div class="carnaval">
						<div class="feprec">
							<span>20-24 Fev</span>
							<span>99€</span>
						</div>
					</div>
					<div class="paques">
						<div class="feprec">
							<span>1ère semaine (10-12 Abr)</span>
							<span>67€</span>
						</div>
						<div class="feprec">
							<span>2ª semana (17-21 Abr)</span>
							<span>99€</span>
						</div>
						<div class="feprec">
							<span>1ème semaine + 2ème semaine</span>
							<span>151€</span>
						</div>
					</div>
					<div class="juin">
						<div class="feprec">
							<span>1-2 Juin</span>
							<span>99€</span>
						</div>
					</div>
					<div class="grandes-vacances">
						<div class="feprec">
							<span>1ª semana (3-7 Jul)</span>
							<span>99€</span>
						</div>
						<div class="feprec">
							<span>2ª semana (10-14 Ju)</span>
							<span>67€</span>
						</div>
						<div class="feprec">
							<span>1ème semaine + 2ème semaine</span>
							<span>172€</span>
						</div>
					</div>
					<div class="dias-sueltos">
						<div class="feprec">
							<span>*Prix par jour isolé pour quelconque autre colonie.</span>
							<span>25€</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
			include_once("../sidebar-formacion.php");
		?>
	</div>
	<?php
		include_once("../footer.php");
	?>
	<script>
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
	 var cuerpo=este.textContent.toLowerCase();
	 cuerpo=cuerpo.split(" ");
	 cuerpo=cuerpo.join("-");
	 var active=document.querySelector(".organizadas ."+cuerpo);
	 active.className=active.className+" active";


	 // alert("Fin:"+i);

	 function muestra(evt){
	 	var tar=evt.target;
	 	var t=tar.textContent.toLowerCase();
	 	t=t.split(" ");
	 	t=t.join("-");
	 	evt.target.parentNode.querySelector(".active").className="";
	 	evt.target.className="active";
	 	document.querySelector(".organizadas .active").className=document.querySelector(".organizadas .active").className.replace(" active","");
	 	var mostrar=document.querySelector(".organizadas ."+t);
	 	mostrar.className=mostrar.className+" active";
	 }
	</script>
</body>
</html>
