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

    <?php render_template('sideBarAdmin'); ?>

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
                        <?php if($resultado->num_rows == 0) { ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>No hay solicitudes</td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php } else { ?>
                            <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                                <tr>
                                    <td><?php echo $filas['id_producto'] ?></td>
                                    <td><?php echo $filas['nombre'] ?></td>
                                    <?php if ($filas['estado'] == '1') { ?>
                                        <td>No aprobado</td>
                                    <?php } ?>
                                    <td>en proceso</td>
                                    <td>
                                        <a href="logica/imgToGLB.php?id=<?php echo $filas['id_producto']; ?>"><button class="botonS">Aprobar</button></a>
                                        <button class="botonW">Rechazar</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <div class="separador"></div>
        </main>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>