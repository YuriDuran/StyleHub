<?php
require 'conexion.php';
require 'mail.php'; // Incluye el archivo con las funciones de envío de correo
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;
$email = $_POST['correo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$clave = $_POST['pass'];
$valclave = $_POST['valpass'];
$rol = '1';
$estado = '0';

// Verificar si el correo ya existe en la base de datos
$consultaCorreo = "SELECT correo, estado FROM usuario WHERE correo = ?";
$stmtConsulta = mysqli_prepare($conexion, $consultaCorreo);
mysqli_stmt_bind_param($stmtConsulta, 's', $email);
mysqli_stmt_execute($stmtConsulta);
$resultadoConsulta = mysqli_stmt_get_result($stmtConsulta);

if ($valclave == $clave) {
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        $usuario = mysqli_fetch_assoc($resultadoConsulta);
        $estado = $usuario['estado'];

        // Actualizar estado y datos si eliminó su cuenta
        if ($estado == 2) {
            $estado = 0;
            $claveEncrip = password_hash($clave, PASSWORD_BCRYPT);
            $actualizarEstado = "UPDATE usuario SET nombres = ?, apellidos = ?, clave = ?, id_rol = ?, estado = ? WHERE correo = ?";
            $stmtActualizarEstado = mysqli_prepare($conexion, $actualizarEstado);
            mysqli_stmt_bind_param($stmtActualizarEstado, 'ssssss', $nombre, $apellido, $claveEncrip, $rol, $estado, $email);
            mysqli_stmt_execute($stmtActualizarEstado);
        }

        // Verificar si el estado es 0 o 1
        if ($estado == 0) {
            // El correo existe pero la cuenta no está activada
            // Enviar correo de activación y mostrar mensaje

            // Generar el token
            $secretKey = 'machupichu' . $email;
            $payload = array(
                'correo' => $email
            );
            $token = JWT::encode($payload, 'machupichu', 'HS256');

            // Guardar el token en la base de datos
            $guardarToken = "UPDATE usuario SET token = ? WHERE correo = ?";
            $stmtGuardarToken = mysqli_prepare($conexion, $guardarToken);
            mysqli_stmt_bind_param($stmtGuardarToken, 'ss', $token, $email);
            mysqli_stmt_execute($stmtGuardarToken);

            // Enviar el correo de activación
            $envioExitoso = enviarCorreoActivacion($email, $nombre, $token);
            if ($envioExitoso) {
                echo 'El correo de activación se envió correctamente.';
            } else {
                echo 'Error al enviar el correo de activación.';
            }

            // Mostrar alerta de éxito
            header("Location: ../iniciar.php?creado");
            exit();
        } else if ($estado == 1) {
            // El correo existe y la cuenta está activada
            // Mostrar mensaje de cuenta activada
            header("Location: ../iniciar.php?existe");
            exit();
        }
    } else {
        // El correo no existe, realizar la inserción del nuevo usuario

        // Determinar el valor de rol según el dominio del correo
        if (endsWith($email, '@duocuc.cl')) {
            $rol = '3'; 
        } elseif (endsWith($email, 'profesor.duoc.cl')) {
            $rol = '2';
        } else {
            // No corresponde a ningún dominio institucional
            header("Location: ../iniciar.php?correo");
            exit();
        }

        $insertar = "INSERT INTO usuario (nombres, apellidos, correo, clave, id_rol, estado) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $insertar);

        $claveEncrip = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssssss', $nombre, $apellido, $email, $claveEncrip, $rol, $estado);
            $resultado = mysqli_stmt_execute($stmt);

            if ($resultado) {
                // Generar el token
                $secretKey = 'machupichu' . $email;
                $payload = array( 
                    'correo' => $email
                );
                $token = JWT::encode($payload, 'machupichu', 'HS256');

                // Guardar el token en la base de datos
                $guardarToken = "UPDATE usuario SET token = ? WHERE correo = ?";
                $stmtGuardarToken = mysqli_prepare($conexion, $guardarToken);
                mysqli_stmt_bind_param($stmtGuardarToken, 'ss', $token, $email);
                mysqli_stmt_execute($stmtGuardarToken);

                // Enviar el correo de bienvenida
                $envioExitoso = enviarCorreoBienvenida($email, $nombre, $token);
                if ($envioExitoso) {
                    echo 'El correo de bienvenida se envió correctamente.';
                } else {
                    echo 'Error al enviar el correo de bienvenida.';
                }

                // Mostrar alerta de éxito
                header("Location: ../iniciar.php?creado");
                exit();
            } else {
                echo "<br>Error al crear usuario: " . mysqli_stmt_error($stmt);
            }
        } else {
            echo "<br>Error en la consulta SQL: " . mysqli_error($conexion);
        }
    }
} else {
    header("Location: ../iniciar.php?clave");
    exit();
}

/**
 * Verifica si una cadena termina con otra cadena especificada.
 *
 * @param string $haystack Cadena principal.
 * @param string $needle Cadena a buscar al final.
 * @return bool Devuelve true si la cadena $haystack termina con la cadena $needle, o false en caso contrario.
 */
function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}
?>
