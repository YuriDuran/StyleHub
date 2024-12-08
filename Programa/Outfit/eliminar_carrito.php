<?php
require_once 'function.php';
session_start();

if (isset($_POST['id_producto'])) {
    $id_producto = (int)$_POST['id_producto'];
    eliminarDelCarrito($id_producto);
    
    header('Location: carrito.php');
} else {
    header('Location: index.php');
} 