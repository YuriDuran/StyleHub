<?php
require_once 'function.php';

?>
<?php render_template('head', 'carrito.css'); ?>

<body>
    <?php render_template('Header2'); ?>

    <div class="separador"></div>

    <div class="container mt-5">
        <h1>Carrito de Compras</h1>

        <?php if (empty($_SESSION['carrito'])): ?>
            <p>Tu carrito está vacío</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['carrito'] as $item): ?>
                            <tr>
                                <td><?php echo $item['nombre']; ?></td>
                                <td><img src="<?php echo $item['imagen']; ?>" alt="<?php echo $item['nombre']; ?>" style="width: 50px;"></td>
                                <td>$<?php echo number_format($item['precio'], 0, ',', '.'); ?></td>
                                <td><?php echo $item['cantidad']; ?></td>
                                <td>$<?php echo number_format($item['precio'] * $item['cantidad'], 0, ',', '.'); ?></td>
                                <td>
                                    <form method="POST" action="eliminar_carrito.php">
                                        <input type="hidden" name="id_producto" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total:</strong></td>
                            <td>$<?php echo number_format(obtenerTotalCarrito(), 0, ',', '.'); ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-end mt-3">
                <a href="index.php" class="btn btn-secondary">Seguir Comprando</a>
                <form action="prueba.php" method="POST" style="display: inline;">
                    <input type="hidden" name="monto" value="<?php echo obtenerTotalCarrito(); ?>">
                    <input type="hidden" name="orden" value="<?php echo uniqid('orden_'); ?>">
                    <?php
                    // Enviamos los datos del carrito
                    foreach ($_SESSION['carrito'] as $item) {
                        echo '<input type="hidden" name="productos[]" value="' . htmlspecialchars(json_encode($item)) . '">';
                    }
                    ?>
                    <button type="submit" class="btn btn-primary">Proceder al Pago</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <?php render_template('Footer'); ?>
</body>