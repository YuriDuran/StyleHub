<?php
require 'conexion.php';
require 'mail.php'; // Incluye el archivo con la función enviarCorreoRecuperarContrasena

if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];
    $select = "SELECT * FROM usuario WHERE correo = ?";
    $stmtSelect = mysqli_prepare($conexion, $select);
    mysqli_stmt_bind_param($stmtSelect, 's', $correo);
    mysqli_stmt_execute($stmtSelect);
    $resultSelect = mysqli_stmt_get_result($stmtSelect);
    $rowSelect = mysqli_fetch_assoc($resultSelect);

    if ($rowSelect) {
        $token = $rowSelect['token'];

        // Llamamos a la función enviarCorreoRecuperarContrasena para enviar el correo
        $envioExitoso = enviarCorreoRestablecer($correo, $token);

        if ($envioExitoso) {
            header("Location: ../iniciar.php?correoCorrecto");//corecto
        } else {
            header("Location: ../iniciar.php?errorCorreo");// error
        }
    } else {
        header("Location: ../iniciar.php?notCorreo");//no existe
    }
}
?>
