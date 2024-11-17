<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión || Regístrese desde</title>
    <link rel="icon" href="https://www.puntosaber.cl/logo/punto.png" alt="Icono pestaña">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- css stylesheet -->
    <link rel="stylesheet" href="style/loginregister.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<?php
require_once 'function.php';
require_once 'conexion.php';
?>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="logica/crearcuenta.php" method="POST">
                <h1>Crear una cuenta</h1>
                <span>use su correo electrónico de la institución</span>
                <div class="infield">
                    <input type="text" placeholder="Nombres" name="nombre" autocomplete="on" required>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="text" placeholder="Apellidos" name="apellido" autocomplete="off" required>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="email" placeholder="Email" name="correo" autocomplete="on" required>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Contraseña" min="6" name="pass" autocomplete="on" required>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" name="valpass" min="6" placeholder="Repetir Contraseña" autocomplete="off" required>
                    <label></label>
                </div>
                <button>Inscribirse</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
        <form action="logica/inicio_sesion.php" method="POST">
                <img src="img/StyleHubLogo.png" style="width: 150px;height: 150px;">
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="social"><i class="fa fa-instagram"></i></a>
                </div>
                <h5>Iniciar sesion</h5>
                <div class="infield">
                    <input type="email" name="correo"  required placeholder="Email admin@gmail.com o user@gmail.com" name="email" autocomplete="off">
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" name="pass" required placeholder="Contraseña '12345'" name="password" autocomplete="off">
                    <label></label>
                </div>
                <a href="recuperarcuenta.php" class="forgot">¿Olvidaste tu contraseña?</a>
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>

        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenido!</h1>
                    <p>inicie sesión con su información personal</p>
                    <button>Iniciar sesión</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenido!</h1>
                    <p>Ingresa tus datos personales y comienza tu viaje con nosotros</p>
                    <button>Inscribirse</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>
    <!-- js code -->
    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');

        overlayBtn.addEventListener('click', () => {
            container.classList.toggle('right-panel-active');

            overlayBtn.classList.remove('btnScaled');
            window.requestAnimationFrame(() => {
                overlayBtn.classList.add('btnScaled');
            })
        });
    </script>

</body>
<!-- Mostrar alertas -->
<?php if (isset($_GET['inactive'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cuenta no verificada',
                text: 'Aún no ha activado su cuenta. Por favor, verifique su correo electrónico para activarla.',
                icon: 'error',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['clave'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            Swal.fire({
                title: 'Error de contraseñas',
                text: 'Las contraseñas no coinciden',
                icon: 'error',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>

<?php if (isset($_GET['error'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Usuario no existe',
                text: 'No existe una cuenta con este correo',
                icon: 'info',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['claveinco'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            Swal.fire({
                title: 'Contraseña incorrecta',
                text: 'Intente nuevamente',
                icon: 'error',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['creado'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Usuario creado',
                text: 'Se registro el usuario exitosamente, active su cuenta',
                icon: 'success',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['existe'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'El correo existe',
                text: 'El correo utilizado ya tiene una cuenta registrada',
                icon: 'error',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['correo'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'El correo no valido',
                text: 'El correo ingresado no corresponde a un correo institucional',
                icon: 'error',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['correoCorrecto'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Envio exitoso',
                text: 'El envio del correo para restablecer su contraseña fue enviado exitosamente.',
                icon: 'success',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['errorCorreo'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'El correo no valido',
                text: 'El correo ingresado no corresponde a un correo institucional',
                icon: 'error',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>
<?php if (isset($_GET['notCorreo'])) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'El correo no valido',
                text: 'El correo ingresado no corresponde a un correo institucional',
                icon: 'error',
                confirmButtonColor: '#007bff',
                confirmButtonText: 'Salir'
            }).then(() => {
                window.location.href = 'iniciar.php';
            });
        });
    </script>
<?php endif; ?>

</html>