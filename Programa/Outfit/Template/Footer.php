<!--Aqui se encuentra el footer de la pagina -->

<?php 

$m = "mujer";
$h = "hombre";
?>

<footer class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="row text-center pt-1">
            
            <?php

            // Verificar si la variable de sesión 'user' está configurada
            if (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 1) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                $style = "color:#fff; text-decoration:none;";
                $style2 = "color:#fff; text-decoration:none; font-size:20px;";
                $mujer = "catalogo.php?genero=". $m;
                $hombre = "catalogo.php?genero=". $h;
                $carrito = "carrito.php";
                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<a href='" . $mujer . " ' style='" . $style . "' class='" . $si . "'>Mujer</a>";
                echo "<a href='" . $hombre . " ' style='" . $style . "' class='" . $si . "'>Hombre</a>";
                echo "<a href='" . $cerrar . " ' style='" . $style . "' class='" . $si . "'>Cerrar sesión</a>";
                echo "<a href='" . $carrito . " ' style='" . $style2 . "' class='" . $si . "'>🛒</a>";
            } 
            elseif (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 2) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                $style = "color:#fff; text-decoration:none;";
                $style2 = "color:#fff; text-decoration:none; font-size:20px;";
                $mujer = "catalogo.php?genero=". $m;
                $hombre = "catalogo.php?genero=". $h;
                $carrito = "carrito.php";
                $administracion = "vistas_admin/pag_principal_a.php";
                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<a href='" . $mujer . " ' style='" . $style . "' class='" . $si . "'>Mujer</a>";
                echo "<a href='" . $hombre . " ' style='" . $style . "' class='" . $si . "'>Hombre</a>";
                echo "<a href='". $administracion ."?id=". $_SESSION['id_usuario'] ."' class='". $si ."' style='" . $style . "'>Administración</a>";
                echo "<a href='" . $cerrar . "' class='" . $si . "' style='" . $style . "'>Cerrar sesión</a>";
                
            }
            elseif (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 3) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                $style = "color:#fff; text-decoration:none;";
                $style2 = "color:#fff; text-decoration:none; font-size:20px;";
                $mujer = "catalogo.php?genero=". $m;
                $hombre = "catalogo.php?genero=". $h;
                $carrito = "carrito.php";
                $administracion = "administracion.php";
                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<a href='" . $mujer . " ' style='" . $style . "' class='" . $si . "'>Mujer</a>";
                echo "<a href='" . $hombre . " ' style='" . $style . "' class='" . $si . "'>Hombre</a>";
                echo "<a href='" . $administracion . "?id=" . $_SESSION['id_usuario'] . "' class='" . $si . "' style='" . $style . "'>Administración</a>";
                echo "<a href='" . $cerrar . "' class='" . $si . "' style='" . $style . "'>Cerrar sesión</a>";
            }
            else {
                ?>
                <a href="iniciar.php" style="color:#fff; text-decoration:none; padding-top:5px;" class="col-md-3">Inicio de sesion</a>
                <a href="catalogo.php?genero=<?php echo $m?>" style="color:#fff; text-decoration:none; padding-top:5px; " class="col-md-3"> Mujer </a>
                <a href="catalogo.php?genero=<?php echo $h?>" style="color:#fff; text-decoration:none; padding-top:5px;" class="col-md-3"> Hombre </a>
                <a href="carrito.php" style="color:#fff; text-decoration:none; font-size:20px;" class="col-md-3">🛒</a>
                <?php
                
            }
            ?>

        </div>
    </div>

    <div class="col-md-2"></div>
</footer>