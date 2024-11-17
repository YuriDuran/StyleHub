<?php
// This code uses cURL to perform an API request in PHP

$taskId = "019321cf-5445-7c5b-8fa1-6094ff23259a";
$apiKey = "msy_1BFYXSWXOArAtbPO4K8fqCdXwrei9ywDDcDd";
$headers = [
    "Authorization: Bearer " . $apiKey
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.meshy.ai/v1/image-to-3d/" . $taskId);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    // Handle error
    die('Error al querer hacer el requerimiento a la API.');
    header("location: index.php");
    exit;
    
}

$responseData = json_decode($response, true);
print_r($responseData);
?>