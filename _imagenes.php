<?php
			// echo '<h1>'.$carpeta.'</h1>';
			echo "<div id='imagenes'>";
			$todas="";
			$comselec="";
			$dir=opendir("images/slides");
			while($arch=readdir($dir)){
					if(!is_dir($arch) && strpos($arch,".") && strpos($arch,"max_")===FALSE)
					$ars[]=$arch;
				// echo $arch;
			}
			sort($ars);
			foreach($ars as $valor=>$files){
				$file	=	substr($files,0,strpos($files,"."));
				$values=$valor+1;
				$actiu=($values==2)?" actiu":"";
				// echo $cas." ".$actiu;
				$explota=explode("_",$file);
				$nomfile=implode(" ",$explota);
				// $elid=$explota[0].$values;
				$elid=implode("",$explota);
				// $todas.="<div style='display:block'>$files</div>";
					// $todas.= "<figure class='imagenes$actiu'><img id='$elid' alt='$nomfile' src='images/slides/$files'><figcaption>$files</figcaption></figure>".PHP_EOL;
				if($valor<3)
					$todas.= "<figure class='imagenes$actiu'><img id='$elid' alt='$nomfile' src='images/slides/$files'></figure>".PHP_EOL;
				$comselec.="<option value='$elid' data-id='$elid' data-alt='$nomfile'>images/slides/$files</option>";
			}
			closedir($dir);
			$todas.="<select class='ciego' id='figurinas'>$comselec</select>";
			echo $todas;
			echo "</div>";
			// echo '<img id="rw" src="images/sis/izda.png" alt="izda" class="direccion"/>';
			// echo '<img id="ff" src="images/sis/dcha.png" alt="dcha" class="direccion"/>';
?>