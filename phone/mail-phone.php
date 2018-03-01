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
$mensaje = $_POST['mensaje'];
$para = 'contacto@itdmx.com';
$titulo = 'Mensaje de pag. web';

$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";


if (mail ($para, $titulo, $msjCorreo)) {
echo '<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://www.itdmx.com/phone/contacto.html"/>';
} else {
echo 'Falló el envio';

}

 ?>



</body>
</html>