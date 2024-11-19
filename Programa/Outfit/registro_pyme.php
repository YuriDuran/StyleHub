<?php
require_once 'function.php';
require_once 'conexion.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Formulario Registro</title>
  <link rel="stylesheet" href="Style/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

</head>

<body>
  <?php render_template('Header2'); ?>
  <!--
  <header class="header">
    <div class="container logo-nav-container">
      <a href="" class="logo">DELANEKO SHOP</a>
      <span class="menu-icon"> VER</span>
      <nav class="navigation">
        <ul class="show">
          <li><a href="#"> INICIO </a></li>
          <li><a href="#"> INICIO </a></li>
          <li><a href="#"> INICIO </a></li>
          <li><a href="#"> INICIO </a></li>
        </ul>
      </nav>

    </div>
  </header>
  -->
  <main class="main">
    <div class="container">
        <!-- Sección de Imagen -->
        <div class="image-section"></div>

        <!-- Sección del Formulario -->
        <div class="form-section">
          <div class="form-container">
            <h2>Registro</h2>
                <form action="logica/crearcuentapyme.php" method="POST" class="formulario" id="formulario"  enctype="multipart/form-data">

                  <!-- GRUPO NOMBRE-->
                  <div class=" formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombre:</label>
                    <div class="formulario__grupo-input">
                      <input type="text" required class="form-control formulario__input" name="nombre" id="nombre"
                        placeholder="Nombre/s">

                      <i class="formulario__validacion-estado fas fa-times-circle"></i>

                    </div>
                    <h5 class="formulario__input-error">Solo puede contener letras.</h5>
                  </div>

                  <div class=" formulario__grupo" id="grupo__ap1">
                    <label for="ap1" class="formulario__label">Direccion</label>
                    <div class="formulario__grupo-input">
                      <input type="text" required class="form-control formulario__input" name="apellido1" id="apellido1"
                        placeholder="Av. sos 123">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Solo puede contener letras.</h5>
                  </div>

                

                  




                  <div class=" formulario__grupo" id="grupo__email">
                    <label for="inputEmail4" class="formulario__label">Email</label>
                    <div class="formulario__grupo-input">
                      <input type="email" required class="formulario__input" name="email" id="email" placeholder="hola@hola.com">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Ta mal</h5>
                  </div>
                  <div class="col-md-6">

                  </div>


                  <div class=" formulario__grupo" id="grupo__password">
                    <label for="inputPassword1" class="formulario__label">Contraseña:</label>
                    <div class="formulario__grupo-input">
                      <input type="password" required class="formulario__input" name="con1" id="con1" placeholder="Contraseña">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Ta mal solo son entre 4 y 9 dígitos</h5>
                  </div>

                  <div class=" formulario__grupo" id="grupo__password2">
                    <label for="inputPassword2" class="formulario__label">Confirmar Contraseña:</label>
                    <div class="formulario__grupo-input">
                      <input type="password" required class="formulario__input" name="con2" id="con2"
                        placeholder="Repitir Contraseña">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <h5 class="formulario__input-error">Ambas contraseñas deben ser iguales...</h5>
                  </div>

                 

                  

                  <div class="formulario__grupo" id="grupo__terminos">
                    <label class="formulario__label">
                      <input class="formulario__checkbox" required type="checkbox" name="terminos" id="terminos">
                      Acepto los Terminos y Condiciones
                    </label>
                  </div>

                  <div class="formulario__mensaje" id="formulario__mensaje">
                    <h5><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente.</h5>
                  </div>

                  <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="formulario__btn">Enviar</button>
                    <h5 class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</h5>
                  </div>



                </form>

          </div>
        </div>
    </div>
  </main>



  <!--
  <script type="text/javascript">
    var url = "https://apis.digital.gob.cl/dpa/regiones";
    fetch(url).then(function (result) {
      if (result.ok) {
        return result.json();
      }

    })
  </script>
  -->
  <script src="js/registro.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>

</html>