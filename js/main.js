var figurinas;
var figuras;
var iterator;
var tope;
var tempo;
var comandos;

var direccion;

window.addEventListener("load",initia,false);

function initia(){
	figurinas = document.querySelector("select#figurinas");
	if(figurinas){
		figuras = document.querySelectorAll("figure");
		iterator = figuras.length;
		tope = figurinas.length-1;
		/*con ruleta añadir línea siguiente*/
		tempo = setInterval("cambia('ff')", 4000);
		// comandos=document.querySelector("comandos");
		direccion=document.querySelectorAll(".direccion");
		
		for(var i in direccion)
			if(!!direccion[i].tagName)
				direccion[i].addEventListener("click",usuariodirige,false);
	}	
	ahax();	
}


function ahax(){
	var titulo;
	var contenido;
	var link;
	var fecha;
	var dia;
	var mes;
	var ladate;
	var anyo;
	var nws=document.querySelectorAll(".news");
	var meses=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	var ajax=new XMLHttpRequest();
	ajax.open("GET","http://www.lyceemolieresaragosse.org/wp-json/wp/v2/posts?per_page=2&categories=19",true);
	ajax.setRequestHeader("Content-type","application/json;charset=UTF8");
	ajax.setRequestHeader("Connection", "close");
	ajax.onreadystatechange=function(){
	if(ajax.readyState!=4 || ajax.status!=200) return;
		try{
			var r=JSON.parse(ajax.responseText);
			for(i in r){
				titulo="<h3>"+r[i].title.rendered+"</h3>";
				fecha=new Date(r[i].date);
				dia=fecha.getDate();
				mes=meses[fecha.getMonth()];
				anyo=fecha.getFullYear();	
				contenido=r[i].excerpt.rendered.replace(/\s\[|\]/g,"")
				ladate="<div class='ladate'>"+dia+" "+mes+", "+anyo+"</div>";
				link="<div class='permalink'><a href='"+r[i].link+"'>Continúa Leyendo <i class='fa fa-arrow-circle-right'></i></a></div>";
				nws[i].innerHTML=titulo+ladate+contenido+link;
			}

		}catch(e){};
		if(!r)
			alert(ajax.responseText);
			
	}
	ajax.send(JSON.stringify(null));	
}


var guarda;
var start=1;
function usuariodirige(evt){
	var sense=evt.target.id;
	/*con ruleta añadir líneas siguientes*/
	clearInterval(tempo);
	cambia(sense);
	arranca(evt.target.id);
}
var cont=0;

var prox;
function cambia(sense){
	var figura=document.querySelector("figure.actiu");
	var elid=figura.querySelector("img").id;
	// alert(figura.innerHTML);
	var bingo=document.querySelector("option[value='"+elid+"']");	
	var num=hijoH4(figura);
	if(sense=="ff"){
		num=(figuras.length-1==num)?0:num+1;
	}else{
		num=(num==0)?figuras.length-1:num-1;
	}
	figura.className=figura.className.replace(" actiu", "");
	figuras[num].className=figuras[num].className+" actiu";
	if(sense=="ff"){
		if(!!bingo.nextSibling){
			if(!!bingo.nextSibling.nextSibling)
				prox=bingo.nextSibling.nextSibling;
			else
				prox=bingo.parentNode.firstChild;
		}else{
			prox=bingo.parentNode.firstChild.nextSibling;
		}
	}else{
		if(!!bingo.previousSibling){
			if(!!bingo.previousSibling.previousSibling)
				prox=bingo.previousSibling.previousSibling;
			else
				prox=bingo.parentNode.lastChild;
		}else{
			prox=bingo.parentNode.lastChild.previousSibling;
		}
	}
	if(sense=="ff"){
		cambiafig((num>1)?0:num+1);
	}else{
		cambiafig((num<1)?figuras.length-1:num-1);
	}	
}

function cambiafig(b) {
	figuras[b].firstChild.id = prox.dataset.id;
	figuras[b].firstChild.src = prox.text;
	figuras[b].firstChild.alt = prox.dataset.alt;
	figuras[b].lastChild.textContent = prox.text;
}
function arranca(rec){
	var todas=document.querySelectorAll("figure");
	for(var i in todas)
		if(!!todas[i].tagName){
			todas[i].style.opacity=0;
		}
	var figura=document.querySelector("figure.actiu");
	figura.style.opacity=1;
	var fig=document.querySelector("select");
	fig.value=figura.src;
	iterator==(fig.selectIndex==tope)?0:fig.selectIndex+1;
	tempo = setInterval("cambia('"+rec+"')", 4000);
}

function hijoH4(a) {
    var t;
    var b = Array.prototype.slice.call(a.parentNode.children);
    t = (b.indexOf(a));
    return t;
}
