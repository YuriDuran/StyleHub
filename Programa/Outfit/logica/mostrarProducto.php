<?php
    include("conexion.php");

    $sql = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $sql);

    while($filas = mysqli_fetch_assoc($resultado)){
        
    }
?>