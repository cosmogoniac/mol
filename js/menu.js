var alto;
var haut;
var header=document.querySelector("header");
var arriba=document.querySelector(".arriba");
var cierre=document.querySelector(".cierre");
var reduce=document.querySelector("nav.reduciendo");
var encabezado=document.querySelector(".header");
var btn=document.querySelectorAll(".btn");

window.addEventListener("load",menu,false);

function menu(){
	if(window.innerWidth>736)
		alto=header.clientHeight;
	else
		alto=32;
	haut=encabezado.clientHeight;
	if(cierre)
		cierre.addEventListener("click",cierra,false);
	if(reduce)
		reduce.addEventListener("click",minimenu,false);
	window.addEventListener("scroll",elScroll,false);
	arriba.addEventListener("click",hastarriba,false);
	var clack=document.querySelectorAll(".clack");
	for(i in clack)
		if(clack[i].tagName)
			clack[i].addEventListener("click",enlinka,false);

	for(i in btn)
		if(btn[i].tagName)
			btn[i].addEventListener("click",dalink,false);
}

function dalink(evt){
	var enlace=evt.target.querySelector("a");
	if(!enlace)
		return;
	location.href=enlace.href;
}


function enlinka(evt){
	var enlace=evt.target.querySelector("a");
	if(!enlace)
		enlace=evt.target.parentNode.querySelector("a");
	location.href=enlace.href;
}

function cierra(evt){
	document.querySelector("nav.principal").style.display="none";
	document.querySelector("nav.reduciendo").style.display="flex";
	if(document.querySelector(".elprezi"))
		document.querySelector(".elprezi").style.display="block";
}

function hastarriba(e){
	window.scrollTo(0, 0);
}

function elScroll(e){
    if(window.scrollY>=alto){
		header.style.display="none";
		arriba.style.zIndex="1";
		arriba.style.opacity="1";
    }else{
    	// alert(window.scrollY);
    	header.style.display="flex";
    	arriba.style.zIndex="-1";
    	arriba.style.opacity="0";
	}
}

function minimenu(evt){
	document.querySelector("nav.principal").style.display="flex";
	if(document.querySelector(".elprezi"))
		document.querySelector(".elprezi").style.display="none";
	document.querySelector("nav.reduciendo").style.display="none";
}