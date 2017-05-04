window.addEventListener("load",rutas,false);

function rutas(){
		var rutas=document.querySelectorAll(".buslogo");
		for(i in rutas)
			if(rutas[i].tagName)
				rutas[i].addEventListener("click",mostrar,false);

		var ractive=document.querySelectorAll(".itineraire1");
		for(i in ractive)
			if(ractive[i].tagName)
				ractive[i].className=ractive[i].className+" active";
}
function mostrar(evt){
	var boton=(evt.target.tagName!="DIV")?evt.target.parentNode:evt.target;
	var texto=boton.lastElementChild.textContent;
	var ruta=texto.replace(" ","").toLowerCase();
	var boton2=document.querySelector(".buslogo.active");
	boton2.className=boton2.className.replace(" active","");
	boton.className=boton.className+" active";
	var tactivo=document.querySelectorAll(".rutas.active");

	for(i in tactivo)
		if(tactivo[i].tagName){
			tactivo[i].className=tactivo[i].className.replace(" active","");
		}
	// alert(ruta);
	ruta=limpiaCar(ruta);
	var texto=document.querySelector(".mananas .rutas."+ruta);
	texto.className=texto.className+" active";
	texto=document.querySelector(".tardes .rutas."+ruta);
	texto.className=texto.className+" active";
}