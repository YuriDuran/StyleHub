<?php
require_once 'vendor/autoload.php';
session_start();

use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

// Verificar que vengan los datos necesarios
if (!isset($_POST['monto']) || !isset($_POST['orden']) || !isset($_POST['productos'])) {
    die('Error: Datos incompletos');
}

// Configurar el ambiente de integración (desarrollo)
WebpayPlus::configureForTesting();

// Crear una nueva transacción
$transaction = new Transaction();

// Datos de la transacción
$buyOrder = $_POST['orden'];
$sessionId = "sesion_" . uniqid();
$amount = (int)$_POST['monto']; // Convertir a entero
$returnUrl = "https://dogfish-adapting-leopard.ngrok-free.app/outfit/respuesta.php";

// Guardar información adicional en la sesión para usarla en respuesta.php
$_SESSION['webpay_data'] = [
    'orden' => $buyOrder,
    'productos' => $_POST['productos'],
    'monto' => $amount
];

// Crear la transacción
$response = $transaction->create($buyOrder, $sessionId, $amount, $returnUrl);

// Obtener la URL de redirección y el token
$redirectUrl = $response->getUrl();
$token = $response->getToken();
?>

<form action="<?php echo $redirectUrl; ?>" method="POST" id="webpayForm">
    <input type="hidden" name="token_ws" value="<?php echo $token; ?>">
</form>

<script>
    document.getElementById('webpayForm').submit();
</script>