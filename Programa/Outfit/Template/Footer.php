<!--Aqui se encuentra el footer de la pagina -->

<?php 
$m = "mujer";
$h = "hombre";
?>

<footer class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="row text-center pt-1">
            <a href="catalogo.php?genero=<?php echo $m?>" style="color:#fff; text-decoration:none;" class="col-md-3"> Mujer </a>
            <a href="catalogo.php?genero=<?php echo $h?>" style="color:#fff; text-decoration:none;" class="col-md-3"> Hombre </a>
            <?php
            //session_start();  Asegúrate de tener esto al principio de tu archivo PHP

            // Verificar si la variable de sesión 'user' está configurada
            if (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 1) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                $style = "color:#fff; text-decoration:none;";
                // Mostrar contenido si el usuario ha iniciado sesión
                
                echo "<a href='" . $cerrar . " ' style='" . $style . "' class='" . $si . "'>Cerrar sesión</a>";
                echo "<p class=". $si .">Bienvenido, " . htmlspecialchars($_SESSION['nombre']) . "</p>";
            } 
            elseif (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 2) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                $style = "color:#fff; text-decoration:none;";
               
                $administracion = "vistas_admin/pag_principal_a.php";
                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<a href='". $administracion ."?id=". $_SESSION['id_usuario'] ."' class='". $si ."' style='" . $style . "'>Administración</a>";
                echo "<a href='" . $cerrar . "' class='" . $si . "' style='" . $style . "'>Cerrar sesión</a>";
                
            }
            elseif (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 3) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                $style = "color:#fff; text-decoration:none;";
                $administracion = "administracion.php";
                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<a href='" . $administracion . "?id=" . $_SESSION['id_usuario'] . "' class='" . $si . "' style='" . $style . "'>Administración</a>";
                echo "<a href='" . $cerrar . "' class='" . $si . "' style='" . $style . "'>Cerrar sesión</a>";
            }
            else {
                ?>
                <a href="iniciar.php" style="color:#fff; text-decoration:none;" class="col-md-3">Inicio de sesion</a>
                <a href="carrito.php" style="color:#fff; text-decoration:none;" class="col-md-3">Carrito</a>
                <?php
                
            }
            ?>

        </div>
    </div>

    <div class="col-md-2"></div>
</footer>