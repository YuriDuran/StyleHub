<?php
$imagenF = $_FILES['imagen']['name'];
$archivo1 = $_FILES['imagen']['tmp_name'];
$ruta1 = "../img/" . $imagenF;
$bd1 = "img/" . $imagenF;

move_uploaded_file($archivo1,$ruta1);

$apiKey = "msy_1BFYXSWXOArAtbPO4K8fqCdXwrei9ywDDcDd";
// This code interacts with the Meshy API to convert an image to 3D using PHP

$payload = array(
    "image_url" => "https://dogfish-adapting-leopard.ngrok-free.app/outfit/" . $bd1, // URL pública de la imagen
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

// Manejo de errores de cURL
if ($response === false) {
    die('Error: ' . curl_error($ch));
}

curl_close($ch);

$responseData = json_decode($response, true);
print_r($responseData);
?>