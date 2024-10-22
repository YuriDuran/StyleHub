<?php
require_once 'function.php';
require_once 'conexion.php';

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    
    $color = $_POST['color'];
    
    $imagenes = [
        'frontal' => $_FILES['imagenF'],
        'derecha' => $_FILES['imagenD'],
        'izquierda' => $_FILES['imagenI'],
        'trasera' => $_FILES['imagenT']
    ];

    if (guardarProducto($conexion, $nombre, $categoria, $precio, $color, $descripcion, $imagenes)) {
        echo "<script>alert('Producto guardado con éxito');</script>";
    } else {
        echo "<script>alert('Error al guardar el producto');</script>";
    }
}

// Consulta para obtener las categorías
$query = "SELECT id_categoria, nombre_categoria FROM categorias";
$resultado = $conexion->query($query);
?>

<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'cargar_producto.css'); ?>

<body class="fondoT">
    <div class="container-fluid">
        <!-- Aqui se encuentra el header de la pagina -->
        <?php render_template('Header2'); ?>

        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main class="row ">

            <div class="col-md-12 separador"></div>

            <div class="col-md-2"></div>

            <!-- Cuerpo Formulario -->
            <div class="col-md-8 fondoF">
                <h3 class="text-center">Creacion de producto</h3>
                <form action="">
                    <div class="row">
                        <!-- Nombre del prodcuto -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" placeholder="Ej: Polera estampada" required>
                        </div>
                        <!-- Categoria del producto -->
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoria del producto</label>
                            <select name="categoria" id="categoria" class="form-select" required>
                                <option value="">Elegir categoría...</option>
                                <?php
                                // Llenar el select con las categorías
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value='" . $fila['id_categoria'] . "'>" . $fila['nombre_categoria'] . "</option>";
                                }
                                ?>
                                <?php
                                mysqli_close($conexion);
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio del producto</label>
                            <input type="number" class="form-control" placeholder="Ej: 2990" required>
                        </div>
                        <div class="col-md-6">
                            <label for="color" class="form-label">Color del producto</label>
                            <select name="color" id="color" class="form-select" required>
                                <option value="">Elegir color...</option>
                                <option value="1">Blanco</option>
                                <option value="2">Negro</option>
                                <option value="3">Rojo</option>
                                <option value="4">Amarillo</option>
                                <option value="5">Azul</option>
                                <option value="6">Verde</option>
                                <option value="7">Naranjo</option>
                                <option value="8">Morado</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" placeholder="Ingrese una breve descripcion del producto" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12 mt-4">
                            <p>En este apartado se le solicita subir 4 fotos de la prenda a publicar en nuestra pagina. Esto para poder nosotros procesar esta prenda para el mdoelado por eso se solicitan imagenes frontales, costados y trasero</p>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="imagenF">Cargar foto frontal</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="imagenD">Cargar foto lado derecho</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="imagenI">Cargar foto lado izquierdo</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="imagenT">Cargar foto trasero</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>

                        <div class="col-md-12 text-center Cboton">
                            <button class="btn enviar">Registrar producto</button>
                        </div>
                    </div>


                </form>
            </div>

            <div class="col-md-2"></div>

            <div class="col-md-12 separador"></div>
        </main>

        <!-- Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
