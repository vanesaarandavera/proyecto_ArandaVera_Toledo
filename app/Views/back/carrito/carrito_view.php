<div class="container-fluid">
    <div class="cart">
        <div class="heading centrado">
            <h2 class="text-center titulo">Productos en tu Carrito</h2>
        </div>
    </div>
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
            <?= session()->getFlashdata('mensaje') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>
    <div class="subtitulo text-center">
        <?php if (empty($cart)): ?>
            <p>Para agregar productos al carrito, hacé clic en:</p>
            <a class="btn btn-warning text-dark mt-2" href="<?= base_url('todos_p') ?>">
                <i class="fa-solid fa-circle-chevron-left"></i> Volver al catálogo
            </a>
        <?php endif; ?>
    </div>
    <?php if (empty($cart)): ?>
    <?php else: ?>
        <form action="<?= base_url('carrito_actualiza') ?>" method="post">
            <div class="container mt-3">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm cuadro">
                        <thead>
                            <tr>
                                <th>IMAGEN</th>
                                <th>PRODUCTO</th>
                                <th>PRECIO</th>
                                <th>CANTIDAD</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $gran_total = 0; ?>
                            <?php foreach ($cart as $item): ?>
                                <?php $gran_total += $item['price'] * $item['qty']; ?>
                                <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][id]" value="<?= esc($item['id']) ?>">
                                <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][rowid]" value="<?= esc($item['rowid']) ?>">
                                <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][name]" value="<?= esc($item['name']) ?>">
                                <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][price]" value="<?= esc($item['price']) ?>">
                                <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][qty]" value="<?= esc($item['qty']) ?>">
                                <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][imagen]" value="<?= esc($item['imagen']) ?>">
                                <tr class=" align-middle">
                                    <td><img src="<?= base_url('assets/uploads/') . esc($item['imagen']) ?>" width="80" height="80" alt="<?= esc($item['name']) ?>"></td>
                                    <td><?= esc($item['name']) ?></td>
                                    <td>$ <?= number_format($item['price'], 2) ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="<?= base_url('carrito_suma/') . $item['rowid'] ?>"><i class="fa-solid fa-plus"></i></a>
                                        <?= number_format($item['qty']) ?>
                                        <a class="btn btn-sm btn-danger" href="<?= base_url('carrito_resta/') . $item['rowid'] ?>"><i class="fa-solid fa-minus"></i></a>
                                    </td>
                                    <td>$ <?= number_format($item['subtotal'], 2) ?></td>
                                    <td class="text-end">
                                        <a class="btn btn-success btn-sm btn-accion" href="<?= base_url('carrito_elimina/') . $item['rowid'] ?>"> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="table-light">
                                <td colspan="4"><strong>Total: $ <?= number_format($gran_total, 2) ?></strong></td>
                                <td colspan="2" class="text-end">
                                    <input type="button" class="btn btn-danger btn-estilos btn-cancela " value="Borrar Carrito" onclick="window.location='<?= base_url('/borrar') ?>'">
                                    <input type="button" class="btn btn-success btn-estilos btn-continuar" value="Comprar" onclick="window.location='<?= base_url('/carrito-comprar') ?>'">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    <?php endif; ?>
    <br>
</div>