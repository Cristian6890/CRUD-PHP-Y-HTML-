<?php
// Conexión a la base de datos (suponiendo que ya tienes esto configurado)
$conexion = new mysqli("localhost", "root", "", "universidad");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if (isset($_POST['buscar'])) {
    $identificacion = $_POST['identificacion'];

    // Consulta para buscar el usuario por identificación
    $consulta = "SELECT * FROM estudiantes WHERE identificacion='$identificacion'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        // Mostrar los datos del usuario encontrado
        $fila = $resultado->fetch_assoc();
        echo "<h3>Datos del Usuario:</h3>";
        echo "<p>Nombre: {$fila['nombre']}</p>";
        echo "<p>Apellido: {$fila['apellido']}</p>";
        echo "<p>Identificación: {$fila['identificacion']}</p>";
        echo "<p>Tipo de Teléfono: {$fila['tipo_telefono']}</p>";
        echo "<p>Teléfono: {$fila['telefono']}</p>";
        echo "<p>Edad: {$fila['edad']}</p>";
        echo "<p>Género: {$fila['genero']}</p>";
        echo "<p>Descripción: {$fila['descripcion']}</p>";

        // Botón para confirmar la eliminación
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='identificacion' value='{$fila['identificacion']}'>";
        echo "<button type='submit' name='eliminar'>Eliminar Usuario</button>";
        echo "</form>";
    } else {
        echo "<p>No se encontró ningún usuario con esa identificación.</p>";
    }

    // Liberar el resultado
    $resultado->free();
}

if (isset($_POST['eliminar'])) {
    $identificacion = $_POST['identificacion'];

    // Consulta para eliminar el usuario por identificación
    $consulta = "DELETE FROM estudiantes WHERE identificacion='$identificacion'";
    
    if ($conexion->query($consulta) === TRUE) {
        echo "<p>No se encontró ningún usuario con esa identificación.</p>";
        $mensaje = "Usuario eliminado exitosamente."  ;
    } else {
        $mensaje = "Error al eliminar el usuario: " . $conexion->error;

    }

    // Redirigir de nuevo al formulario con el mensaje
    header("Location: eliminar.php?mensaje=$mensaje");
}

// Cerrar conexión
$conexion->close();
?>

