<?php
include('../conexion.php');

$nombre = $_POST['nombre'];
$direccion = $_POST['apellido1'];
$correo = $_POST['email'];
$pass = $_POST['con1'];
$tip_usuario = '2';
$fech_regis = date('Y-m-d');
$estado_usu = '1';

$nombrepyme = $_POST['nombre'];

$estado_pyme = '1';

$insertar = mysqli_query($conexion, "INSERT INTO usuarios (nombre, correo, pass, tip_usuario, fech_regis, estado_usu)
VALUES('$nombre', '$correo', '$pass', '$tip_usuario', '$fech_regis', '$estado_usu')");

$insertar2 = mysqli_query($conexion, "INSERT INTO pyme (nom_pyme, dirección, estado_pyme)
VALUES('$nombre', '$direccion', '$estado_pyme')");

if($insertar && $insertar2){
echo '
<script>
alert("Producto agregado exitosamente");
location.href = "../index.php"
</script>
';
}else{
    echo '
    <script>
    alert("No se puedo agregar el producto");
    location.href = "../index.php"
    </script>
    ';
}
?>