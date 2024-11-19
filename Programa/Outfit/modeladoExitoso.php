<?php
require '../conexion.php';

$id_producto = $_GET['id'];

// Consultar información del producto
$query = "SELECT id_task FROM productos WHERE id_producto = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $id_producto);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>¡Modelado Completado!</title>
    <style>
        .success-container {
            text-align: center;
            margin-top: 50px;
        }
        .success-icon {
            color: #4CAF50;
            font-size: 48px;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h1>¡Modelado 3D Completado con Éxito!</h1>
        <p>Tu modelo 3D está listo para ser utilizado.</p>
        <!-- Aquí puedes agregar botones o enlaces para ver/descargar el modelo -->
    </div>
</body>
</html>