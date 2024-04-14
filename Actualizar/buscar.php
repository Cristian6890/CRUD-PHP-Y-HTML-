<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidad";

$conn = new mysqli($servername, 
$username, $password, 
$dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . 
    $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    $atributo = $_POST['atributo'];
    $nuevo_valor = $_POST['nuevo_valor'];

    
    $sql = "UPDATE estudiantes SET $atributo='$nuevo_valor' WHERE identificacion='$identificacion'";

    if ($conn->query($sql) === TRUE) {
        echo "Dato actualizado correctamente.";
    } else {
        echo "Error al actualizar atributo: " . $conn->error;
    }
}

$conn->close();
?>
