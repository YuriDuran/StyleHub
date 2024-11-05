<?php
require 'conexion.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$email = $_POST['email'];
$clave = $_POST['password'];

$q = "SELECT estado, clave, COUNT(*) as contar FROM usuario WHERE correo = '$email'";
$consulta = mysqli_query($conexion, $q);
$data = mysqli_fetch_array($consulta);
#$sqlcontar = mysqli_num_rows($consulta);
if ($data['contar'] > 0) {
    if (password_verify($clave, $data['clave'])) {
        // La contraseña es correcta
        $estado = $data['estado'];
        if ($estado == 1) {
            $_SESSION['correo'] = $email;
            header("Location: ../index.php");
            exit();
        } else {
            if ($estado == 2) {
                header("Location: ../iniciar.php?error=1");
                exit();
            } else {
                header("Location: ../iniciar.php?inactive=1");
                exit();
            }
        }
    } else {
        // La contraseña es incorrecta
        header("Location: ../iniciar.php?claveinco");
        exit();
    }
} else {
    // El correo no existe en la base de datos
    header("Location: ../iniciar.php?error=1");
    exit();
}
