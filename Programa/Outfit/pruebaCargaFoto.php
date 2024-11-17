<?php
require_once 'function.php';
?>
<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'cargar_producto.css'); ?>

<body class="fondoT">
    <div class="container-fluid">
        <!-- Aqui se encuentra el header de la pagina -->
        <?php render_template('Header2'); ?>

        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main class="row ">

            <div class="col-md-12 separador"></div>

            <div class="col-md-2"></div>

            <!-- Cuerpo Formulario -->
            <div class="col-md-8 fondoF">
                <h3 class="text-center">Prueba carga foto</h3>
                <form action="logica/imgToGLB.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" for="imagen">Cargar foto</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" required>
                        </div>

                        <div class="col-md-12 text-center Cboton">
                            <button type="submit" class="btn enviar">Prueba</button>
                        </div>
                    </div>


                </form>
            </div>

            <div class="col-md-2"></div>

            <div class="col-md-12 separador"></div>
        </main>

        <!-- Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

