<?php
require_once 'function.php';
require_once 'conexion.php';

validarAdmin('productoPend.php');
// Consulta para obtener las categorías
$query = "SELECT * FROM productos WHERE estado = '1'";
$resultado = $conexion->query($query);


?>
<?php render_template('head2', 'administracion.css'); ?>

<body>
    <?php render_template('sideBarAdmin'); ?>
    
    <main>
        <div class="logoG">
            <img src="img/IconLogo.png" alt="">
            <h3>StyleHub</h3>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>