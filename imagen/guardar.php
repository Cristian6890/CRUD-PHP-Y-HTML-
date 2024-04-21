<?php

include("conexion_base.php");


$nombre = $_POST ['nombre'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO  base_imagen(nombre, imagen) VALUES('$nombre','$imagen')";
$resulstado = $conn->query($query);

if($resulstado){
    echo"Se inserto correctamen";
}
else{
    echo"Erro al subir la imagen";
}

?>
