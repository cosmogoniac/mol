<?php
session_start();
if(!isset($_SESSION['route'])){
  $rutacompleta= "http://".$_SERVER["HTTP_HOST"];
  $url= $_SERVER["REQUEST_URI"];
  if((strpos($url,"localhost")!==false))
    $rutacompleta.=(strpos($url,"framol")===false)?"/pruebamoliere":"/framol";
  else
    $rutacompleta.=(strpos($url,"framol")===false)?"/otros/moliere":"/otros/framol";

  $_SESSION['route']=$rutacompleta;
}
  $recibe=json_decode(file_get_contents('php://input'));
  $dir=opendir('.');
  $ars=array();
  if(($recibe->ecrire!=1))
    $archivos=json_decode(file_get_contents('provincias.json'));
  $fichiers=array();
  while($arch=readdir($dir)){
        if(!is_dir($arch)){
          $carpeta=".";
          $nombre=substr($arch,0,strrpos($arch,"."));
          $tipo=substr($arch,strrpos($arch,".")+1);
          $fecha=date ("d-m-Y, H:i:s", filemtime($arch));
          $tamano=filesize($arch);
          $miu=["archivo"=>"./".$nombre.".".$tipo,"carpeta"=>".","nombre"=>$nombre,"tipo"=>$tipo,"fecha"=>$fecha,"tamano"=>$tamano];
          array_push($fichiers,$miu);
        }else{
          if($arch!=".")
            recursivo(substr($arch,strrpos($arch,".")));
        }
  }
//escritura
  if($recibe->ecrire==1){
    echo "ecrire";
    $json=json_encode($fichiers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    file_put_contents('provincias.json',$json);
    die();
  }
  echo "lire";  
// lectura
  $laip=getRealIP();
  $cabecera="<!DOCTYPE html>";
  $cabecera.='<html lang="fr">';
  $cabecera.='<head>';
  $cabecera.='<meta charset="UTF-8">';
  $cabecera.='<title>archivos</title>';
  $cabecera.='<style>';
  $cabecera.='.biparrafo{display:flex;flex-flow:row wrap;justify-content: space-around;}';
  $cabecera.='.columna{border: 1px solid black;flex-basis: 48%;text-align: center;margin-top:1em;}';
  $cabecera.='.columna .nombre{background-color: #eee;}';
  $cabecera.='.columna.actual .nombre{background-color: #5FBA7D;}';
  $cabecera.='.columna.resguardo .nombre{background-color: #8892BF;}';
  $cabecera.='.columna.nuevo .nombre{background-color: #C01F39;flex-basis:100%;}';
  $cabecera.='div.ctr,.ip{text-align:center;}';
  $cabecera.='</style>';
  $cabecera.='</head>';
  $cabecera.='<body>';
  $cabecera.='<h3>Site Français</h3>';
  $cabecera.='<div class="ip">'.$laip."</div>";
  $cabecera.='<div class="biparrafo">';
  $pie="</div>";
  $pie.="<div class='ctr'>\n";
  $pie.="<a href='<?php echo $_SESSION['route'];?>/boss/lire.php'>Lire</a></div>";
  $pie.="</body>";
  $pie.="</html>";
  $json=json_decode(json_encode($fichiers));
  $literal="";
  foreach($json as $unico=>$archivo){
    $i=0;
    while($archivo->archivo!=$archivos[$i]->archivo && $i<count($archivos))
      $i++;
    if($archivo->archivo==$archivos[$i]->archivo){
      if(($archivo->fecha!=$archivos[$i]->fecha) || ($archivo->tamano!=$archivos[$i]->tamano)){
          if($archivo->nombre!="provincias" || ($archivo->nombre=="provincias" && ($archivo->tamano!=$archivos[$i]->tamano))){
            $literal.="<div class='columna actual'>";
            $literal.="<div class='nombre'>".$archivo->nombre."</div>";
            $literal.="<div class='archivo'>".$archivo->archivo."</div>";
            $literal.="<div class='tamano'>".$archivo->tamano." bytes</div>";
            $literal.="<div class='fecha'>".$archivo->fecha."</div>";
            $literal.="</div>";
            $literal.="<div class='columna resguardo'>";
            $literal.="<div class='nombre'>".$archivos[$i]->nombre."</div>";
            $literal.="<div class='archivo'>".$archivos[$i]->archivo."</div>";
            $literal.="<div class='tamano'>".$archivos[$i]->tamano." bytes</div>";
            $literal.="<div class='fecha'>".$archivos[$i]->fecha."</div>";
            $literal.="</div>";
          }
        }
    }else{
          $literal.="<div class='columna nuevo'>";
          $literal.="<div class='nombre'>".$archivo->nombre."</div>";
          $literal.="<div class='archivo'>".$archivo->archivo."</div>";
          $literal.="<div class='tamano'>".$archivo->tamano." bytes</div>";
          $literal.="<div class='fecha'>".$archivo->fecha."</div>";
          $literal.="</div>";
    }

  }
  // echo $literal;
  if($literal=="")
    die();
  $asunto="Formulario de Aviso";
  $mensaje=$cabecera.$literal.$pie;
  $headers = "From: facil@webmilia.com\r\n";
  $headers.= 'MIME-Version: 1.0' . "\r\n";
  $headers.='Content-type: text/html; charset=utf-8' . "\r\n";
  $headers.='Content-Transfer-Encoding: 8bit';
  // $headers.="Bcc: $cco. \r\n";
  mail("guillermogarciarouge@gmail.com",$asunto,$mensaje,$headers);


  function recursivo($carpeta){
    global $fichiers;
    if($carpeta==".")
      return;
    $subdir=opendir($carpeta);
     while($subarch=readdir($subdir)){
          if(!is_dir($carpeta."/".$subarch)){
            $nombre=substr($subarch,0,strrpos($subarch,"."));
            $tipo=substr($subarch,strrpos($subarch,".")+1);
            $fecha=date ("d-m-Y, H:i:s", filemtime($carpeta."/".$subarch));
            $tamano=filemtime($carpeta."/".$subarch);
            $miu=["archivo"=>$carpeta."/".$nombre.".".$tipo,"carpeta"=>$carpeta,"nombre"=>$nombre,"tipo"=>$tipo,"fecha"=>$fecha,"tamano"=>$tamano];
            array_push($fichiers,$miu);         
          }else{
            if($subarch!=".." && $subarch!="."){
              recursivo($carpeta."/".substr($subarch,strrpos($subarch,".")));
            }
          }
    }

  }

  function getRealIP()
  {
   
     if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
     {
        $client_ip = 
           ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
              $_SERVER['REMOTE_ADDR'] 
              : 
              ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
                 $_ENV['REMOTE_ADDR'] 
                 : 
                 "unknown" );
   
        $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);
   
        reset($entries);
        while (list(, $entry) = each($entries)) 
        {
           $entry = trim($entry);
           if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
           {
              // http://www.faqs.org/rfcs/rfc1918.html
              $private_ip = array(
                    '/^0\./', 
                    '/^127\.0\.0\.1/', 
                    '/^192\.168\..*/', 
                    '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
                    '/^10\..*/');
   
              $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
   
              if ($client_ip != $found_ip)
              {
                 $client_ip = $found_ip;
                 break;
              }
           }
        }
     }
     else
     {
        $client_ip = 
           ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
              $_SERVER['REMOTE_ADDR'] 
              : 
              ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
                 $_ENV['REMOTE_ADDR'] 
                 : 
                 "unknown" );
     }
     return $client_ip;
  }
?>