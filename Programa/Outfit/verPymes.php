<?php
require_once 'function.php';
require_once 'conexion.php';

validarAdmin('verPymes.php');
// Consulta para obtener las categorías
$query = "SELECT * FROM pyme";
$resultado = $conexion->query($query);


?>

<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head2', 'verPymes.css'); ?>

<body>
    <?php render_template('sideBarAdmin'); ?>
    

    <div>
        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main>
            <div class="separador"></div>

            <!-- Cuerpo tabla -->
            <div class="fondoF">
                <h3 class="titu">Pymes</h3>

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Id Pyme</th>
                            <th>Nombre Pyme</th>
                            <th>direccion</th>
                            <th>Porcentaje comision</th>
                            <th>Estado</th>
                            <th>ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $filas['id_pyme'] ?></td>
                                <td><?php echo $filas['nom_pyme'] ?></td>
                                <td><?php echo $filas['dirección'] ?></td>
                                <td><?php echo $filas['comisión'] ?>%</td>
                                <?php if ($filas['estado_pyme'] == '1') { ?>
                                    <td>No aprobado</td>
                                <?php } else if ($filas['estado_pyme'] == '2') { ?>
                                    <td>Aprobada</td>
                                <?php } else if ($filas['estado_pyme'] == '3') { ?>
                                    <td>Aprobada</td>
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