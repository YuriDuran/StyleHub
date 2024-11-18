<!--Aqui se encuentra el footer de la pagina -->
<footer class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="row text-center">
            <a href="catalogoM.php" style="color:#fff" class="col-md-3"> Mujer </a>
            <a href="catalogoH.php" style="color:#fff" class="col-md-3"> Hombre </a>
            <?php
            session_start(); // Asegúrate de tener esto al principio de tu archivo PHP

            // Verificar si la variable de sesión 'user' está configurada
            if (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 1) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<p class=". $si .">Bienvenido, " . htmlspecialchars($_SESSION['nombre']) . "</p>";
                echo "<a href=". $cerrar ." class=". $si .">Cerrar sesion</a>";
            } 
            elseif (isset($_SESSION['nombre']) && $_SESSION['tip_usuario'] == 2) {
                $si = "col-md-3";
                $cerrar = "logica/cerrar_sesion.php";
                $administracion = "vistas_admin/pag_principal_a.php";
                $id = $_SESSION['id_usuario']; // Asegúrate de que la ID esté guardada en la sesión

                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<a href='". $administracion ."?id=". $id ."' class='". $si ."'>Administración</a>";
                echo "<a href='". $cerrar ."' class='". $si ."'>Cerrar sesión</a>";
}
            else {
                ?>
                <a href="inicio_sesion.php" style="color:#fff" class="col-md-3">inicio de sesion</a>

                <a href="iniciar.php" style="color:#fff" class="col-md-3"> prueba </a>
                <?php
            }
            ?>

        </div>
    </div>

    <div class="col-md-2"></div>
</footer>