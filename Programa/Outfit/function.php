<?php
declare(strict_types=1); // <- a nivel de archivo y arriba del todo
// Creacion de conexion con la BD
require_once 'conexion.php';

function render_template(string $template, string $css_file = 'index.css')
{
  $css_path = "Style/$css_file";
  require "Template/$template.php";
}

//Aqui se crea la funcion para guardar los datos de los productos en la BD


function guardarProducto($conexion, $nombre, $categoria, $precio, $color, $descripcion, $imagenes) {
    // Escapar los datos para prevenir inyección SQL
    $nombre = $conexion->real_escape_string($nombre);
    $categoria = $conexion->real_escape_string($categoria);
    $precio = $conexion->real_escape_string($precio);
    $color = $conexion->real_escape_string($color);
    $descripcion = $conexion->real_escape_string($descripcion);

    // Preparar la consulta SQL
    $query = "INSERT INTO productos (nombre, id_categoria, precio, color, descripcion) VALUES ('$nombre', '$categoria', '$precio', '$color', '$descripcion')";

    // Ejecutar la consulta
    if ($conexion->query($query)) {
        $id_producto = $conexion->insert_id;
        
        // Guardar las imágenes
        foreach ($imagenes as $tipo => $imagen) {
            $ruta_imagen = guardarImagen($imagen, $id_producto, $tipo);
            if ($ruta_imagen) {
                $conexion->query("INSERT INTO imagenes_producto (id_producto, tipo, ruta) VALUES ('$id_producto', '$tipo', '$ruta_imagen')");
            }
        }
        
        return true;
    } else {
        return false;
    }
}

function guardarImagen($imagen, $id_producto, $tipo) {
    $directorio = "img/productos/";
    $nombre_archivo = $id_producto . "_" . $tipo . "_" . basename($imagen["name"]);
    $ruta_completa = $directorio . $nombre_archivo;
    
    if (move_uploaded_file($imagen["tmp_name"], $ruta_completa)) {
        return $ruta_completa;
    } else {
        return false;
    }
}
