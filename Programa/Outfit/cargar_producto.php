<?php
require_once 'function.php'
?>
<!-- Aqui se encuentra el head de html de la pagina -->
<?php render_template('head', 'cargar_producto.css'); ?>

<body>
    <div class="container-fluid">
        <!-- Aqui se encuentra el header de la pagina -->
        <?php render_template('Header'); ?>

        <!-- Aqui se encuentra el cuerpo de la pagina -->
        <main class="row ">

            <div class="col-md-12 separador"></div>

            <div class="col-md-1"></div>

            <!-- Cuerpo Formulario -->
            <div class="col-md-10">
                <h3 class="text-center">Creacion de producto</h3>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" placeholder="Ej: Polera estampada" required>
                        </div>
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoria del producto</label>
                            <select name="categoria" id="categoria" class="form-select" required>
                                <option value="">Elegir categoria...</option>
                                <option value="1">Polera</option>
                                <option value="2">Camisa</option>
                                <option value="3">Pantalon</option>
                                <option value="4">Jeans</option>
                                <option value="5">Short</option>
                                <option value="6">Zapatillas</option>
                                <option value="7">Zapatos</option>
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
                        <div class="col-md-12">
                            <label class="form-label" for="imagen">Cargar</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-1"></div>
        </main>

        <!-- Aqui se encuentra el footer de la pagina -->
        <?php render_template('Footer'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>