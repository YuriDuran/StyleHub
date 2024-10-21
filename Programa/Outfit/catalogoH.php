<?php
require_once 'function.php'
?>
<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'catalogo.css'); ?>

<body>
    <div class="container-fluid">
        <!--Aqui se encuentra el header de la pagina -->
        <?php render_template('Header2'); ?>
        <section class="heroh container-fluid">
            <div class="overlay"></div>
            <div class="hero-texth">
                <h1>Novedades de Hombre</h1>
                <p>Explora la nueva colección</p>
            </div>
        </section>

        <!--Aqui se encuentra el cuerpo de la pagina -->
        <main class="row">
            
            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>

            <div class="col-md-6">
                <p class="filtro">Filtros</p>
            </div>

            <div class="col-md-6 text-end">
                <p class="ordenar">Ordenar por</p>
            </div>

            <div class="col-md-3 text-center">
                <img src="img/ropa_hombre/camisa-hombre.png" class="imagenC">
                <h5>Camisa Hombre Flx</h5>
                <p>$12.990</p>
                <a href="producto.php" class="boton">Ver más...</a>
            </div>

            <div class="col-md-3 text-center">
                <img src="img/ropa_hombre/polera-hombre.png" class="imagenC">
                <h5>Polera Rolling Stone Hombre</h5>
                <p>$14.990</p>
                <a href="producto.php" class="boton">Ver más...</a>
            </div>
                    
            <div class="col-md-3 text-center">
                <img src="img/ropa_hombre/poleron-hombre.png" class="imagenC">
                <h5>Poleron Frankestein Hombre Oversize</h5>
                <p>$15.990</p>
                <a href="producto.php" class="boton">Ver más...</a>
            </div>

            <div class="col-md-3 text-center">
                <img src="img/ropa_hombre/poleron-hombre2.png" class="imagenC">
                <h5>Poleron basico Negro</h5>
                <p>$9.990</p>
                <a href="producto.php" class="boton">Ver más...</a>
            </div>

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>
        </main>

        <!--Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>