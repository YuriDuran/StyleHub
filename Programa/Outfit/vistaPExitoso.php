<?php require_once 'function.php'; 
$id_pedido = $_GET['id_pedido'] ?? null;

$pedido = mysqli_query($conexion, "SELECT * FROM pedidos WHERE id_pedido = $id_pedido");
$id2 = $pedido['id_pedido'];
$detalle = mysqli_query($conexion, "SELECT * FROM detalle_pedido WHERE id_pedido = $id2");
$pago = mysqli_query($conexion, "SELECT * FROM pago WHERE id_pedido = $id2");
$prod = mysqli_query($conexion, "SELECT * FROM productos WHERE id_producto = $detalle['id_producto']");

$resultado = mysqli_query($conexion, $pedido);
$resultado1 = mysqli_query($conexion, $detalle);
$resultado2 = mysqli_query($conexion, $pago);
$resultado3 = mysqli_query($conexion, $prod);

?>
<?php render_template('head', 'vistaPExitoso.css'); ?>

<body>
    <?php render_template('Header2'); ?>
    <div class="separador"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>!!Compra exitosa¡¡</h3>
                <h5>Su numero de pedido es: <?php echo $pedido['id_pedido']; ?></h5>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td><?php echo $detalle['nombre_producto']; ?></td>
                                    <td><?php echo $pago['monto']; ?></td>
                                    <td><?php echo $detalle['cantidad']; ?></td>
                                    <td><?php echo $detalle['subtotal_producto']; ?></td>
                                </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                <td><?php echo $oedido['total']; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>