var form=document.querySelector("form");
var els=form.querySelectorAll("input[name]:not([type='radio']):not([type='submit']),select,checkbox,textarea");

window.addEventListener("load",formulario,false);


function formulario(evt){
	document.querySelector("form").addEventListener("submit",enviar,false);
	document.querySelector(".limpiar").addEventListener("click",limpiar,false);
}


function enviar(evt){
	evt.preventDefault();
	var json=formaJSON();
	var ajax=new XMLHttpRequest();
	ajax.open("POST","../sistema/contacto.php",true);
	ajax.setRequestHeader("Content-type","application/json;charset=UTF8");
	ajax.setRequestHeader("Content-length",json.length);		
	ajax.setRequestHeader("Connection", "close");
	ajax.onreadystatechange=function(){
		if(ajax.readyState!=4 || ajax.status!=200) return;
			alert(ajax.responseText);
			document.querySelector(".limpiar").click();
	};
	ajax.send(JSON.stringify(json));
}

function limpiar(evt){
	evt.preventDefault();
	form.reset();
	
}

function formaJSON(){
	var obj={};
	for(var i in els)
		if(els[i].tagName)
			obj[els[i].name]=els[i].value;
		
	return obj;
}