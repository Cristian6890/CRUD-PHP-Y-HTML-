<!DOCTYPE html>
<html>
    <header>
        <title>
            Mostra imagen
        </title>
    </header>
    <body>
        <center>
        <table border="2">
            <thead>

            <tbody> 
                <tr>
               <th> ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Operaciones</th>
                </tr> 
                
            </tbody>
            <?php
            include("conexion_base.php");
            
            
            $query = "SELECT * FROM base_imagen";
            $resultado = $conn->query($query);
            while($row = $resultado->fetch_assoc()){

            ?>
            <tr>
                <td> <?php echo $row ['id']; ?></td>
                <td> <?php echo $row ['nombre']; ?></td>
                <td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>"/></td>

            </tr>

            <?php

            }
        ?>

            </thead>

        </table>

</center>
    </body>
</html>