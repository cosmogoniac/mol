window.addEventListener("load", ahax, false);
function st(evt){
    evt.preventDefault();
    var t=document.querySelector("[name='promocion']");
    window.scrollTo(0,t.scrollWidth+100);    
}
function ahax() {
    var viaja=document.querySelector(".viaja")
    viaja.addEventListener("click",st,false);
    var a;
    var b;
    var c;
    var d;
    var f;
    var g;
    var h;
    var j;
    var k = document.querySelectorAll(".news");
    var l = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    var m = new XMLHttpRequest();
    var ruta=window.location.href;
    var texto="";
var rutacompleta = window.location.origin;
var url=window.location.pathname.substr(1);    
    if(rutacompleta.indexOf("localhost")>-1)
        rutacompleta="http://localhost/liceo";
    else
        rutacompleta="http://www.lyceemolieresaragosse.org";
    m.open("GET",rutacompleta+"/wp-json/wp/v2/posts?per_page=2&categories=45", true);
    m.setRequestHeader("Content-type", "application/json;charset=UTF8");
    m.setRequestHeader("Connection", "close");
    m.onreadystatechange = function() {
        if (m.readyState != 4 || m.status != 200) return;
        try {
            var r = JSON.parse(m.responseText);
            for (i in r) {
                a = "<h3>" + r[i].title.rendered + "</h3>";
                d = new Date(r[i].date);
                f = d.getDate();
                g = l[d.getMonth()];
                j = d.getFullYear();
                b = sanea(r[i].excerpt.rendered);
                h = "<div class='ladate'>" + f + " " + g + ", " + j + "</div>";
                var rutita=r[i].link;
                var regExp=/^h.{3,4}:\/\/.{3}\..*\..{3,4}\/\d{4}\/\d{2}/;
                if(window.location.host=="localhost"){
                    var j=window.location.pathname+"post/";
                    j=j.replace("red-alumni/","");
                    rutita=rutita.replace("/liceo/",j);                    
                }else{
                    rutita=rutita.replace(regExp,ruta+"post");
                    rutita=rutita.replace("red-alumni/","");
                }
                a="<a href='"+rutita+"'>"+a+"</a>";
                c = "<div class='permalink'><a href='" + rutita + "'>Continúa Leyendo <i class='fa fa-arrow-circle-right'></i></a></div>";
                k[i].innerHTML = a + h + b + c;
            }
        } catch (e) {};
        if (!r) alert(m.responseText)
    };
    m.send(JSON.stringify(null))
};
function sanea(content){
    patron=/\[.?vc_row\]?/;
    sustituye='';
    content=content.replace(patron,sustituye);    
    patron=/\[.?vc_column\]?/;
    sustituye='';
    content=content.replace(patron,sustituye);    
    patron=/\[.?vc_column_text\]?/;
    sustituye='';
    content=content.replace(patron,sustituye);    
    patron=/\[caption id.*\]?<img/;
    sustituye='<img';
    content=content.replace(patron,sustituye);    
    patron=/\[\/caption\]?/;   
    sustituye='/>';
    content=content.replace(patron,sustituye); 
    return content;  
}