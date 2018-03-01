<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
</head>

<body>

<?php

$nombre =$_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$puesto = $_POST['puesto'];
$mensaje = $_POST['mensaje'];
$sAdjuntos = "";
$para = 'hugogrim12@gmail.com';
$titulo = 'Mensaje de pag. web';

$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";


 
           foreach ($_FILES as $vAdjunto)
        {
 
            if ($bHayFicheros == 0)
            {
 
                // Hay ficheros 
 
                $bHayFicheros = 1;
 
                // Cabeceras generales del mail 
                $sCabeceras .= "Content-type: multipart/mixed;";
                $sCabeceras .= "boundary=\"".$sSeparador."\"\n";
 
                // Cabeceras del texto 
                $sCabeceraTexto = "--".$sSeparador."\n";
                $sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n";
                $sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n\n";
 
                $sCuerpo = $sCabeceraTexto.$sCuerpo;
 
            }
 
            // Se añade el fichero 
            if ($vAdjunto["size"] > 0)
            {
                $sAdjuntos .= "\n\n--".$sSeparador."\n";
                $sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n";
                $sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
                $sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";
 
                $oFichero = fopen($vAdjunto["tmp_name"], 'rb');
                $sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
                $sAdjuntos .= chunk_split(base64_encode($sContenido));
                fclose($oFichero);
            }
 
        }
 
        // Si hay ficheros se añaden al cuerpo 
        if ($bHayFicheros)
            $sCuerpo .= $sAdjuntos."\n\n--".$sSeparador."--\n";
        
if (mail ($para, $titulo, $msjCorreo)) {
echo '<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://www.itdmx.com/contacto.html"/>';
} else {
echo 'Falló el envio';

}

 ?>



</body>
</html>