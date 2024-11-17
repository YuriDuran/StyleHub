<?php
require_once 'function.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de la cuenta</title>
    <link rel="stylesheet" type="text/css" href="style/recuperarcuenta.css">
</head>
<body>
    <?php render_template('Header2'); ?>

    <div class="container">
        <h1 style="padding-bottom: 100px;">Recuperación de la cuenta</h1>
        <p>Ingresa el correo electrónico asociado a tu cuenta para que puedas recuperar y establecer una nueva contraseña.<br>Revisa tu correo</p>
        <form method="POST" action="logica/recuperarcuenta.php">
            <input type="email" placeholder="Ingrese su correo electrónico" name="correo" required>
            <br>
            <button type="submit" >Enviar correo</button>
        </form>
    </div>
    <footer class="footer">
        &copy; 2023 SABER. Todos los derechos reservados.
    </footer>
</body>
</html>
