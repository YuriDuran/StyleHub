<?php
require_once 'function.php'
?>
<?php render_template('head', 'producto.css'); ?>

<body>
    <?php render_template('Header2'); ?>
    <div class="container product-container">

        <div class="product-images text-center">
            <img src="img/polera-mujer.png" alt="img1" class="image">
            <img src="img/polera-mujer.png" alt="img2" class="image">
        </div>
        <div class="product-info">
            <h1>Nombre del Producto</h1>
            <p>Descripción breve del producto.</p>
            <button>Añadir al Carrito</button>
        </div>
        
    </div>
    
    <div class="container-fluid">
        <?php render_template('Footer'); ?>
    </div>
    
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>