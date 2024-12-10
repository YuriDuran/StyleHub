<?php
require_once 'function.php';
require_once 'conexion.php';

validarAdmin('aprobarPyme.php');
$query = "SELECT * FROM pyme WHERE estado_pyme = 1"; 
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
                <h3 class="titu">Aprobar Pymes</h3>

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Nombre Pyme</th>
                            <th>direccion</th>
                            <th>Estado</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultado->num_rows === 0) { ?>
                            <tr>
                                <td colspan="4">No existen solicitudes por aprobar.</td>
                            </tr>
                        <?php } else { ?>
                        <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $filas['nom_pyme'] ?></td>
                                <td><?php echo $filas['dirección'] ?></td>
                                <?php if ($filas['estado_pyme'] == '1') { ?>
                                    <td>No aprobado</td>
                                <?php } else if ($filas['estado_pyme'] == '2') { ?>
                                    <td>Aprobada</td>
                                <?php } else if ($filas['estado_pyme'] == '3') { ?>
                                    <td>Aprobada</td>
                                <?php } ?>
                                <td><button class="si5"><ion-icon name="checkmark-done-circle-outline"></ion-icon>Aprobar</button>
                                <button class="si6"><ion-icon name="eye-outline"></ion-icon>Rechazar</button></td>
                            </tr>
                        <?php } ?>
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