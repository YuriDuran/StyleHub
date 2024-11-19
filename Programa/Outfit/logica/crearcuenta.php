<?php
include('../conexion.php');

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellido1'];
$correo = $_POST['email'];
$pass = $_POST['con1'];
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