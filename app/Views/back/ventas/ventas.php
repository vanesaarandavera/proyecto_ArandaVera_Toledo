<div class="container-fluid">
    <?php
    if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container centrado">
        <h1 class="titulo ">Listado de Ventas</h1>
    </div>

    <div class="table-responsive-sm">
        <table id="ventasTable" class="table table-striped table-hover table-sm cuadro">
            <thead>
                <tr>
                    <th>ID Detalle</th>
                    <th>ID Venta</th>
                    <th>Fecha Venta</th>
                    <th>Nombre Cliente</th>
                    <th>Apellido Cliente</th>
                    <th>Nombre Producto</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario Vendido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Ensure $ventas_detalle exists and is an array
                if (!empty($ventas_detalle) && is_array($ventas_detalle)) : ?>
                    <?php foreach ($ventas_detalle as $detalle) : ?>
                        <tr>
                            <td><?php echo esc($detalle['id_ventas_detalle'] ?? 'N/A'); ?></td>
                            <td><?php echo esc($detalle['venta_id'] ?? $detalle['ventas_id'] ?? 'N/A'); ?></td>
                            <td><?php echo esc($detalle['fecha'] ?? 'N/A'); ?></td>
                            <td><?php echo esc($detalle['nombre_usuario'] ?? 'N/A'); ?></td>
                            <td><?php echo esc($detalle['apellido_usuario'] ?? 'N/A'); ?></td>
                            <td><?php echo esc($detalle['nombre_prod'] ?? 'N/A'); ?></td>
                            <td>
                                <?php if (!empty($detalle['imagen']) && file_exists(FCPATH . 'assets/uploads/' . $detalle['imagen'])) : ?>
                                    <img src="<?= base_url('assets/uploads/'  . esc($detalle['imagen'])) ?>" alt="Imagen <?= esc($detalle['nombre_prod']) ?>" class="img-thumb" width="100" /> <?php else : ?>
                                    <span>No hay imagen</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo number_format($detalle['cantidad'] ?? 0); ?></td>
                            <td><?php echo number_format($detalle['precio'] ?? 0, 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="9" class="text-center">No hay ventas para mostrar.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>