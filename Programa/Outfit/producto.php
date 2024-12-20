<?php
require_once 'function.php'
?>
<?php render_template('head', 'producto.css'); ?>

<body>
    <?php

    include("conexion.php");
    $id = $_GET['id'];

    $user = $_SESSION['nombre'] ?? null;

    $sql = "SELECT * FROM productos WHERE id_producto =" . $id;
    $resultado = mysqli_query($conexion, $sql);

    ?>

    <?php render_template('Header2'); ?>

    <div style="padding-top: 65px;" class="container product-container">
        <?php while ($filas = mysqli_fetch_assoc($resultado)) {
            $id = $filas['id_producto']; ?>

            <div class="product-images text-center">
                <img src="<?php echo $filas['imagenF'] ?>" alt="img1" class="image">
                <img src="<?php echo $filas['imagenD'] ?>" alt="img2" class="image">
            </div>

            <div class="product-info">
                <!-- Nombre -->
                <h1><?php echo $filas['nombre'] ?></h1>
                <!-- Precio -->
                <p class="precio">$<?php
                                    $formatoSinDecimales = number_format($filas['precio'], 0, ',', '.');
                                    echo $formatoSinDecimales ?></p>
                <!-- Talla -->
                <p>Talla: <?php echo $filas['talla'] ?></p>
                <!-- Descipcion -->
                <p class="desc"><?php echo $filas['descripcion'] ?></p>
                <div class="text-center">
                    <!-- Agregar a Carrito -->
                    <?php if (isset($user) && !empty($user)) { ?>
                        <form method="POST" action="agregar_carrito.php">
                            <input type="hidden" name="id_producto" value="<?php echo $id; ?>">
                            <input type="number" name="cantidad" value="1" min="1" max="<?php echo $filas['stock']; ?>" style="width: 50px;">
                            <button type="submit" class="toque2">Añadir al Carrito</button>
                        </form>
                    <?php } else { ?>
                        <a href="iniciar.php"><button class="toque2">Iniciar Sesión para Añadir al Carrito</button></a>
                    <?php } ?>
                </div>

            </div>
        <?php } ?>

    </div>

    <div class="container-fluid">
        <?php render_template('Footer'); ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>