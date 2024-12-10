<?php
require_once 'function.php';

if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
    $id_producto = (int)$_POST['id_producto'];
    $cantidad = (int)$_POST['cantidad'];
    agregarAlCarrito($id_producto, $cantidad); 
    
    echo '<script>
        alert("Producto agregado al carrito");
        window.location.href = "carrito.php";
    </script>';
} else {
    header('Location: index.php');
}
