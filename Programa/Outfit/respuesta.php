<?php
require_once 'vendor/autoload.php';
require_once 'function.php';

use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

$fech_pedido = date('Y-m-d');

// Configurar el ambiente de integración
WebpayPlus::configureForTesting();

try {
    $token = $_GET['token_ws'] ?? null;

    if (!$token) {
        throw new Exception('No se recibió el token');
    }

    $transaction = new Transaction();
    $response = $transaction->commit($token);

    if ($response->getResponseCode() === 0) {
        // Transacción exitosa

        // Recuperar los datos guardados en la sesión
        $webpayData = $_SESSION['webpay_data'] ?? null;

        if ($webpayData) {
            // Aquí puedes procesar el pedido
            // Por ejemplo: guardar en la base de datos, enviar correos, etc.
            $id_usuario = $_SESSION['id_usuario'] ?? null;

            if (!$id_usuario) {
                throw new Exception('No se encontró el ID del usuario en la sesión');
            }

            $insertar = mysqli_query($conexion, "INSERT INTO pedidos (total, estado_pedido, fech_pedido, id_usuario) VALUES ({$webpayData['monto']}, 1, '$fech_pedido', $id_usuario)");

            // Obtener el ID del pedido recién insertado
            $id_pedido = mysqli_insert_id($conexion);

            // Asegúrate de que $webpayData['productos'] sea un array
            if (is_array($webpayData['productos'])) {
                // Insertar en detalle_pedido para cada producto
                foreach ($webpayData['productos'] as $productoJson) {
                    $producto = json_decode($productoJson, true);
                    // Asegúrate de que cada $producto sea un array
                    if (is_array($producto)) {
                        $id_producto = $producto['id']; // Asumiendo que 'id' es el identificador del producto
                        $si = $webpayData['orden'];

                        $detalle = mysqli_query($conexion, "INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad) VALUES ($id_pedido, $id_producto, {$producto['cantidad']})");

                        $pago = mysqli_query($conexion, "INSERT INTO pago (id_pago, monto, metodo_pago, estado_pago, fecha_pago, id_pedido) VALUES ('$si', {$producto['precio']}, 1, 1, '$fech_pedido', $id_pedido)");
                    } else {
                        
                        throw new Exception('El producto no es un array válido');
                    }
                }
            } else {
                throw new Exception('No se encontraron productos válidos');
            }

            // Limpiar el carrito después del pago exitoso
            unset($_SESSION['carrito']);

            header("Location: vistaPExitoso.php?id_pedido=". urlencode($id_pedido));
        }

        // Limpiar los datos de la sesión
        unset($_SESSION['webpay_data']);
    } else {
        echo "<h1>La transacción no fue exitosa</h1>";
    }
} catch (Exception $e) {
    echo "<h1>Error</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>
<p><a href="index.php"><button>Volver al inicio</button></a></p>