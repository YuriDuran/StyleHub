<?php
require_once 'function.php';

if (isset($_POST['id_producto'])) {
    $id_producto = (int)$_POST['id_producto'];
    agregarAlCarrito($id_producto);
    
    echo '<script>
        alert("Producto agregado al carrito");
        window.location.href = "carrito.php";
    </script>';
} else {
    header('Location: index.php');
}
