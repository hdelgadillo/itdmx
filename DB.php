<?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "itdmx";

date_default_timezone_set("America/Mexico_City");
//tomo el valor de un elemento de tipo texto del formulario 
$cadenatexto = $_POST["nombre"]; 
echo "Escribió en el campo de texto: " . $cadenatexto . "<br><br>"; 

//datos del arhivo 
$ruta="cv/";
$nombre_archivo = date('F j, Y, g_i_s a')."_".$_POST["nombre"].".pdf";
$tipo_archivo = $_FILES['fichero']['type']; 
$tamano_archivo = $_FILES['fichero']['size']; 
$archivo1=$_FILES['fichero']['tmp_name'];
//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "docx") || strpos($tipo_archivo, "pdf")) && ($tamano_archivo < 10485760))) { 
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .docx o .pdf <br><li>se permiten archivos de 10 mb máximo.</td></tr></table>"; 
}else{ 
    if (move_uploaded_file($archivo1,$ruta ."/" .$nombre_archivo)){ 
        echo "El archivo ha sido cargado correctamente."; 
    }else{ 
        echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
    } 
} 

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
            
            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "INSERT INTO vacante(nombre,correo,telefono,puesto,cv)VALUES ('".$_POST["nombre"]."','".$_POST["email"]."','".$_POST["telefono"]."','".$_POST["puesto"]."','".$nombre_archivo."')";
 
            if (mysqli_query($conn, $sql)) {
               echo "Registro ingresado correctamente";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         
?>
