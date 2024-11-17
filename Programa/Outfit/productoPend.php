<?php
require_once 'function.php';
require_once 'conexion.php';

// Consulta para obtener las categorías
$query = "SELECT * FROM productos WHERE estado = '1'";
$resultado = $conexion->query($query);
?>

<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'productoPend.css'); ?>

<body class="fondoT">
    <div class="container-fluid">
        <!-- Aqui se encuentra el header de la pagina -->
        <?php render_template('Header2'); ?>

        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main class="row">

            <div class="col-md-12 separador"></div>

            <div class="col-md-2"></div>

            <!-- Cuerpo Formulario -->
            <div class="col-md-8 fondoF">
                <h3 class="text-center">Productos pendientes de aprobacion</h3>
                
                <table>
                    <tr>
                    <td>Producto</td>
                    <td>Estado</td>
                    <td>Imagenes</td>
                    <td>Acciones</td>
                </table>
                <tr>
                    <td>si</td>
                    <td>si</td>
                    <td>si</td>
                    <td>SI</td>
                </tr>
            </div>

            <div class="col-md-2"></div>

            <div class="col-md-12 separador"></div>
        </main>

        <!-- Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

