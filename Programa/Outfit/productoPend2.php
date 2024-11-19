<?php
require_once 'function.php';
require_once 'conexion.php';

validarAdmin('productoPend.php');
// Consulta para obtener las categorías
$query = "SELECT * FROM productos WHERE estado = '1'";
$resultado = $conexion->query($query);


?>

<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head2', 'productoPend2.css'); ?>

<body>

    <div class="sidebar">
        <ul>
            <li class="logo">
                <a href="#">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="text">StyleHub</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="administracion.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="text">Inicio</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="text">Usuario</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                    <span class="text">Pymes</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="productoPend2.php">
                    <span class="icon"><ion-icon name="checkmark-done-circle-outline"></ion-icon></span>
                    <span class="text">Verificacion de productos</span>
                </a>
            </li>
        </ul>
        <ul>
            <div class="bottom">
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="imgBx">
                                <img src="img/spider.png" alt="">
                            </div>
                        </span>
                        <span class="text">Administrador</span>
                    </a>
                </li>
                <li>
                    <a href="logica/cerrar_sesion.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="text">Cerrar Sesion</span>
                    </a>
                </li>
            </div>
        </ul>
    </div>

    <div>
        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main>
            <div class="separador"></div>

            <!-- Cuerpo tabla -->
            <div class="fondoF">
                <h3 class="titu">Productos pendientes de aprobacion</h3>

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Id producto</th>
                            <th>Nombre producto</th>
                            <th>Estado</th>
                            <th>Foto producto</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $filas['id_producto'] ?></td>
                                <td><?php echo $filas['nombre'] ?></td>
                                <?php if ($filas['estado'] = '1') { ?>
                                    <td>No aprobado</td>
                                <?php } ?>

                                <td>en proceso</td>
                                <td>
                                    <a href="logica/imgToGLB.php?id=<?php echo $filas['id_producto']; ?>"><button class="botonS">Aprobar</button></a>
                                    <button class="botonW">Rechazar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>

            </div>

            <div class="separador"></div>
        </main>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>