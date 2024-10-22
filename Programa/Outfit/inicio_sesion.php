<?php
require_once 'function.php';
require_once 'conexion.php';
?>

<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'inicio_sesion.css'); ?>

<body class="fondoT">
    <div class="container-fluid">
        <!-- Aqui se encuentra el header de la pagina -->
        <?php render_template('Header2'); ?>

        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main class="row ">

            <div class="col-md-12 separador"></div>

            <div class="col-md-3"></div>

            <!-- Cuerpo Formulario -->
            <div class="col-md-6 fondoF">
                <h3 class="text-center">Inicio de sesion</h3>

                <hr>
                <?php
                    if(isset($_GET['error'])) {
                    ?>
                    <p class="error"></p>
                        <?php
                        echo $_GET['error']
                        ?>
                        <?php
                    }
                ?>
                <hr>

                <form action="logica/inicio_sesion.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="text" name="correo" placeholder="Ingrese su correo" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="pass" class="form-label">Contraseña</label>
                            <input type="text" name="pass" placeholder="Ingrese su contraseña" class="form-control">
                        </div>
                        <div class="col-md-12 mt-2 text-center">
                            <button type="submit" class="btn inicio">Iniciar sesion</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3"></div>

            <div class="col-md-12 separador"></div>
        </main>

        <!-- Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

