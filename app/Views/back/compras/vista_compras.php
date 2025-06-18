<?php
$session = session();
if (empty($venta)) { ?>
    <!-- avisamos que no hay consultas -->
    <div class="container">
        <div class="alert alert-dark text-center" role="alert">
            <h4 class="alert-heading">No posee compras registradas</h4>
            <p>Para realizar una compra visite nuestro catálogo.</p>
            <hr>
            <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('catalogo') ?>">Catálogo</a>
        </div>
    <?php } ?>
    </div>
    <!-- Mostrar mensaje Flash si existe -->
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
            <?= session()->getFlashdata('mensaje') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="container">
            <div class="col-xl-12 col-xs-10">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm cuadro">
                        <thead>
                            <tr class="subtitulo text-center">
                                <th>N° ORDEN</th>
                                <th>NOMBRE PRODUCTO</th>
                                <th>IMAGEN</th>
                                <th>CANTIDAD</th>
                                <th>COSTO</th>
                                <th>COSTO SUB-TOTAL</th>
                            </tr>
                        </thead>
                        <?php $i = 0;
                        $total = 0; ?>
                        <!--Si es array de ventas y no esta vacío-->
                        <?php if (!empty($venta) && is_array($venta)) {
                            foreach ($venta as $row) {
                                $imagen = $row['imagen'];
                                $i++;
                        ?>
                                <tr class=" text-center">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row['nombre_prod']; ?></td>
                                    <td> <img width="100" height="60" src="<?php echo base_url('assets/uploads/' . $imagen) ?>"></td>
                                    <td><?php echo number_format($row['cantidad']) ?></td>
                                    <td><?php echo $row['precio']; ?></td>
                                    <td><?php $subtotal = ($row['precio'] * $row['cantidad']); ?><!--precio_vta-->
                                        <?php echo number_format($subtotal, 2) ?></td>
                                    <?php
                                    $total += $subtotal;
                                    ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <h4>Total</h4>
                                    </td>
                                    <td colspan="6" class="text-right">
                                        <h4><?php echo number_format($total, 2) ?></h4>
                                    </td>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xs-12 text-center">
            <p class="h5 text-warning">Gracias por su compra</p>
        </div>
    </div>
<?php } ?>