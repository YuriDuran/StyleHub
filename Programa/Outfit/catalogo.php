<?php
require_once 'function.php'
?>
<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'catalogo.css'); ?>

<body>
    <?php
    include("conexion.php");

    $sql = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $sql);
    ?>

    <div class="container-fluid">
        <!--Aqui se encuentra el header de la pagina -->
        <?php render_template('Header2'); ?>

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

            <?php while($filas = mysqli_fetch_assoc($resultado)){ ?>

            <div class="col-md-3 text-center">
                <img src="<?php echo $filas['imagenF'] ?>" class="imagenC">
                <h5><?php echo $filas['nombre'] ?></h5>
                <p><?php echo $filas['precio'] ?></p>
                
               
            </div>
            
            <?php } ?>

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