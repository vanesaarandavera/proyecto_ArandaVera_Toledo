<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <?php if (!empty($producto['imagen']) && file_exists(FCPATH . 'assets/uploads/' . $producto['imagen'])): ?>
                <img src="<?= base_url('assets/uploads/' . $producto['imagen']) ?>" class="img-fluid rounded" alt="Imagen de <?= esc($producto['nombre_prod']) ?>">
            <?php else: ?>
                <div class="text-center border p-3 bg-light">
                    <p>No hay imagen disponible para este libro.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-7">
            <h2 class="titulo"><?= esc($producto['nombre_prod']) ?></h2>
            <p class="lead"><strong>Autor:</strong> <?= esc($producto['autor']) ?></p>
            <hr>
            <p class="precio-detalle"><strong>Precio:</strong> <span class="h4 text-primary">$<?= number_format($producto['precio_vta'], 2) ?></span></p>
            <p><strong>Stock disponible:</strong>
                <?php if ($producto['stock'] > 0): ?>
                    <span class="badge bg-success"><?= esc($producto['stock']) ?> unidades</span>
                <?php else: ?>
                    <span class="badge bg-danger">Sin Stock</span>
                <?php endif; ?>
            </p>
            <p ><strong>Descripción:</strong></p>
                <p class="text-justify text-responsive-md" style="font-size: 0.95em;"><?= nl2br(esc($producto['descripcion'])) ?></p>

            <div class="mt-4">
                <?php if ($producto['stock'] > 0) { ?>
                    <?php
                    echo form_open('/carrito/add', ['class' => 'd-inline-block']);
                    echo form_hidden('id', $producto['id_producto']);
                    echo form_hidden('precio_vta', $producto['precio_vta']);
                    echo form_hidden('nombre_prod', $producto['nombre_prod']);
                    echo form_hidden('imagen', $producto['imagen']);
                    $btn = [
                        'class' => 'btn btn-success btn-lg',
                        'value' => 'Agregar al Carrito',
                        'name' => 'action',
                    ];
                    echo form_submit($btn);
                    echo form_close();
                    ?>
                <?php } else { ?>
                    <p class="text-danger mt-3">Este producto está sin stock en este momento.</p>
                <?php } ?>

                <a href="<?= base_url('/todos_p') ?>" class="btn btn-outline-secondary ms-2">Volver al Catálogo</a>
                </div>
        </div>
    </div>
</div>
