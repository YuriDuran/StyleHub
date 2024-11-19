<?php
require_once 'function.php'
?>
<?php render_template('head', 'producto.css'); ?>

<body>
    <?php

    include("conexion.php");
    $id = $_GET['id'];

    $sql = "SELECT * FROM productos WHERE id_producto =" . $id;
    $resultado = mysqli_query($conexion, $sql);

    ?>

    <?php render_template('Header2'); ?>

    <div class="container product-container">
        <?php while ($filas = mysqli_fetch_assoc($resultado)) { 
            $id = $filas['id_producto'];?>
            
            <div class="product-images text-center">
                <img src="<?php echo $filas['imagenF'] ?>" alt="img1" class="image">
                <img src="<?php echo $filas['imagenD'] ?>" alt="img2" class="image">
            </div>

            <div class="product-info">
                <h1><?php echo $filas['nombre'] ?></h1>
                <p><?php echo $filas['descripcion'] ?></p>
                <a href="render.php?id=<?php echo $id; ?>"><button>Ver en probador virtual</button></a>
                <button>Añadir al Carrito</button>
            </div>
        <?php } ?>

    </div>

    <div class="container-fluid">
        <?php render_template('Footer'); ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>