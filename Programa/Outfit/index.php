<?php
require_once 'function.php'
?>
<?php render_template('head'); ?>

<body>
    <div class="container-fluid">
        <!--Aqui se encuentra el header de la pagina -->
        <?php render_template('Header'); ?>

        <!--Aqui se encuentra el cuerpo de la pagina -->
        <main class="row">
            <!-- Aqui se encuentra el banner de la pagina principal -->
            <div class="col-md-12 text-center">
                <img src="/img/foto_principal.jpg" class="banner">
            </div>

            <div class="col-md-4 text-center">
                <a href="cargar_producto.php">Cargar producto</a>
            </div>
            <div class="col-md-4 text-center">
                <a href="render.php">render</a>
            </div>
            <div class="col-md-4 text-center">
                <a href="">Proximamente..</a>
            </div>

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>

            <!-- Aqui se encuentra la zona de destacado de la pagina principal -->
            <?php render_template('banner_detacados'); ?>

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>

            <!-- Aqui se encuentra la zona de novedades de la pagina principal -->
            <?php render_template('banner_novedades'); ?>

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>
        </main>

        <!--Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>