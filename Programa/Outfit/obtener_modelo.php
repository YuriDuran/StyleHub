<?php
require 'conexion.php';

$id_producto = $_GET['id'];

$query = "SELECT modelo FROM productos WHERE id_producto = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $id_producto);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($modelo);
$stmt->fetch();

// Establecer headers para archivo GLB
header('Content-Type: model/gltf-binary');
header('Content-Disposition: inline; filename="modelo.glb"');

// Enviar el contenido del modelo
echo $modelo;
?> 