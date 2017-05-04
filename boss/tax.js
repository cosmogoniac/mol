var num=0;
window.addEventListener("load",initia,false);

function initia(evt){
	document.querySelector("form").addEventListener("submit",somete,false);
}

function somete(evt){
	evt.preventDefault();
	var ape1=document.querySelector("#apellido").value;
	var ape2=document.querySelector("#apellido2").value;
	if(ape1!=ape2){
		alert("Campos distintos");
		return;
	}
	var apellido=clef(document.querySelector("#apellido").value);
	// alert(apellido);
	var params={"apellido":apellido};
	var r = new XMLHttpRequest();
	r.open("POST","cp.php", true);
	r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
	r.setRequestHeader("Content-length", params.length);
	r.setRequestHeader("Connection", "close");	
	r.onreadystatechange = function () {
		if (r.readyState != 4 || r.status != 200) return;
			alert(r.responseText);
	};
	r.send(JSON.stringify(params));		
}



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