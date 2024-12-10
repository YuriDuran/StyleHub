<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pyme = $_POST['id_pyme'];
    $accion = $_POST['accion'];

    if ($accion === 'aprobar') {
        $nuevo_estado = 2; // Estado aprobado
    } else if ($accion === 'rechazar') {
        $nuevo_estado = 3; // Estado rechazado
    }

    // Actualizar el estado en la base de datos
    $query = "UPDATE pyme SET estado_pyme = ? WHERE id_pyme = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ii", $nuevo_estado, $id_pyme);
    $stmt->execute();

    // Redirigir de vuelta a la página de aprobación
    header("Location: aprobarPyme.php");
    exit();
}
?>
