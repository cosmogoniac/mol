window.addEventListener("load",comedor,false);
var jourachoisir={0:'Domingo',1:'Lunes',2:'Martes',3:'Miércoles',4:'Jueves',5:'Viernes',6:'Sábado'};
function comedor(){
	var mes=new Date().getMonth();
	mes=1;
	var mesactivo=document.querySelector(".mois[data-moisnum='"+mes+"']");
	if(!mesactivo){
		var meses=document.querySelectorAll(".mois");
		mesactivo=meses[meses.length-1];
		mes=mesactivo.dataset.moisnum;
	}
	mesactivo.className="mois activo";
	var dia=parseInt(new Date().getDate());
	var menus=document.querySelectorAll('.mois.activo [data-menunum]');
	var marcadia=document.querySelector(".mois.activo [data-menunum='"+dia+"']");
	if(!marcadia){
		var eldia=new Date();
		dia=buscadia(menus);
		marcadia=document.querySelector(".mois.activo [data-menunum='"+dia+"']");
	}
	marcadia.className="menu active";
	diactivo(dia);	

	// mesactivo.querySelector(".menu").className="menu active";
	var dias=document.querySelectorAll(".menu ul");
	for(var i in dias)
		if(dias[i].tagName){
			var li=document.createElement("li");
			li.className="sinadorno";
			li.textContent="OU/O";
			var obj=dias[i].querySelector("li:not(.tit)");
			dias[i].insertBefore(li,obj.nextElementSibling);
		}

	document.querySelector("[data-mesnum='"+mes+"']").className="mes actif";

	var cmenu=document.querySelectorAll(".mes.actif .last:not(.festivo),.mes.actif .dia > div:first-child");
	//agregar en cmenu el primer div
	var select=document.querySelector("select");
	for(var i in cmenu)
		if(cmenu[i].tagName){
			cmenu[i].addEventListener("click",menudia,false);
			if(cmenu[i].className=="last"){
				var opcion=document.createElement("option");
				opcion.textContent=cmenu[i].parentNode.firstChild.textContent;
				select.appendChild(opcion);
			}
		}
	select.addEventListener("change",cambiadia,false);
	var tas=document.querySelectorAll(".annee .mes.actif .dia");
	tas[marcadia.getAttribute("data-menunum")-1].className="dia hab prendido";
}

function cambiadia(evt){
	// var tas=document.querySelectorAll(".annee .mes.actif .dia");
	document.querySelector(".dia.prendido").className="dia hab";
	tas[evt.target.value-1].className="dia hab prendido";
	alert(evt.target.value-1);
	tas[evt.target.value-1].lastChild.click();
}
function diactivo(dia){
	var texto=document.querySelector('.mois.activo .litermes');
	var diames=document.querySelector(".diames");
	if(!diames){
		diames=document.createElement("span");
		diames.className="diames";
		var monz=texto.parentNode.getAttribute("data-moisnum");
		var t=new Date();
		t.setFullYear(t.getFullYear(),monz,dia);
		var joursem=t.getDay();
		diames.textContent=jourachoisir[joursem]+" "+dia;
		texto.insertBefore(diames,texto.firstChild);
		var span=document.createElement("span");
		span.className="anomes";
		span.textContent=t.getFullYear();
		texto.appendChild(span);
	}else{
		var t=new Date();
		var monz=texto.parentNode.getAttribute("data-moisnum");		
		t.setFullYear(t.getFullYear(),monz,dia);
		var joursem=t.getDay();
		diames=document.querySelector(".diames");
		diames.textContent=jourachoisir[joursem]+" "+dia;
	}
}
function menudia(evt){
	var dia;
	if(evt.target.className=="last")
		dia=evt.target.parentNode.firstChild.textContent;
	else
		if(evt.target.parentNode.lastChild.className=="last")
			dia=evt.target.textContent;
		else
			return;
	diactivo(dia);
	document.querySelector(".menu.active").className="menu";
	document.querySelector(".mois.activo [data-menunum='"+dia+"']").className="menu active";
	window.scrollTo(0,0);
	var texto=document.querySelector('.mois.activo .litermes');
	document.querySelector(".prendido").className="dia hab";
	evt.target.parentNode.className="dia hab prendido";
}
function buscadia(menus){
	var dia=parseInt(new Date().getDate());
	var i=0;
	while(i < menus.length-1){
		// console.log(menus[i].getAttribute("data-menunum"));
		if(menus[i].getAttribute("data-menunum")>dia)
			break;
		else
			i++;
	}
	return menus[i].getAttribute('data-menunum');
}