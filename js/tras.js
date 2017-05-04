window.addEventListener("load",init,false);
function init(){
	var t=["Bac S","Bac ES","Bac L"];
	var biparrafo=document.querySelectorAll(".biparrafo");
	for(i in biparrafo){
		if(biparrafo[i].tagName){
			var separacion=document.createElement("div");
			separacion.className="separacion";
			var mid=document.createElement("span");
			mid.className="mid";
			var mid2=document.createElement("span");
			mid2.className="mid";
			var line=document.createElement("span");
			line.className="line";
			mid.appendChild(line);
			separacion.appendChild(mid);
			var lit=document.createElement("span");
			lit.className="lit";
			var fa=document.createElement("span");
			fa.className="fa fa-signal";
			lit.appendChild(fa);
			var bachiller=document.createTextNode(t[i]);
			lit.appendChild(bachiller);
			separacion.appendChild(lit);
			separacion.appendChild(mid2);
			document.querySelector(".tras").insertBefore(separacion,biparrafo[i]);
		}
	}
}