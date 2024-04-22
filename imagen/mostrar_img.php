<!DOCTYPE html>
<html>
<head>
    <title>Mostrar imágenes</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <center>
        <div class="image-row">
            <?php
            include("conexion_base.php");
            $query = "SELECT * FROM base_imagen";
            $resultado = $conn->query($query);
            while($row = $resultado->fetch_assoc()){
            ?>
            <div class="image-item">
                <p>ID: <?php echo $row['id']; ?></p>
                <p>Nombre: <?php echo $row['nombre']; ?></p>
                <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="Imagen <?php echo $row['id']; ?>" />
            </div>
            <?php
            }
            ?>
        </div>
    </center>
</body>
</html>
