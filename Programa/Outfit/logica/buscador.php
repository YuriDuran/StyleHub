<?php
require 'conexion.php';
// Verificar si se recibió el valor de búsqueda
if (isset($_POST['searchQuery'])) {
    // Obtener el valor de búsqueda
    $searchQuery = $_POST['searchQuery'];

    // Realizar la consulta con el filtro de búsqueda
    $consulta = "SELECT * FROM archivos WHERE id_estatus = 3 AND titulo OR autor LIKE '%$searchQuery%'";
    $resul = mysqli_query($conexion, $consulta);

    // Generar el contenido de la lista de archivos
    if ($resul) {
        while ($row = $resul->fetch_array()) {
            // Variables con los datos
            $id = $row['idarchivo'];
            $f_subida = $row['f_subida'];
            $titulo = $row['titulo'];
            $tematica = $row['tematica'];
            $nom_archivo = $row['nom_archivo'];
            $autor = $row['autor'];
            $pais = $row['id_pais'];
?>
            <div class="row">
                <div class="col">
                    <div class="item-wrapper">
                        <div class="col-sm-10">
                            <div class="artifact-description">
                                <div class="artifact-title">
                                    <a href="logica/descargar.php?id=<?php echo $id; ?>"><?php echo $titulo ?></a>
                                </div>
                                <div class="artifact-info">
                                    <span class="author h4">
                                        <small>
                                            <span>
                                                <?php echo $autor ?>
                                            </span>
                                        </small>
                                    </span>
                                    <span class="publisher-date h4">
                                        <small>
                                            (<span class="publisher">Duoc UC</span>, <span class="date"><?php echo $f_subida ?></span>)
                                        </small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
?>
