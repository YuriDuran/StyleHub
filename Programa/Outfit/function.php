<?php

declare(strict_types=1); // <- a nivel de archivo y arriba del todo
// Creacion de conexion con la BD
session_start();
require_once 'conexion.php';

function render_template(string $template, string $css_file = 'index.css')
{
  $css_path = "Style/$css_file";
  require "Template/$template.php";
}


function validarAdmin(string $template)
{
  

  if (!isset($_SESSION['tip_usuario'])) {
    echo '
    <script>
    alert("Acceso denegado. No se ha iniciado sesión.");
    location.href = "inicio_sesion.php"
    </script>
    ';  
  }

  if ($_SESSION['tip_usuario'] == '3') {
    echo '
    <script>
    alert("Acceso autorizado");
    location.href = "' . $template . '
    </script>
    ';
  } else {
    echo '
    <script>
    alert("Acceso denegado. Solo los administradores pueden acceder.");
    location.href = "index.php"
    </script>
    ';  
  }
}
function agregarAlCarrito(int $id_producto, int $cantidad = 1): void 
{
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Obtener información del producto de la base de datos
    global $conexion;
    $sql = "SELECT id_producto, nombre, precio, imagenF FROM productos WHERE id_producto = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $producto = $resultado->fetch_assoc();

    if ($producto) {
        // Si el producto ya existe en el carrito, aumentar cantidad
        if (isset($_SESSION['carrito'][$id_producto])) {
            $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
        } else {
            // Si no existe, agregarlo al carrito
            $_SESSION['carrito'][$id_producto] = [
                'id' => $producto['id_producto'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagenF'],
                'cantidad' => $cantidad
            ];
        }
    }
}

function eliminarDelCarrito(int $id_producto): void 
{
    if (isset($_SESSION['carrito'][$id_producto])) {
        unset($_SESSION['carrito'][$id_producto]);
    }
}

function obtenerTotalCarrito(): float 
{
    $total = 0;
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
    }
    return $total;
}