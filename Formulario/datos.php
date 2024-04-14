<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $identificacion = $_POST['identificacion'];
    $tipo_telefono = $_POST['tipo_telefono'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $descripcion = $_POST['descripcion'];

    // Parametros de conexion 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "universidad"; 

    // Se crea la conexión
    $conn = new mysqli(
        $servername, 
        $username, 
        $password, 
        $database
    );

    // se valida la conexion 
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar nuevos datos
    $sql_insert = "INSERT INTO estudiantes (identificacion, nombre, apellido, tipo_telefono, telefono, edad, genero, descripcion)
    VALUES ('$identificacion','$nombre', '$apellido', '$tipo_telefono', '$telefono', '$edad', '$genero', '$descripcion')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
}

$conn->close();
?>
