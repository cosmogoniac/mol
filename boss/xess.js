var num=0;
window.addEventListener("load",initia,false);

function initia(evt){
	document.querySelector("form").addEventListener("submit",somete,false);
}

function somete(evt){
	evt.preventDefault();
	document.querySelector("#apellido").value=clef(document.querySelector("#apellido").value);
	document.querySelector("form").submit();
	// var params={"email":document.querySelector("#email").value,"apellido":apellido};
	// var r = new XMLHttpRequest();
	// r.open("POST","acceso.php", true);
	// r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
	// r.setRequestHeader("Content-length", params.length);
	// r.setRequestHeader("Connection", "close");	
	// r.onreadystatechange = function () {
	// 	if (r.readyState != 4 || r.status != 200) return;
	// 	// alert(r.responseText);
	// 	if(r.responseText.indexOf("Error al conectar")>-1 && r.responseText!="logueado"){
	// 		alert("Error al conectar"+num);
	// 		num++;
	// 		if(num>=3)
	// 			location.href="..";
	// 	}else{
	// 		alert(r.responseText);
	// 		location.href="http://cineymusica.es/otros/framol/boss/calendario.php";
	// 	}
	// };
	// r.send(JSON.stringify(params));
}

//111-$P$BFjbJfdxFV0yBqFdDAOKlVhXdHADos1---->sha1->6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2
//hola-									---->sha1-99800b85d3383e3a2fb45eb7d0066a4879a9dad0

// $P$B1utN/0x7Cvs02LpEbp9G/4iB9Stuf1
// function validarForm(){19177e650a5b0cba73bdfd561461b34fb2acdb45
// 	$("#pass").val(clef($("#pass").val()));
// return true;
// }

// function formarSinJSON(nombre_form){
// 	var obj={};
// 	$("#" + nombre_form + " :input[type!=submit]").each(function () {
// 		obj[$(this).attr("id")] = $(this).val();
// 	});
// return obj;
// }