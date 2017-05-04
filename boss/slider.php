<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-">
	<title>Slider</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="nav.css">
	<style type="text/css">
	h3{
		text-align:center;
	}
	.container {
	    display: flex;
	    flex-flow: column wrap;
	}
	.lossliders > div {
	    display: flex;
	}	
	
	.lossliders div span {
	    align-self: center;
	    background-color: #eee;
	    border: 1px solid;
	    display: block;
	    margin: 0.4em;
	    width: 122px;
	}

	.lossliders button {
	    background-color: #c01f39;
	    color: white;
	    cursor: pointer;
	    font-size: 1.2em;
	    font-weight: bold;
	    margin: 0.4em 1em;
  		-webkit-transition: all 0.5s ease-in-out 0s;
	  	transition: all 0.5s ease-in-out 0s;		
	    width: 110px;
	}

	.lossliders button:hover {
	    background-color: #888;
	    color: #000;
	}	
	.videos {
	    background-color: #ddd;
	    border: 1px solid;
	    flex-basis: 20%;
	    padding: 2em;
	}
	</style>
</head>
<body>
	<div id="main">
		<?php
			// include_once("nav.php");
		?>
		<section>
			<div class="container">
                <?php $images = scandir( '../images/slides' ); unset( $images[0], $images[1] ); ?>
                <input type="hidden" id="imagesSlider" name="imagesSlider" value="<?php echo join( ",", $images ); ?>" />
				<h3>Slider</h3>
				<div class="botones">
					<button class="importar">Importar</button>
					<button class="guardar">Guardar</button>
				</div>
				<div class="videos">
					<div class="lossliders"></div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		window.addEventListener("load",initia,false);
		var documento;
		function importar(){
			var imgs = document.getElementById( 'imagesSlider' ).value.split( ',' );
            document.querySelector(".lossliders").innerHTML="";
			var params={'fecha':Date()};
			var xml=new XMLHttpRequest();
			xml.open("GET","../slider.json",true);
			xml.setRequestHeader("Content-type","text/xml;charset=UTF8");
			xml.setRequestHeader("Content-length", params.length);
			xml.setRequestHeader("Connection","close");
			xml.onreadystatechange=function(){
			if(xml.readyState!=4 || xml.status!=200) return;
				documento=JSON.parse(xml.responseText);
                for( i = 0; i < documento['slider'].length; i++ ){
                    imgs.splice( imgs.indexOf( documento['slider'][i].img ), 1 );
                    newLine(documento['slider'][i].img, documento['slider'][i].url, documento['slider'][i].title, 0 );
                }
                for( i = 0; i < imgs.length; i++ ){
                    newLine( imgs[i], '', '', 0 );
                }
				var boton=document.createElement("button");
				boton.className="anade";
				boton.innerHTML="+";
				boton.addEventListener("click",anade,false);
				document.querySelector(".lossliders").appendChild(boton);
				 // console.log(documento['videos'][top].video[a]);
			}
			xml.send(params);
		}

		function anade(evt){
			newLine( '', '', '', 1 );
		}
		function borra(evt){
			evt.target.parentNode.remove();
		}
		function initia(){
			document.querySelector("button.guardar").addEventListener("click",guardar,false);
			document.querySelector("button.importar").addEventListener("click",importar,false);
		}
		function queteclaes(evt){
			var ev = (evt) ? evt : event;
			try{
				var tecla=(ev.which) ? ev.which:event.keyCode;
			}catch(e){
				return;
			}
			if(tecla==13)
				evt.preventDefault();
		}
        function newLine( img, url, title, last ){
            var div=document.createElement("div");
			var spanImg=document.createElement("span");
			var spanUrl=document.createElement("span");
			var spanTitle=document.createElement("span");
            var boton=document.createElement("button");
			boton.innerHTML="-";
            spanImg.contentEditable=true;
			spanImg.addEventListener("keydown",queteclaes,false);
			spanImg.textContent=img;
			spanUrl.contentEditable=true;
			spanUrl.addEventListener("keydown",queteclaes,false);
			spanUrl.textContent=url;
			spanTitle.contentEditable=true;
			spanTitle.addEventListener("keydown",queteclaes,false);
			spanTitle.textContent=title;
            div.appendChild(spanImg);
			div.appendChild(spanUrl);
            div.appendChild(spanTitle);
			div.appendChild(boton);
            boton.addEventListener("click",borra,false);
			if( last == 1 ){
		      document.querySelector(".lossliders").insertBefore(div,document.querySelector(".lossliders").lastChild);
			} else {
		      document.querySelector(".lossliders").appendChild(div);
			}
        }
        
		function guardar(evt){
            var lines=document.querySelectorAll(".lossliders div span");
            var obj = '';
            for( i = 0; i < lines.length; i++ ){
                obj = ( obj != '' ) ? obj + ',' : '';
                obj = obj + '{"img":"' + lines[i].textContent + '","url":"' + lines[i+1].textContent + '","title":"' + lines[i+2].textContent + '"}';
                i++;
                i++;
            }
            var json = '{"slider":['+obj+']}';
            if(!confirm("Estás a punto de sobreescribir los menús, ¿Deseas Continuar?"))return;
			var r = new XMLHttpRequest();
			r.open("POST","guardarjsonslider.php", true);
			r.setRequestHeader("Content-type", "application/x-www-form-urlencoded" );
			r.setRequestHeader("Content-length", documento.length);
			r.setRequestHeader("Connection", "close");	
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				alert(r.responseText);
			};
			r.send(json);
		}
	</script>
</body>
</html>