var titulo;
var contenido;
var link;
var fecha;
var dia;
var mes;
var ladate;
var anyo;
var pie;
var rutacompleta = window.location.origin;
var url=window.location.pathname.substr(1);
window.addEventListener("load",ajaxx,false);

function ajaxx(evt){
	var num=(evt.target.tagName==="SPAN")?evt.target.textContent-1:0;
	var nws=document.querySelector(".news");
	var meses=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	var ajax=new XMLHttpRequest();
	var categria;
	var texto="";
	if(rutacompleta.indexOf("localhost")>-1){
		ruta=ruta.substr(1);
		ruta=ruta.substr(0,ruta.indexOf("/"));		
		rutacompleta+="/liceo";
	}
	else{
		ruta=window.location.href;
		ruta=ruta.substr(0,ruta.lastIndexOf("/")-1);
		ruta=ruta.substr(0,ruta.lastIndexOf("/"));		
		rutacompleta="http://www.lyceemolieresaragosse.org";
	}	
	switch(document.querySelector("section").className){
		case "varios":
			categria=1;
		break;
		case "noticias-moliere":
			categria=19;
		break;
		case "vida-cultural":
			categria=14;
		break;
	}
	ajax.open("GET",rutacompleta+"/wp-json/wp/v2/posts?per_page=10&categories="+categria+"&offset="+num,true);
	ajax.setRequestHeader("Content-type","application/json;charset=UTF8");
	ajax.setRequestHeader("Connection", "close");
	ajax.onreadystatechange=function(){
	if(ajax.readyState!=4 || ajax.status!=200) return;
		try{
			var r=JSON.parse(ajax.responseText);
			for(i in r){
				titulo="<div class='onnews'>";
				titulo+="<h3>"+r[i].title.rendered+"</h3>";
				fecha=new Date(r[i].date);
				dia=fecha.getDate();
				mes=meses[fecha.getMonth()];
				anyo=fecha.getFullYear();	
				contenido=r[i].excerpt.rendered.replace(/\s\[|\]/g,"")
				ladate="<div class='ladate'>"+dia+" "+mes+", "+anyo+"</div>";
				var rutita=r[i].link;
				var regExp=/^h.{3,4}:\/\/.{3}\..*\..{3,4}\/\d{4}\/\d{2}/;
				if(window.location.host=="localhost")
					rutita=rutita.replace("liceo",ruta);
				else
					rutita=rutita.replace(regExp,ruta);				
				link="<div class='permalink'><a href='"+rutita+"'>Continúa Leyendo <i class='fa fa-arrow-circle-right'></i></a></div>";
				pie="</div>";
				// pie+=r[i];
				texto+=titulo+ladate+contenido+link+pie;
			}
			nws.innerHTML=texto;
			var paginas=parseInt(ajax.getResponseHeader('x-wp-totalpages'));
			if(paginas==1)
				return;
			var paginacion=document.querySelector(".paginacion");
			paginacion.innerHTML="";
			var first=document.createElement("span");
			first.className="pagina numefix";
			first.addEventListener("click",ajaxx,false);
			first.textContent="1";
			var last=document.createElement("span");
			last.textContent=paginas;
			last.addEventListener("click",ajaxx,false);
			last.className="pagina numefix";
			paginacion.appendChild(first);
			var pag=2;
			while(pag<paginas){
				var span=document.createElement("span");
				span.className="pagina";
				span.textContent=pag;
				span.addEventListener("click",ajaxx,false);
				paginacion.appendChild(span);
				pag++;
			}
			paginacion.appendChild(last);
			var apunta=document.querySelectorAll(".paginacion span");
			// alert(num);
			apunta[num].className=apunta[num].className+" pagtiva";
			if(apunta[num-1])
				apunta[num-1].className=apunta[num-1].className+" numefix";
			if(apunta[num+1])
				apunta[num+1].className=apunta[num+1].className+" numefix";
		}catch(e){};
		if(!r)
			alert(ajax.responseText);
			
	}
	ajax.send(JSON.stringify(null));	
}