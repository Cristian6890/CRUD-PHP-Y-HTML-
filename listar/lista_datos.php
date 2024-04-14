<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidad";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT * FROM estudiantes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Identificación</th>
    <th>Tipo de Teléfono</th>
    <th>Teléfono</th>
    <th>Edad</th>
    <th>Género</th>
    <th>Descripción</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "<td>" . $row['identificacion'] . "</td>";
        echo "<td>" . $row['tipo_telefono'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['edad'] . "</td>";
        echo "<td>" . $row['genero'] . "</td>";
        echo "<td>" . $row['descripcion'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();
?>
