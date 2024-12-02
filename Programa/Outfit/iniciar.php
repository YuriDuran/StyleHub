<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión || Regístrese desde</title>
    <link rel="icon" href="https://www.puntosaber.cl/logo/punto.png" alt="Icono pestaña">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

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
            <form action="logica/crearcuenta.php" method="POST"  class="formulario" id="formulario">

                <!-- GRUPO NOMBRE-->
                <div class="infield formulario__grupo" id="grupo__nombre">

                    <div class="formulario__grupo-input">
                        <input type="text" required class="form-control formulario__input" name="nombre" id="nombre"
                        placeholder="Nombre/s">

                        <i class="formulario__validacion-estado fas fa-times-circle"></i>

                    </div>
                    <h5 class="formulario__input-error">Solo puede contener letras.</h5>
                </div>

                <div class="infield formulario__grupo" id="grupo__ap1">
               
                    <div class="formulario__grupo-input">
                        <input type="text" required class="form-control formulario__input" name="apellido1" id="apellido1"
                        placeholder="Primer Apellido">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Solo puede contener letras.</h5>
                </div>








                <div class="infield formulario__grupo" id="grupo__email">
               
                    <div class="formulario__grupo-input">
                        <input type="email" required class="formulario__input" name="email" id="email" placeholder="hola@hola.com">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Ta mal</h5>
                    </div>
                    <div class="col-md-6">

                </div>


                <div class="infield formulario__grupo" id="grupo__password">
                  
                    <div class="formulario__grupo-input">
                        <input type="password" required class="formulario__input" name="con1" id="con1" placeholder="Contraseña">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Ta mal solo son entre 4 y 9 dígitos</h5>
                </div>

                <div class="infield formulario__grupo" id="grupo__password2">
                    <label for="inputPassword2" class="formulario__label"></label>
                    <div class="formulario__grupo-input">
                        <input type="password" required class="formulario__input" name="con2" id="con2"
                        placeholder="Repitir Contraseña">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Ambas contraseñas deben ser iguales...</h5>
                </div>



           

                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente.
                    </p>
                </div>

                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="formulario__btn">Enviar</button>
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </div>



            </form>
        </div>

        <div class="form-container sign-in-container">
        <form action="logica/inicio_sesion.php" method="POST">
                <img src="img/StyleHubLogo.png" style="width: 120px; height: 120px;">
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
    <script src="js/registro.js"></script>

</body>


</html>