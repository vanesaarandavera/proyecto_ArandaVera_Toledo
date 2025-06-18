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
    <div class="container">
        <h1 class="titulo centrado">Listado de Productos Eliminados</h1>
    </div>

<div class="container mt-3">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('listaProductos') ?>" class="btn btn-success btn-sm mt-1">Volver</a>
    </div>
</div>
    <div class="mt-3">
        <div class=" table-responsive">
            <table class="table table-striped table-hover table-sm cuadro" id="user-list">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Titulo</th>
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
                    <?php
                    if ($producto) : ?>
                        <?php foreach ($producto as $unproducto): ?>
                            <?php $eliminado = $unproducto['eliminado']; ?>
                            <?php if ($eliminado == '1'): ?>
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
                                        <a href="<?php echo base_url('activar_pro/' . $unproducto['id_producto']) ?>" class="btn-action">Activar</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>