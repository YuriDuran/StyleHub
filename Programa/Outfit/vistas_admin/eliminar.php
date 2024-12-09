<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php
include "../conexion.php";

$id = $_POST['id'];

$id_usuario = $id;

$eliminar = $_POST['id_producto'];
$sentencia = $conexion -> query("DELETE FROM `productos` WHERE id_producto = $eliminar");
?>



    
