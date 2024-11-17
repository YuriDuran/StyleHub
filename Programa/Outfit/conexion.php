<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "outfit";

// Corregir la creación de la conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

if ($conexion->connect_errno) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>
