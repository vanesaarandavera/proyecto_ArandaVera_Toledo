<div class="container-fluid">
    <?php
    if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php echo session()->getFlashdata('success')  ?>
        </div>
    <?php elseif (session()->getFlashdata('failed')) : ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php echo session()->getFlashdata('failed') ?>
        </div>
</div>
<?php endif; ?>
<div class="container centrado">
    <h1 class="titulo ">Listado de Productos Eliminados</h1>
</div>

<div class=" mt-3 centrado">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('listaProductos') ?>" class="btn btn-primary btn-estilos btn-danger btn-cancelar">Volver</a>
    </div>
</div>
<div class="mt-3 centrado">
    <div class=" table-responsive">


        <?php
        $productosEliminados = array_filter($producto, function ($unproducto) {
            return $unproducto['eliminado'] == '1';
        });
        ?>

        <?php if (empty($productosEliminados)) : ?>
            <p class="alert alert-warning">No hay productos eliminados.</p>
        <?php else : ?>
            <table class="table table-striped table-hover table-sm cuadro" id="user-list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Precio de Venta</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productosEliminados as $unproducto): ?>
                        <tr>
                            <td><?= esc($unproducto['id_producto']) ?></td>
                            <td><?= esc($unproducto['nombre_prod']) ?></td>
                            <td><?= esc($unproducto['autor']) ?></td>
                            <td><?= esc($unproducto['descripcion']) ?></td>
                            <td>$<?= number_format($unproducto['precio'], 2) ?></td>
                            <td>$<?= number_format($unproducto['precio_vta'], 2) ?></td>
                            <td><?= esc($unproducto['stock']) ?></td>
                            <td>
                                <?php if (!empty($unproducto['imagen']) && file_exists(FCPATH . 'assets/uploads/' . $unproducto['imagen'])): ?>
                                    <img src="<?= base_url('assets/uploads/' . $unproducto['imagen']) ?>" alt="Imagen <?= esc($unproducto['nombre_prod']) ?>" width="100" class="img-thumb" />
                                <?php else: ?>
                                    <span>No hay imagen</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('activar_pro/' . $unproducto['id_producto']) ?>" class="btn btn-accion btn-continuar">Activar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>


        </tbody>
        </table>
    </div>
</div>
</div>