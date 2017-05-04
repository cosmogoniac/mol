window.addEventListener("load",inicio,false);
var tapando=document.querySelector(".tapando");


function inicio(){
	var buscar=document.querySelectorAll(".buscar input,.flecha");
	buscar[0].addEventListener("keyup",tecla,false);
	buscar[1].addEventListener("click",tecla,false);
}

function tecla(evt){
	if(evt.target.tagName!="SPAN"){
		var tcl=(evt.which)?evt.which:evt.keyCode;
		if(tcl!=13)return;
	}
	var cadena=document.querySelector(".buscar input");
	cadena.value=trim(cadena.value);
	if(cadena.value=="")return;
	ajx(cadena.value);
}

function trim(cadena){
	cadena=cadena.replace(/^\s*/g,"");
	cadena=cadena.replace(/\s*$/g,"");
	return cadena;
}

function ajx(busqueda){
	var akhax=new XMLHttpRequest();
	var titulo;
	var fecha;
	var dia;
	var mes;
	var anyo;
	var meses=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	tapando.className="tapando on";
	document.body.style="overflow:hidden";
	akhax.open("GET","http://www.lyceemolieresaragosse.org/wp-json/wp/v2/posts?search="+busqueda+"&categories=19",true);
	akhax.setRequestHeader("Content-type","application/json;charset=UTF8");
	akhax.setRequestHeader("Connection", "close");
	akhax.onreadystatechange=function(){
	if(akhax.readyState!=4 || akhax.status!=200) return;
		try{
			var ar=JSON.parse(akhax.responseText);
			var suma="";
			for(i in ar){
				// console.log("---->"+ar[i].title.rendered);
				titulo="<div class='entry'><a href='"+ar[i].link+"'><h3>"+ar[i].title.rendered+"</h3>";
			// 	// contenido=r[i].excerpt.rendered;
				fecha=new Date(ar[i].date);
				dia=fecha.getDate();
				mes=meses[fecha.getMonth()];
				anyo=fecha.getFullYear();	
			// 	contenido=r[i].excerpt.rendered.replace(/\s\[|\]/g,"")
				ladate="<span class='ladate'>"+dia+" "+mes+", "+anyo+"</span></a></div>";
			// 	link="<div class='permalink'><a href='"+r[i].link+"'>Continúa Leyendo <i class='fa fa-arrow-circle-right'></i></a></div>";
			// alert("a");
				suma+=titulo+ladate;
				// console.log(suma);
			}
			// alert(suma);
			if(ar.length==0)
				suma="<h3>Lo sentimos, su búsqueda no ha obtenido resultado.</h3>";
			document.querySelector(".cruzada").innerHTML+=suma;
			document.querySelector(".cruzada").style.display="block";
			document.querySelector(".cruzada .cierra").addEventListener("click",closeSearch,false);
		}catch(e){};
		if(!ar)
			alert(akhax.responseText);
			
	}
	akhax.send(null);
}

function closeSearch(evt){
	tapando.className="tapando";
	document.body.style="overflow:auto";
	document.querySelector(".cruzada").innerHTML="<span class='cierra'>X</span>";
	document.querySelector(".cruzada").style.display="none";
}