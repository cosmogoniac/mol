window.addEventListener("load",horarios,false);
var horas=document.querySelectorAll(".horas");

function horarios(){
		var clases=document.querySelectorAll(".clases ul li");
		var mesLista=document.querySelector(".clases ul li");
		mesLista.className="mesActive";
		document.querySelector(".horas").className="horas active";
		for(i in clases)
			if(clases[i].tagName){
				clases[i].addEventListener("click",muestra,false);
			}
}

function muestra(evt){
	document.querySelector(".mesActive").className="";
	evt.target.className="mesActive";
	var activo=document.querySelector(".active");
	activo.className=activo.className.replace(" active","");
	var mes=hijoH4(evt.target);
	horas[mes].className="horas active";
}


function hijoH4(a) {
    var t;
    var b = Array.prototype.slice.call(a.parentNode.children);
    t = (b.indexOf(a));
    return t;
}	