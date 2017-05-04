var titulo;
var contenido;
var link;
var fecha;
var dia;
var mes;
var ladate;
var anyo;
var pie;
var imagen="";
var rutacompleta = window.location.origin;
var url=window.location.pathname.substr(1);
window.addEventListener("load",ajaxx,false);

function ajaxx(evt){
	var num=(evt.target.tagName==="SPAN")?evt.target.textContent-1:0;
	var nws=document.querySelector(".news");
	var meses=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	var ajax=new XMLHttpRequest();
	var ruta=window.location.pathname;
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
	ajax.open("GET",rutacompleta+"/wp-json/wp/v2/posts?per_page=10&offset="+num,true);
	ajax.setRequestHeader("Content-type","application/json;charset=UTF8");
	ajax.setRequestHeader("Connection", "close");
	ajax.onreadystatechange=function(){
	if(ajax.readyState!=4 || ajax.status!=200) return;
		try{
			var r=JSON.parse(ajax.responseText);
			document.querySelector(".hidden").innerHTML=stripslashes(saltoLinea(unicodeToChar(ajax.responseText)));
			// document.querySelector(".news").innerHTML=unicodeToChar(ajax.responseText);
			for(i in r){
				titulo="<div class='onnews'>";
				titulo+="<h3>"+r[i].title.rendered+"</h3>";
				fecha=new Date(r[i].date);
				dia=fecha.getDate();
				mes=meses[fecha.getMonth()];
				anyo=fecha.getFullYear();
				var patron=/\[&hellip;\]/g;
				contenido=r[i].excerpt.rendered;
				contenido=contenido.replace(patron,"&hellip;");
				patron=/<img.*"/;
				// alert(r[i].content.rendered);
				var tas=r[i].content.rendered.match(patron);
				if(tas){
					// alert(r[i].content.rendered);
					patron=/src=".{20,300}\..{3,4}"/;
					var tos=tas.toString().match(patron);
					// patron=/src=".*\..{3,4}"/;
					imagen="<img "+tos+"/>";
					// alert(imagen);
					tas="";
				}
				// contenido=r[i].excerpt.rendered;
				ladate="<div class='ladate'>"+dia+" "+mes+", "+anyo+"</div>";
				var rutita=r[i].link;
				var regExp=/^h.{3,4}:\/\/.{3}\..*\..{3,4}\/\d{4}\/\d{2}/;
				if(window.location.host=="localhost")
					rutita=rutita.replace("liceo",ruta);
				else
					rutita=rutita.replace(regExp,ruta+"/post");

				// alert(rutita);
				link="<div class='permalink'><a href='"+rutita+"'>Continúa Leyendo <i class='fa fa-arrow-circle-right'></i></a></div>";
				pie="</div>";
				// pie+=r[i];
				texto+="<a href='"+rutita+"'>"+titulo+"</a>"+ladate+imagen+contenido+link+pie;
				imagen="";
			}
			nws.innerHTML=texto;
			var paginas=parseInt(ajax.getResponseHeader('x-wp-totalpages'));
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

function unicodeToChar(text) {
   return text.replace(/\\u[\dA-F]{4}/gi, 
          function (match) {
               return String.fromCharCode(parseInt(match.replace(/\\u/g, ''), 16));
          });
}
function stripslashes (str) {
  //       discuss at: http://locutus.io/php/stripslashes/
  //      original by: Kevin van Zonneveld (http://kvz.io)
  //      improved by: Ates Goral (http://magnetiq.com)
  //      improved by: marrtins
  //      improved by: rezna
  //         fixed by: Mick@el
  //      bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
  //      bugfixed by: Brett Zamir (http://brett-zamir.me)
  //         input by: Rick Waldron
  //         input by: Brant Messenger (http://www.brantmessenger.com/)
  // reimplemented by: Brett Zamir (http://brett-zamir.me)
  //        example 1: stripslashes('Kevin\'s code')
  //        returns 1: "Kevin's code"
  //        example 2: stripslashes('Kevin\\\'s code')
  //        returns 2: "Kevin\'s code"

  return (str + '')
    .replace(/\\(.?)/g, function (s, n1) {
      switch (n1) {
        case '\\':
          return '\\'
        case '0':
          return '\u0000'
        case '':
          return ''
        default:
          return n1
      }
    })
}
function saltoLinea(texto){
	// alert("si");
	var regExp=/\\n/g;
	return texto.replace(regExp,"");
}