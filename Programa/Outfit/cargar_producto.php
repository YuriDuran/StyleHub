<?php
require_once 'function.php';
require_once 'conexion.php';

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
                <form action="logica/cargar_product.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Nombre del prodcuto -->
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre del producto</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>
                        <!-- Categoria del producto -->
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoria del producto</label>
                            <select name="categoria" id="categoria" class="form-select" required>
                                <option value="">Elegir categoría...</option>
                                <?php
                                // Llenar el select con las categorías
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo "<option value='" . $fila['id_categoria'] . "'>" . $fila['nombre_categoria'] . "</option>";
                                }
                                ?>
                                <?php
                                mysqli_close($conexion);
                                ?>
                            </select>
                        </div>
                        <!-- Precio del producto -->
                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio del producto</label>
                            <input type="number" id="precio" name="precio" class="form-control" step="0.01" required>
                        </div>
                        <!-- Color del producto -->
                        <div class="col-md-6">
                            <label for="color" class="form-label">Color del producto</label>
                            <select name="color" id="color" class="form-select" required>
                                <option value="">Elegir color...</option>
                                <option value="Blanco">Blanco</option>
                                <option value="Negro">Negro</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Azul">Azul</option>
                                <option value="Verde">Verde</option>
                                <option value="Naranjo">Naranjo</option>
                                <option value="Morado">Morado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">stock del producto</label>
                            <input type="number" id="stock" name="stock" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="talla" class="form-label">Talla del producto</label>
                            <input type="text" id="talla" name="talla" class="form-control" required>
                        </div>
                        <!-- Descripcion del producto -->
                        <div class="col-md-12">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" placeholder="Ingrese una breve descripcion del producto" class="form-control" required></textarea>
                        </div>
                        <!-- Informacion del formulario -->
                        <div class="col-md-12 mt-4">
                            <p>En este apartado se le solicita subir 4 fotos de la prenda a publicar en nuestra pagina. Esto para poder nosotros procesar esta prenda para el mdoelado por eso se solicitan imagenes frontales, costados y trasero</p>
                        </div>
                        <!-- Carga de todas las fotos del producto -->
                        <div class="col-md-12">
                            <label class="form-label" for="imagenF">Cargar foto frontal</label>
                            <input type="file" class="form-control" id="imagenF" name="imagenF" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="imagenD">Cargar foto lado derecho</label>
                            <input type="file" class="form-control" id="imagenD" name="imagenD" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="imagenI">Cargar foto lado izquierdo</label>
                            <input type="file" class="form-control" id="imagenI" name="imagenI" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="imagenT">Cargar foto trasero</label>
                            <input type="file" class="form-control" id="imagenT" name="imagenT" required>
                        </div>

                        <div class="col-md-12 text-center Cboton">
                            <button type="submit" class="btn enviar">Registrar producto</button>
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

