
<?php

include('../conexion.php');

$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$color = $_POST['color'];
$stock = $_POST['stock'];
$talla = $_POST['talla'];
$descripcion = $_POST['descripcion'];
$genero = $_POST['genero'];
$imagenF = $_FILES['imagenF']['name'];
$imagenD = $_FILES['imagenD']['name'];
$imagenI = $_FILES['imagenI']['name'];
$imagenT = $_FILES['imagenT']['name'];
$archivo1 = $_FILES['imagenF']['tmp_name'];
$archivo2 = $_FILES['imagenD']['tmp_name'];
$archivo3 = $_FILES['imagenI']['tmp_name'];
$archivo4 = $_FILES['imagenT']['tmp_name'];
$id_pyme = $_POST['id_pyme'];
$fech_publi = date('Y-m-d');
$estado = '1';

$id = $_POST['id'];

$id_usuario = $id;

$ruta1 = "../img/" . $imagenF;
$bd1 = "img/" . $imagenF;
$ruta2 = "../img/" . $imagenD;
$bd2 = "img/" . $imagenD;
$ruta3 = "../img/" . $imagenI;
$bd3 = "img/" . $imagenI;
$ruta4 = "../img/" . $imagenT;
$bd4 = "img/" . $imagenT;

move_uploaded_file($archivo1,$ruta1);
move_uploaded_file($archivo2,$ruta2);
move_uploaded_file($archivo3,$ruta3);
move_uploaded_file($archivo4,$ruta4);







$insertar = mysqli_query($conexion, "INSERT INTO productos (nombre, id_categoria, precio, color, stock, talla, genero,descripcion, imagenF, imagenD, imagenI, imagenT, id_pyme, estado, fech_publicación)
VALUES('$nombre', '$categoria', '$precio', '$color', '$stock', '$talla', '$genero','$descripcion', '$bd1', '$bd2', '$bd3', '$bd4', $id_pyme, $estado, '$fech_publi')");

if ($insertar) {
    // Redirigir después de una inserción exitosa con la ID del usuario
    echo '
    <script>
    alert("Producto agregado exitosamente");
    location.href = "../vistas_admin/pag_principal_a.php?id=' . htmlspecialchars($id_usuario) . '";
    </script>
    ';
} else {
    // En caso de error, redirigir con la misma información
    echo '
    <script>
    alert("No se pudo agregar el producto");
    location.href = "../vistas_admin/pag_principal_a.php?id=' . htmlspecialchars($id_usuario) . '";
    </script>
    ';
}
?>