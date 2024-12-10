<?php

include('../conexion.php');

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$color = $_POST['color'];
$stock = $_POST['stock'];
$talla = $_POST['talla'];
$descripcion = $_POST['descripcion'];
$genero = $_POST['genero'];

$id = $_POST['id'];
$idp = $_POST['id'];

$id_usuario = $id;
$id_producto = $idp;

$actualizar = mysqli_query($conexion, 
    "UPDATE productos 
    SET 
        nombre = '$nombre', 
        precio = '$precio', 
        color = '$color', 
        stock = '$stock', 
        talla = '$talla', 
        genero = '$genero', 
        descripcion = '$descripcion'
    WHERE id_producto = '$id_producto'");

if ($actualizar) {
    // Redirigir después de una inserción exitosa con la ID del usuario
    echo '
    <script>
    alert("Producto actualizado exitosamente");
    location.href = "../vistas_admin/pag_principal_a.php?id=' . htmlspecialchars($id_usuario) . '";
    </script>
    ';
} else {
    // En caso de error, mostrar el error de MySQL
    echo '
    <script>
    alert("No se pudo actualizar el producto: ' . mysqli_error($conexion) . '");
    location.href = "../vistas_admin/pag_principal_a.php?id=' . htmlspecialchars($id_usuario) . '";
    </script>
    ';
}
?>