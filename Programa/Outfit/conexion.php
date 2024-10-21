<?php
$SERVER = "localhost";
$user = "root";
$pass = "";
$db = "outfit";

$conexion = new mysql($server, $user, $pass, $db);

if ($conexion->connect_errno) {
    die("Conexion Fallida". $conexion->connect_errno);
} else {
    echo "conectado";
}

?>