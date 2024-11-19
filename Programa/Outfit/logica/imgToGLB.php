<?php
require '../conexion.php';
// Recibir el ID del producto
$id_producto = $_GET['id'];

$query = "SELECT * FROM productos WHERE id_producto = '" . $id_producto . "'";
$resultado = $conexion->query($query);

while ($filas = mysqli_fetch_assoc($resultado)) {
    $apiKey = "msy_1BFYXSWXOArAtbPO4K8fqCdXwrei9ywDDcDd";
    //This code interacts with the Meshy API to convert an image to 3D using PHP

    $payload = array(
        "image_url" => "https://dogfish-adapting-leopard.ngrok-free.app/outfit/" . $filas['imagenF'], //URL pública de la imagen
        "enable_pbr" => true,
    );
    $headers = array(
        "Authorization: Bearer " . $apiKey,
        "Content-Type: application/json"
    );

    $ch = curl_init("https://api.meshy.ai/v1/image-to-3d");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    //Manejo de errores de cURL
    if ($response === false) {
        die('Error: ' . curl_error($ch));
    }

    curl_close($ch);

    $responseData = json_decode($response, true);
    
    // Verificar si tenemos un result en la respuesta
    if (isset($responseData['result'])) {
        $task_id = $responseData['result'];
        $estadoC = '2';
        $query2 = "UPDATE productos SET id_task = ?, estado = ? WHERE id_producto = ?";
        $stmt = $conexion->prepare($query2);
        $stmt->bind_param("sss", $task_id, $estadoC, $id_producto);
        
        if (!$stmt->execute()) {
            die('Error al actualizar la base de datos: ' . $stmt->error);
        }
        $stmt->close();
        
        // Redirigir a devolver3D.php con el id_producto
        header("Location: devolver3D.php?id=" . $id_producto);
        exit;
    } else {
        die('No se recibió result en la respuesta de la API');
    }
}
?>
