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
window.addEventListener("load",ajas,false);

function ajas(){
	var nws=document.querySelector(".news");
	var meses=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	var ajax=new XMLHttpRequest();
	var texto="";
	if(rutacompleta.indexOf("localhost")>-1)
		rutacompleta+="/liceo";
	else
		rutacompleta="http://www.lyceemolieresaragosse.org";	
	ajax.open("GET",rutacompleta+"/wp-json/wp/v2/pages/3498",true);
	ajax.setRequestHeader("Content-type","application/json;charset=UTF8");
	ajax.setRequestHeader("Connection", "close");
	ajax.onreadystatechange=function(){
	if(ajax.readyState!=4 || ajax.status!=200) return;
		try{
			var r=JSON.parse(ajax.responseText);
			// alert(r.title.rendered);
			document.querySelector(".hidden").innerHTML=r.content.rendered;
			var pes=document.querySelectorAll("p");
			for(i in pes){
				if(pes[i].tagName){
					if(pes[i].textContent.substr(0,3)=="[vc" || pes[i].textContent.substr(0,3)=="[/v" && (pes[i].textContent.substr(pes[i].textContent.length-4)=="ext]" || pes[i].textContent.substr(pes[i].textContent.length-4)=="row]") && pes[i].childNodes.length==1)
						pes[i].remove();
					else if(pes[i].textContent.substr(0,3)=="[vc" || pes[i].textContent.substr(0,3)=="[/v" && (pes[i].textContent.substr(pes[i].textContent.length-4)=="ext]" && pes[i].childNodes.length==2))
						pes[i].lastChild.textContent="";
						pes[i].removeAttribute("style");
						if(pes[i].firstChild.firstChild && pes[i].firstChild.firstChild.tagName=="IMG")
							pes[i].className="imagen";					
				}
			}
			var hid=document.querySelectorAll(".hidden p");

			for(var i in hid){
				if(hid[i].tagName){    
					if(hid[i].firstChild.firstChild && hid[i].firstChild.firstChild.tagName=="IMG"){
							var img=document.createElement("img");
							img.src=hid[i].firstChild.firstChild.src;
							ahref.appendChild(img);
							div.appendChild(ahref);
							document.querySelector(".news").appendChild(div);
					}else{

							var div=document.createElement("div");
							var ahref=document.createElement("a");
							ahref.href=hid[i].firstChild.href;
							var hC=document.createElement("h5");
							hC.textContent=hid[i].firstChild.textContent;
							ahref.appendChild(hC);
					}				
				}
			}
		}catch(e){};
			if(!r)
				alert(ajax.responseText);
			
	}
	ajax.send(JSON.stringify(null));	
}
function muestra(obj){
	for(i in obj){
			// document.querySelector(".news").innerHTML+="1----->"+obj[i]+"<br/>";
			if(obj[i] instanceof Object){
			 		document.querySelector(".news").innerHTML+=i+":<br/>";
					muestra(obj[i]);
					if(obj[i]!="undefined")
						document.querySelector(".news").innerHTML+="----crackea---"+obj[i]+"<br/>";
				// if(obj.hasOwnProperty(k)){
				// }
			}else
				document.querySelector(".news").innerHTML+= i+" <-> "+obj[i]+"<br/>";
		}
	}
		
	// var categria;
	// switch(document.querySelector("section").className){
	// 	case "varios":
	// 		categria=1;
	// 	break;
	// 	case "noticias-moliere":
	// 		categria=19;
	// 	break;
	// 	case "vida-cultural":
	// 		categria=14;
	// 	break;
	// }

			// 	titulo="<div class='onnews'>";
			// 	titulo+="<h3>"+r[i].title.rendered+"</h3>";
			// 	fecha=new Date(r[i].date);
			// 	dia=fecha.getDate();
			// 	mes=meses[fecha.getMonth()];
			// 	anyo=fecha.getFullYear();	
			// 	contenido=r[i].excerpt.rendered.replace(/\s\[|\]/g,"")
			// 	ladate="<div class='ladate'>"+dia+" "+mes+", "+anyo+"</div>";
			// 	link="<div class='permalink'><a href='"+r[i].link+"'>Continúa Leyendo <i class='fa fa-arrow-circle-right'></i></a></div>";
			// 	pie="</div>";
			// 	// pie+=r[i];
			// 	texto+=titulo+ladate+contenido+link+pie;
			// }
			// nws.innerHTML=texto;
			// var paginas=parseInt(ajax.getResponseHeader('x-wp-totalpages'));
			// if(paginas==1)
			// 	return;
			// var paginacion=document.querySelector(".paginacion");
			// paginacion.innerHTML="";
			// var first=document.createElement("span");
			// first.className="pagina numefix";
			// first.addEventListener("click",ajas,false);
			// first.textContent="1";
			// var last=document.createElement("span");
			// last.textContent=paginas;
			// last.addEventListener("click",ajas,false);
			// last.className="pagina numefix";
			// paginacion.appendChild(first);
			// var pag=2;
			// while(pag<paginas){
			// 	var span=document.createElement("span");
			// 	span.className="pagina";
			// 	span.textContent=pag;
			// 	span.addEventListener("click",ajas,false);
			// 	paginacion.appendChild(span);
			// 	pag++;
			// }
			// paginacion.appendChild(last);
			// var apunta=document.querySelectorAll(".paginacion span");
			// // alert(num);
			// apunta[num].className=apunta[num].className+" pagtiva";
			// if(apunta[num-1])
			// 	apunta[num-1].className=apunta[num-1].className+" numefix";
			// if(apunta[num+1])
			// 	apunta[num+1].className=apunta[num+1].className+" numefix";
