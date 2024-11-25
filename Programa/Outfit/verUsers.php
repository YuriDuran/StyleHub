<?php
require_once 'function.php';
require_once 'conexion.php';

validarAdmin('verPymes.php');
// Consulta para obtener las categorías
$query = "SELECT * FROM usuarios";
$resultado = $conexion->query($query);


?>

<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head2', 'verUsers.css'); ?>

<body>
    <?php render_template('sideBarAdmin'); ?>
    

    <div>
        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main>
            <div class="separador"></div>

            <!-- Cuerpo tabla -->
            <div class="fondoF">
                <h3 class="titu">Usuarios</h3>

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Id usuario</th>
                            <th>Nombre usuario</th>
                            <th>correo</th>
                            <th>Fecha de registro</th>
                            <th>Tipo de usuario</th>
                            <th>ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $filas['id_usuario'] ?></td>
                                <td><?php echo $filas['nombre'] . " " . $filas['apellidos']?></td>
                                <td><?php echo $filas['correo'] ?></td>
                                <td><?php echo $filas['fech_regis'] ?></td>
                                <?php if ($filas['tip_usuario'] == '1') { ?>
                                    <td>Comprador</td>
                                <?php } else if ($filas['tip_usuario'] == '2') { ?>
                                    <td>Pyme</td>
                                <?php } else if ($filas['tip_usuario'] == '3') { ?>
                                    <td>Administrador</td>
                                <?php } ?>
                                <td><button class="si4"><ion-icon name="eye-outline"></ion-icon> Ver</button></td>
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