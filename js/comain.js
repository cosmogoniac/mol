var alto;
var haut;
var header = document.querySelector("header");
var arriba = document.querySelector(".arriba");
var cierre = document.querySelector(".cierre");
var reduce = document.querySelector("nav.reduciendo");
var encabezado = document.querySelector(".header");
var btn = document.querySelectorAll(".btn");
var tapando = document.querySelector(".tapando");
var iterator=3;
var figuras=document.querySelectorAll("figure");
var figurinas=document.querySelectorAll("select option");
var tope=figurinas.length-1;
var guarda;
var start = 1;
var cont = 0;
var prox;
var tempo;
var comandos;
var direccion;
var rutacompleta = window.location.origin;
var url=window.location.pathname.substr(1);
window.addEventListener("load", menu, false);

function menu() {
    if (window.innerWidth > 736) alto = header.clientHeight;
    else alto = 32;
    haut = encabezado.clientHeight;
    if (cierre) cierre.addEventListener("click", cierra, false);
    if (reduce) reduce.addEventListener("click", minimenu, false);
    arriba.addEventListener("click", hastarriba, false);
    var a = document.querySelectorAll(".clack");
    for (i in a)
        if (a[i].tagName) a[i].addEventListener("click", enlinka, false);

    for (i in btn)
        if (btn[i].tagName) btn[i].addEventListener("click", dalink, false);
    document.querySelector(".videomol").addEventListener("click",videoIn,false);
    tempo = setInterval("cambia()", 5000);
    setTimeout("comienza()",10000);
    window.addEventListener("scroll",elScroll,false);
    var f = document.querySelectorAll(".buscar input,.flecha");
    if (!f[0]) return;
    f[0].addEventListener("keyup", tecla, false);
    f[1].addEventListener("click", tecla, false);
    var wf=document.querySelector(".willy-lupa");
    if(!wf) return;
    wf.addEventListener("click",muestraBq,false);
 }

function muestraBq(evt){
    var buscar=document.querySelector(".buscar");
    if(buscar.className.indexOf("oculto")>-1){
        buscar.className="buscar";
        buscar.querySelector("input").focus();
    }
    else
        buscar.className="buscar oculto";
}

function comienza(){
    var imgLoaded = document.getElementsByTagName( 'figure' ).length;
    var imgTotal = document.getElementById( 'figurinas' );
    if( imgTotal.length  != 0){
        for( i = 3; i < imgTotal.length; i++ ){
            var image = imgTotal.options[i];
            var imageId = image.getAttribute("data-id");
            var imageSrc = image.textContent;
            var imageTitle = image.getAttribute("data-alt");
            var imageUrl =  image.getAttribute("data-url");
            document.getElementById('images').appendChild( newFigure( imageId, imageSrc, imageTitle, imageUrl ) );   
        }
    }
}

function newFigure( imageId, imageSrc, imageTitle, imageUrl ){
    var node = document.createElement("figure");
    node.className = 'imagenes';
    node.innerHTML = '<img id="' + imageId + '" alt="' + imageTitle + '" src="' + imageSrc + '" /><figcaption><a class="enlaceSpan" href="' + imageUrl +  '">' + imageTitle + '<span class="willy willy-mano"></span></a></figcaption>';
    return node;
}

function cambia(){
    var imgFigures = document.getElementsByTagName( 'figure' );
    for( i = 0; i < imgFigures.length; i++ ){
        if( imgFigures[i].classList.contains( 'actiu' ) ){
            imgFigures[i].classList.remove( 'actiu' );
            j = ( i != imgFigures.length-1 ) ? i+1 : 0;
            imgFigures[j].classList.add( 'actiu' );
            i = imgFigures.length;
        }
    }
}

function videoIn(){
    var iframe=document.querySelector("iframe");
    iframe.className="";
    iframe.src = "https://www.youtube.com/embed/q-CtVB3PxZg?autoplay=1";
    document.querySelector(".videomol").className="hidden";
}

function dalink(a) {
    var b = a.target.querySelector("a");
    if (!b) return;
    location.href = b.href
}

function enlinka(a) {
    var b = a.target.querySelector("a");
    if (!b) b = a.target.parentNode.querySelector("a");
    location.href = b.href
}

function cierra(a) {
    document.querySelector("nav.principal").style.display = "none";
    document.querySelector("nav.reduciendo").style.display = "flex";
    if (document.querySelector(".elprezi")) document.querySelector(".elprezi").style.display = "block"
}

function hastarriba(e) {
    window.scrollTo(0, 0)
}

function elScroll(e) {
    if (window.scrollY >= alto) {
        header.className = "oculto";
        arriba.className = "arriba opaUno";
    } else {
        header.className = "";
        arriba.className = "arriba";
    }
}

function minimenu(a) {
    document.querySelector("nav.principal").style.display = "flex";
    if (document.querySelector(".elprezi")) document.querySelector(".elprezi").style.display = "none";
    document.querySelector("nav.reduciendo").style.display = "none"
}

function tecla(a) {
    if (a.target.tagName != "SPAN") {
        var b = (a.which) ? a.which : a.keyCode;
        if (b != 13) return
    }
    var c = document.querySelector(".buscar input");
    c.value = trim(c.value);
    if (c.value == "") return;
    var tapando=document.querySelector(".tapando");
    var img=document.createElement("img");
    var rutacompleta=document.getElementById("rutacompleta");
    img.src=rutacompleta+"images/cargando.gif";
    var buscar=document.querySelector(".buscar");
    var input=buscar.querySelector("input");
    buscar.className="buscar oculto";
    input.value="";
    tapando.appendChild(img);
    ajx(c.value)
}

function trim(a) {
    a = a.replace(/^\s*/g, "");
    a = a.replace(/\s*$/g, "");
    return a
}

function ajx(c) {
    var d = new XMLHttpRequest();
    var f;
    var g;
    var h;
    var j;
    var k;
    var l = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    tapando.className = "tapando on";
    document.body.style = "overflow:hidden";
    d.open("GET", "http://www.lyceemolieresaragosse.org/wp-json/wp/v2/posts?search=" + c + "&categories=19", true);
    d.setRequestHeader("Content-type", "application/json;charset=UTF8");
    d.setRequestHeader("Connection", "close");
    d.onreadystatechange = function() {
        if (d.readyState != 4 || d.status != 200) return;
        try {
            tapando.querySelector("img").className = "oculto";
            var a = JSON.parse(d.responseText);
            var b = "";
            for (i in a) {
                f = "<div class='entry'><a href='" + a[i].link + "'><h3>" + a[i].title.rendered + "</h3>";
                g = new Date(a[i].date);
                h = g.getDate();
                j = l[g.getMonth()];
                k = g.getFullYear();
                ladate = "<span class='ladate'>" + h + " " + j + ", " + k + "</span></a></div>";
                b += f + ladate
            }
            if (a.length == 0) b = "<h3>Lo sentimos, su búsqueda no ha obtenido resultado.</h3>";
            document.querySelector(".cruzada").innerHTML += b;
            document.querySelector(".cruzada").className = "cruzada";
            document.querySelector(".cruzada .cierra").addEventListener("click", closeSearch, false)
        } catch (e) {};
        if (!a) alert(d.responseText)
    };
    d.send(null)
}

function closeSearch(a) {
    var cruzada=document.querySelector(".cruzada");
    tapando.querySelector("img").className = "";
    tapando.className = "tapando";
    document.body.style = "overflow:auto";
    cruzada.innerHTML = "<span class='cierra'>X</span>";
    cruzada.className="cruzada oculto";   
}
