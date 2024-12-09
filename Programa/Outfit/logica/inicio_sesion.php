<?php
session_start();
include('../conexion.php');

if (isset($_POST['correo']) && isset($_POST['pass'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $correo = validate($_POST['correo']);
    $pass = validate($_POST['pass']);

    if (empty($correo)) {
        header("Location: index.php?error=El correo es requerido");
    } elseif (empty($pass)) {
        header("Location: index.php?error=la contraseña es requerido");
    } else {
        
        $Sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND pass = '$pass'";
        $result = mysqli_query($conexion, $Sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['correo'] === $correo && $row['pass'] === $pass) {
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['id_usuario'] = $row['id_usuario'];
                $_SESSION['tip_usuario'] = $row['tip_usuario'];
                echo '
                <script>
                alert("Inicio de sesion exitoso");
                location.href = "../index.php"
                </script>
                ';
                exit();
            } else {
                echo '
                <script>
                alert("Correo o Clave incorrecta");
                location.href = "../iniciar.php"
                </script>
                ';
                exit();
            }
        } else {
            echo '
            <script>
            alert("Correo o Clave incorrecta");
            location.href = "../iniciar.php"
            </script>
            ';
            exit();
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
