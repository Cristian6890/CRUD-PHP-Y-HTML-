<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Opciones</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
  <img src="img/datos-del-usuario.png" alt="Descripción de la imagen" class="left-image">
    <h1>Menú Opciones </h1>
    <div>
      <a href="Formulario/formulario.html" class="lesson-button">Ingresar</a>
      <a href="Actualizar/base.html" class="lesson-button">Actualizar</a>
      <a href="Eliminar/prueba.html" class="lesson-button">Eliminar</a>
      <a href="listar/lista_datos.php" class="lesson-button">Listar</a>
   
    </div>
  </div>
</body>
</html>

    <?php
    //Conexion 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidad";
$conn = new mysqli(
$servername, 
$username, 
$password, 
$dbname);

//Validacion de la conexion
if ($conn->connect_error) {
    die("Conexión fallida: " . 
    $conn->connect_error);
}

//Muetra de la tabla 
$sql = "SELECT * FROM estudiantes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>Identificación</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Tipo de Teléfono</th>
    <th>Teléfono</th>
    <th>Edad</th>
    <th>Género</th>
    <th>Descripción</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['identificacion'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
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
</body>
</html>
