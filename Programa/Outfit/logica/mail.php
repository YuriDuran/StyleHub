<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\Exception.php';
require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\SMTP.php';

/**
 * Función para enviar correos electrónicos utilizando PHPMailer.
 *
 * @param string $to      Dirección de correo del destinatario.
 * @param string $subject Asunto del correo.
 * @param string $body    Cuerpo del correo en formato HTML.
 * @return bool           Devuelve true si el correo se envió correctamente, o false en caso contrario.
 */
function enviarCorreo($to, $subject, $body)
{
    $mail = new PHPMailer(true);

    // Configuración del servidor SMTP y credenciales
    $mail->isSMTP();
    $mail->Host       = 'mail.puntosaber.cl'; // Reemplaza con el servidor SMTP que corresponda
    $mail->SMTPAuth   = true;
    $mail->Username   = 'noreply@puntosaber.cl'; // Reemplaza con tu dirección de correo
    $mail->Password   = 'aW)N{@b&4l]M'; // Reemplaza con tu contraseña de correo
    $mail->SMTPSecure = 'ssl'; // O 'ssl' si tu servidor SMTP lo requiere
    $mail->Port       = 465; // Puerto del servidor SMTP

    try {
        // Configuración del mensaje
        $mail->setFrom('noreply@puntosaber.cl', 'PuntoSaber.cl'); // Reemplaza con tu dirección de correo y nombre
        $mail->addAddress($to); // Reemplaza con la dirección del destinatario
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Envío del correo
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Función para enviar el correo de activación de cuenta.
 *
 * @param string $destinatario Dirección de correo del destinatario.
 * @param string $nombre       Nombre del destinatario.
 * @param string $token        Token generado para la activación de cuenta.
 * @return bool                Devuelve true si el correo se envió correctamente, o false en caso contrario.
 */
function enviarCorreoActivacion($destinatario, $nombre, $token)
{
    $asunto = 'Activacion de cuenta';
    $mensaje = '
    <html>
    <head>
        <title>Activación de cuenta</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }
        
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        
            h1 {
                color: #333333;
                margin-top: 0;
            }
        
            p {
                color: #666666;
                margin-bottom: 20px;
            }
        
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #3366cc;
                color: #ffffff;
                text-decoration: none;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>¡Bienvenido(a) ' . $nombre . ' al repositorio SABER!</h1>
            <p>Estamos emocionados de que te hayas unido a nuestro repositorio SABER. Para comenzar, necesitamos que actives tu cuenta haciendo clic en el siguiente boton:</p>
            <a class="button" href="http://localhost/saber/logica/activarcuenta.php?token=' . $token . '">Activar cuenta</a>
        </div>
    </body>
    </html>
    ';

    return enviarCorreo($destinatario, $asunto, $mensaje);
}

/**
 * Función para enviar el correo de bienvenida.
 *
 * @param string $destinatario Dirección de correo del destinatario.
 * @param string $nombre       Nombre del destinatario.
 * @param string $token        Token generado para la activación de cuenta.
 * @return bool                Devuelve true si el correo se envió correctamente, o false en caso contrario.
 */
function enviarCorreoBienvenida($destinatario, $nombre, $token)
{
    $asunto = 'Bienvenido(a) al repositorio SABER';
    $mensaje = '
        <html>
        <head>
            <title>Bienvenido(a) al repositorio SABER</title>
            <style>
                /* Agrega aquí los estilos CSS para el mensaje de bienvenida */
            </style>
        </head>
        <body>
            <div class="container">
                <h1>¡Bienvenido(a) ' . $nombre . ' al repositorio SABER!</h1>
                <p>Para activar tu cuenta, haz clic en el siguiente enlace:</p>
                <a class="button" href="http://localhost/saber/logica/activarcuenta.php?token=' . $token . '">Activar cuenta</a>
            </div>
        </body>
        </html>
    ';

    return enviarCorreo($destinatario, $asunto, $mensaje);
}

/**
 * Función para enviar el correo de activación de cuenta.
 *
 * @param string $destinatario Dirección de correo del destinatario.
 * @param string $nombre       Nombre del destinatario.
 * @param string $token        Token generado para la activación de cuenta.
 * @return bool                Devuelve true si el correo se envió correctamente, o false en caso contrario.
 */
function enviarCorreoRestablecer($destinatario, $token)
{
    $asunto = 'Activación de cuenta';
    $mensaje = '
    <html>
    <head>
        <title>Activación de cuenta</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }
        
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        
            h1 {
                color: #333333;
                margin-top: 0;
            }
        
            p {
                color: #666666;
                margin-bottom: 20px;
            }
        
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #3366cc;
                color: #ffffff;
                text-decoration: none;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>¡Bienvenido(a)   al repositorio SABER!</h1>
            <p>Estamos emocionados de que te hayas unido a nuestro repositorio SABER. Para comenzar, necesitamos que actives tu cuenta haciendo clic en el siguiente boton:</p>
            <a class="button" href="http://localhost/saber/restablecerclave.php?token=' . $token . '">Restablecer contraseña</a>
        </div>
    </body>
    </html>
    ';

    return enviarCorreo($destinatario, $asunto, $mensaje);
}
?>
