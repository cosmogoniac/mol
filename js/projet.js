window.addEventListener("load",initial,false);
function initial(){
	var logo=document.querySelectorAll(".logo");
	for(i in logo)
		if(logo[i].tagName)
			logo[i].addEventListener("click",mostrar,false);

	var ractive=document.querySelector(".logos div");
	ractive=ractive.className.substr("logo ".length);
	var muestra=document.querySelectorAll("."+ractive);
	for(i in muestra)
		if(muestra[i].tagName){
			muestra[i].className=muestra[i].className+" active";
			if(muestra[i].parentNode.className.indexOf("proyecto")>-1)
				activaIndicativo(muestra[i]);
		}
}
function mostrar(evt){
	var boton=(evt.target.tagName!="DIV")?evt.target.parentNode:evt.target;
	var logo=document.querySelector(".logo.active");
	logo.className=logo.className.replace(" active","");
	var clase=boton.className.substr("logo ".length);
	boton.className=boton.className+" active";
	// alert(clase);
	var ltproy=document.querySelector(".proyecto .active");
	ltproy.className=ltproy.className.replace(" active","");
	var nwactive=document.querySelector(".proyecto ."+clase);
	nwactive.className=nwactive.className+" active";
	if(!nwactive.querySelector("p"))
		activaIndicativo(nwactive);	
}

function activaIndicativo(obj){
	var ul=obj.querySelectorAll("ul");
	for(a in ul){
		if(ul[a].tagName){
			var p=document.createElement("p");
			var clalit=ul[a].className.split("-");
			clalit=clalit.join(" ");
			p.textContent=clalit;
			obj.insertBefore(p,ul[a]);
		}
	}
}