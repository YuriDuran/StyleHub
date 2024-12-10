<?php require_once 'function.php'; 
$id = $_GET['id'];

$query = "SELECT 
            p.id_pedido,
            p.total,
            p.estado_pedido,
            pr.nombre AS nombre_producto,
            pr.precio,
            SUM(dp.cantidad) AS cantidad_total,
            pago_info.monto AS monto_pago,
            pago_info.metodo_pago
          FROM 
            pedidos p
          JOIN 
            detalle_pedido dp ON p.id_pedido = dp.id_pedido
          JOIN 
            productos pr ON dp.id_producto = pr.id_producto
          JOIN 
            (SELECT id_pedido, monto, metodo_pago 
             FROM pago 
             GROUP BY id_pedido) AS pago_info ON p.id_pedido = pago_info.id_pedido
          WHERE 
            p.id_pedido = ?
          GROUP BY 
            p.id_pedido, pr.id_producto, pr.nombre, pr.precio, pago_info.monto, pago_info.metodo_pago";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

// Obtener el primer registro para acceder al id_pedido y total
$row = $resultado->fetch_assoc(); // Asegúrate de que hay resultados antes de acceder a $row
?>
<?php render_template('head', 'vistaPExitoso.css'); ?>

<body>
    <?php render_template('Header2'); ?>
    <div class="separador"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="mb-2">!!Compra exitosa¡¡</h3> 
                <h5>Su numero de pedido es: <?php echo $row['id_pedido'] ?? 'No disponible'; ?></h5>
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
                            <?php 
                            // Reiniciar el puntero del resultado para mostrar los productos
                            $resultado->data_seek(0); // Regresar al inicio del resultado
                            if ($resultado->num_rows > 0) { // Verificar si hay resultados
                                while ($row = $resultado->fetch_assoc()) { 
                                    $si = $row['total']; ?>
                                    <tr>
                                        <td><?php echo $row['nombre_producto']; ?></td>
                                        <td>$<?php $formatoSinDecimales = number_format($row['precio'], 0, ',','.');
                                        echo $formatoSinDecimales; ?></td>
                                        <td><?php echo $row['cantidad_total']; ?></td>

                                        <td>$<?php $sub = $row['precio'] * $row['cantidad_total'];
                                        $formatoSinDecimales = number_format($sub, 0, ',','.');
                                        echo $formatoSinDecimales; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">No se encontraron productos para este pedido.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td>$<?php $formatoSinDecimales = number_format($si, 0, ',','.');
                                        echo $formatoSinDecimales; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
            
            <div class="col-md-12 separador"></div>

            <div class="col-md 12 text-center">
                <a href="index.php"><button class="btn colors">Volver al inicio</button></a>
            </div>
        </div>
    </div>
</body>