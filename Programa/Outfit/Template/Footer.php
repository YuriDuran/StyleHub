<!--Aqui se encuentra el footer de la pagina -->
<footer class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="row text-center">
            <a href="catalogoM.php" style="color:#fff" class="col-md-3"> Mujer </a>
            <a href="catalogoH.php" style="color:#fff" class="col-md-3"> Hombre </a>
            <a class="col-md-3" style="color:#fff"> Niño </a>
            <?php
            session_start(); // Asegúrate de tener esto al principio de tu archivo PHP

            // Verificar si la variable de sesión 'user' está configurada
            if (isset($_SESSION['nombre'])) {
                $si = "col-md-3";
                // Mostrar contenido si el usuario ha iniciado sesión
                echo "<p class=". $si .">Bienvenido, " . htmlspecialchars($_SESSION['nombre']) . "</p>";
                ?>
                <a href="cerrar_sesion.php" style="color:#fff" class="col-md-3">cerrar</a>
                <?php
            } else {
                ?>
                <a href="inicio_sesion.php" style="color:#fff" class="col-md-3">inicio de sesion</a>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="col-md-2"></div>
</footer>