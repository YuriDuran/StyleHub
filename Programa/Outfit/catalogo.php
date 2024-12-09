<?php
require_once 'function.php';
$genero = $_GET['genero'];
?>
<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'catalogo.css'); ?>

<body>
    <?php
    include("conexion.php");

    // Validar y limpiar el parámetro genero
    $genero = isset($_GET['genero']) ? mysqli_real_escape_string($conexion, $_GET['genero']) : '';



    // Verificar si el género es válido
    if ($genero != 'mujer' && $genero != 'hombre') {
        // Redirigir o mostrar error si el género no es válido
        header('Location: index.php');
        exit();
    }

    // Capturar todos los filtros
    $orden = isset($_GET['orden']) ? mysqli_real_escape_string($conexion, $_GET['orden']) : '';
    $talla = isset($_GET['talla']) ? mysqli_real_escape_string($conexion, $_GET['talla']) : '';
    $color = isset($_GET['color']) ? mysqli_real_escape_string($conexion, $_GET['color']) : '';
    $precio_min = isset($_GET['precio_min']) ? (int)$_GET['precio_min'] : '';
    $precio_max = isset($_GET['precio_max']) ? (int)$_GET['precio_max'] : '';
    $categoria = isset($_GET['id_categoria']) ? mysqli_real_escape_string($conexion, $_GET['id_categoria']) : '';

    // Construir la consulta SQL base
    $sql = "SELECT * FROM productos WHERE estado = '2' AND genero = '" . $genero . "'";

    // Agregar filtros a la consulta
    if (!empty($talla)) {
        $sql .= " AND talla = '$talla'";
    }
    if (!empty($color)) {
        $sql .= " AND color = '$color'";
    }
    if (!empty($precio_min)) {
        $sql .= " AND precio >= $precio_min";
    }
    if (!empty($precio_max)) {
        $sql .= " AND precio <= $precio_max";
    }
    if (!empty($categoria)) {
        $sql .= " AND id_categoria = '$categoria'";
    }

    // Agregar ordenamiento
    if ($orden == 'precio_asc') {
        $sql .= " ORDER BY precio ASC";
    } elseif ($orden == 'precio_desc') {
        $sql .= " ORDER BY precio DESC";
    }

    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
    ?>

    <div class="container-fluid">
        <!--Aqui se encuentra el header de la pagina -->
        <?php render_template('Header2'); ?>

        <!--Aqui se encuentra el cuerpo de la pagina -->
        <main class="row">

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>

            <div class="col-md-12 separador"></div>

            <div class="col-md-10">
                <div class="filtros-container">
                    <h5>Filtros</h5>
                    <form class="row" method="GET" id="filtrosForm">
                        <input type="hidden" name="genero" value="<?php echo htmlspecialchars($genero); ?>">

                        <!-- Filtro de Tallas -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Talla</label>
                            <select name="talla" class="form-select">
                                <option value="">Todas las tallas</option>
                                <option value="XS" <?php echo ($talla == 'XS') ? 'selected' : ''; ?>>XS</option>
                                <option value="S" <?php echo ($talla == 'S') ? 'selected' : ''; ?>>S</option>
                                <option value="M" <?php echo ($talla == 'M') ? 'selected' : ''; ?>>M</option>
                                <option value="L" <?php echo ($talla == 'L') ? 'selected' : ''; ?>>L</option>
                                <option value="XL" <?php echo ($talla == 'XL') ? 'selected' : ''; ?>>XL</option>
                            </select>
                        </div>

                        <!-- Filtro de Colores -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Color</label>
                            <select name="color" class="form-select">
                                <option value="">Todos los colores</option>
                                <option value="Blanco" <?php echo ($color == 'Blanco') ? 'selected' : ''; ?>>Blanco</option>
                                <option value="Negro" <?php echo ($color == 'Negro') ? 'selected' : ''; ?>>Negro</option>
                                <option value="Rojo" <?php echo ($color == 'Rojo') ? 'selected' : ''; ?>>Rojo</option>
                                <option value="Amarillo" <?php echo ($color == 'Amarillo') ? 'selected' : ''; ?>>Amarillo</option>
                                <option value="Azul" <?php echo ($color == 'Azul') ? 'selected' : ''; ?>>Azul</option>
                                <option value="Verde" <?php echo ($color == 'Verde') ? 'selected' : ''; ?>>Verde</option>
                                <option value="Naranjo" <?php echo ($color == 'Naranjo') ? 'selected' : ''; ?>>Naranjo</option>
                                <option value="Morado" <?php echo ($color == 'Morado') ? 'selected' : ''; ?>>Morado</option>
                                <option value="Cafe" <?php echo ($color == 'Cafe') ? 'selected' : ''; ?>>Cafe</option>
                                <option value="Beige" <?php echo ($color == 'Beige') ? 'selected' : ''; ?>>Beige</option>
                            </select>
                        </div>

                        <!-- Filtro de Rango de Precio -->
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Rango de Precio</label>
                            <div class="d-flex gap-2">
                                <input type="number" name="precio_min" class="form-control" placeholder="Mín"
                                    value="<?php echo htmlspecialchars($precio_min); ?>">
                                <input type="number" name="precio_max" class="form-control" placeholder="Máx"
                                    value="<?php echo htmlspecialchars($precio_max); ?>">
                            </div>
                        </div>

                        <!-- Filtro de Categorias -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="id_categoria" class="form-select">
                                <option value="">Todas las categorías</option>
                                <?php
                                // Consulta para obtener las categorías
                                $sql_categorias = "SELECT id_categoria, nombre_categoria FROM categorias ORDER BY nombre_categoria";
                                $result_categorias = mysqli_query($conexion, $sql_categorias);

                                while ($cat = mysqli_fetch_assoc($result_categorias)) {
                                    $selected = ($categoria == $cat['id_categoria']) ? 'selected' : '';
                                    echo "<option value='" . htmlspecialchars($cat['id_categoria']) . "' $selected>" .
                                        htmlspecialchars($cat['nombre_categoria']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="col-md-3 mb-3 text-center">
                            <button type="submit" class="btn color mt-3">Aplicar Filtros</button>
                            <a href="catalogo.php?genero=<?php echo htmlspecialchars($genero); ?>"
                                class="btn btn-secondary mt-3">Limpiar Filtros</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Select para ordenar los productos -->
            <div class="col-md-2 text-end">
                <h5 class="mt-4">Ordenar</h5>
                <form method="GET" class="form-inline">
                    <input type="hidden" name="genero" value="<?php echo htmlspecialchars($genero); ?>">
                    <select name="orden" class="form-select" onchange="this.form.submit()" style="width: auto; display: inline-block;">
                        <option value="">Ordenar por</option>
                        <option value="precio_asc" <?php echo ($orden == 'precio_asc') ? 'selected' : ''; ?>>Precio: Menor a Mayor</option>
                        <option value="precio_desc" <?php echo ($orden == 'precio_desc') ? 'selected' : ''; ?>>Precio: Mayor a Menor</option>
                    </select>
                </form>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <!-- Productos -->
                    <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                        <div style="padding-top: 20px;" class="col-md-3 text-center">
                            <img src="<?php echo $filas['imagenF'] ?>" class="imagenC">
                            <h5><?php echo $filas['nombre'] ?></h5>
                            <p>$<?php $formatoSinDecimales = number_format($filas['precio'], 0, ',', '.');
                                echo $formatoSinDecimales ?></p>
                            <a href="producto.php?id=<?php echo $filas['id_producto'] ?>" class="boton">Ver más...</a>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>

            <!-- Separador de pagina -->
            <div class="col-md-12 separador"></div>
        </main>

        <!--Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>