<?php
include('../conexion.php');

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$tip_usuario = '1';
$fech_regis = date('Y-m-d');
$estado_usu = '1';



$insertar = mysqli_query($conexion, "INSERT INTO usuarios (nombre, apellidos, correo, pass, tip_usuario, fech_regis, estado_usu)
VALUES('$nombre', '$apellidos', '$correo', '$pass', '$tip_usuario', '$fech_regis', '$estado_usu')");

if($insertar){
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