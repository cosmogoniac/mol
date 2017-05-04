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
	// var num=(evt.target.tagName==="SPAN")?evt.target.textContent-1:0;
	var nws=document.querySelector(".news");
	var meses=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	var ajax=new XMLHttpRequest();
	var texto="";
	var seccion=document.querySelector("section").className;
	if(rutacompleta.indexOf("localhost")>-1)
		rutacompleta+="/liceo";
	else
		rutacompleta="http://www.lyceemolieresaragosse.org";
	if(seccion=="medios")
		ajax.open("GET",rutacompleta+"/wp-json/wp/v2/pages/4014",true);
	else
		ajax.open("GET",rutacompleta+"/wp-json/wp/v2/pages/3498",true);
	ajax.setRequestHeader("Content-type","application/json;charset=UTF8");
	ajax.setRequestHeader("Connection", "close");
	ajax.onreadystatechange=function(){
	if(ajax.readyState!=4 || ajax.status!=200) return;
		try{
			var r=JSON.parse(ajax.responseText);
			document.querySelector(".hidden").innerHTML=r.content.rendered;
			var miExpReg = /\[\/?vc_.*(ext|row)\]/i;
			document.querySelector(".hidden").firstChild.remove();
			var pes=document.querySelectorAll(".hidden *");
			var news=document.querySelector(".news");
			  for(i in pes){
					if(pes[i].tagName){
						console.log(pes[i].tagName);
						// alert(pes[i]);
						switch(pes[i].tagName){
							case "H3":
								if(i==0 || (pes[i-1] && pes[i-1].tagName!="H3")){
									var div=document.createElement("div");
									div.className="one";				
								}
								div.appendChild(pes[i]);
							break;
							case "P":
								var p=document.createElement("p");
								var href=pes[i].querySelector("a");
								if(href){
									var a=document.createElement("a");
									a.href=href.href;
								}
								var img=pes[i].querySelector("img");
								if(img){
									var imagen=document.createElement("img");
									imagen.src=img.src;
									if(imagen.src.indexOf("ytimg")){
										imagen.className="deltubo";
										a.target="_blank";
									}
									if(href){
										a.appendChild(imagen);
										div.appendChild(a);
									}else{
										p.appendChild(imagen);
									}
								}
								p.textContent=pes[i].textContent.replace(miExpReg,"");
								if(trim(p.textContent)!="")
									div.appendChild(p);
							break;
						}
						news.appendChild(div);
					}

				}


			// for(i in pes){
			// 	if(pes[i].tagName){
			// 		if(pes[i].textContent.substr(0,3)=="[vc" || pes[i].textContent.substr(0,3)=="[/v" && (pes[i].textContent.substr(pes[i].textContent.length-4)=="ext]" || pes[i].textContent.substr(pes[i].textContent.length-4)=="row]") && pes[i].childNodes.length==1)
			// 			pes[i].remove();
			// 		else if(pes[i].textContent.substr(0,3)=="[vc" || pes[i].textContent.substr(0,3)=="[/v" && (pes[i].textContent.substr(pes[i].textContent.length-4)=="ext]" && pes[i].childNodes.length==2))
			// 			pes[i].lastChild.textContent="";
			// 			pes[i].removeAttribute("style");
			// 			if(pes[i].firstChild.firstChild && pes[i].firstChild.firstChild.tagName=="IMG")
			// 				pes[i].className="imagen";					
			// 	}
			// }
			// var hid=document.querySelectorAll(".hidden p");

			// for(var i in hid){
			// 	if(hid[i].tagName){    
			// 		if(hid[i].firstChild.firstChild && hid[i].firstChild.firstChild.tagName=="IMG"){
			// 				var img=document.createElement("img");
			// 				img.src=hid[i].firstChild.firstChild.src;
			// 				ahref.appendChild(img);
			// 				div.appendChild(ahref);
			// 				document.querySelector(".news").appendChild(div);
			// 		}else{
			// 				var div=document.createElement("div");
			// 				var ahref=document.createElement("a");
			// 				ahref.href=hid[i].firstChild.href;
			// 				var hC=document.createElement("h5");
			// 				hC.textContent=hid[i].firstChild.textContent;
			// 				ahref.appendChild(hC);
			// 		}				
			// 	}
			// }
				// }
		}catch(e){};
			if(!r)
				alert(ajax.responseText);
			
	}
	ajax.send(JSON.stringify(null));	
}