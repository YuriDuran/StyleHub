<?php
require '../conexion.php';

// Obtener el ID del producto
$id_producto = $_GET['id'];

// Consultar el task_id de la base de datos
$query = "SELECT id_task FROM productos WHERE id_producto = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $id_producto);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();
$taskId = $producto['id_task'];

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
    die('Error al querer hacer el requerimiento a la API.');
}

$responseData = json_decode($response, true);

// Obtener el progreso desde la respuesta de la API
$progress = 0;
if (isset($responseData['status'])) {
    switch ($responseData['status']) {
        case 'PENDING':
            $progress = 10;
            $estado = 'Pendiente de iniciar';
            break;
        case 'IN_PROGRESS':
            // Si la API proporciona un porcentaje específico, lo usamos
            if (isset($responseData['progress'])) {
                $progress = $responseData['progress'];
            } else {
                $progress = 50; // Valor por defecto si no hay porcentaje específico
            }
            $estado = 'En proceso';
            break;
        case 'SUCCEEDED':
            $progress = 100;
            $estado = '¡Completado!';
            
            // Guardar modelo GLB
            if (isset($responseData['model_urls']['glb'])) {
                // Crear directorio si no existe
                $uploadDir = "../modelos3D/" . $id_producto . "/";
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                // Descargar y guardar el archivo GLB
                $glbContent = file_get_contents($responseData['model_urls']['glb']);
                $fileName = "modelo.glb";
                $filePath = $uploadDir . $fileName;
                file_put_contents($filePath, $glbContent);
                
                // Guardar la ruta relativa en la base de datos
                $rutaRelativa = "modelos3D/" . $id_producto . "/" . $fileName;
                $query = "UPDATE productos SET ruta_modelo = ? WHERE id_producto = ?";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("ss", $rutaRelativa, $id_producto);
                $stmt->execute();
                $stmt->close();
            }
            break;
        case 'FAILED':
            die('El modelado ha fallado. Por favor, intenta nuevamente.');
            break;
        case 'EXPIRED':
            die('El proceso ha expirado. Por favor, inicia un nuevo modelado.');
            break;
        default:
            $progress = 5;
            $estado = 'Iniciando...';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Procesando Modelo 3D</title>
    <style>
        .progress-container {
            text-align: center;
            margin-top: 50px;
        }
        .progress-bar {
            width: 300px;
            height: 30px;
            background-color: #f0f0f0;
            border-radius: 15px;
            margin: 20px auto;
            overflow: hidden;
        }
        .progress {
            width: <?php echo $progress; ?>%;
            height: 100%;
            background-color: #4CAF50;
            transition: width 0.5s ease-in-out;
        }
        .status {
            margin-top: 10px;
            font-weight: bold;
        }
        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="progress-container">
        <h2>Procesando tu modelo 3D</h2>
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        <p>Progreso: <?php echo $progress; ?>%</p>
        <p class="status">Estado: <?php echo $estado; ?></p>
        
        <?php if (isset($responseData['error'])): ?>
            <p class="error">Error: <?php echo $responseData['error']; ?></p>
        <?php endif; ?>
    </div>

    <script>
        <?php if ($responseData['status'] === 'SUCCEEDED') { ?>
            
            header("Location: modelado_exitoso.php?id=" . $id_producto);
        <?php } else if (!in_array($responseData['status'], ['FAILED', 'EXPIRED'])) { ?>
            setTimeout(function() {
                window.location.reload();
            }, 5000);
        <?php } ?>
    </script>
</body>
</html>