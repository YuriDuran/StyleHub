<?php
require_once 'function.php';
$genero = $_GET['genero'];
?>
<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'catalogo.css'); ?>

<body>
    <?php
    include("conexion.php");

    // Validar y limpiar el parámetro genero
    $genero = isset($_GET['genero']) ? mysqli_real_escape_string($conexion, $_GET['genero']) : '';

    // Verificar si el género es válido
    if ($genero != 'mujer' && $genero != 'hombre') {
        // Redirigir o mostrar error si el género no es válido
        header('Location: index.php');
        exit();
    }

    $sql = "SELECT * FROM productos WHERE estado = '2' AND genero = '" . $genero . "'";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
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
                <p>$<?php $formatoSinDecimales = number_format($filas['precio'], 0, ',', '.'); 
                echo $formatoSinDecimales?></p>
                <a href="producto.php?id=<?php echo $filas['id_producto'] ?>" class="boton">Ver más...</a>
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