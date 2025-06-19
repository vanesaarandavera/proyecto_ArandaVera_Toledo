<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card" style="width:75%;">
        <div class="titulo text-center">
            <h2>Alta de Productos</h2>
        </div>
        <!--Validacion -->
        <?php if (!empty(session()->getFlashdata('error'))): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php $validation = \Config\Services::validation(); ?>
        <!-- Inicio del formulario -->
        <form action="<?= base_url('enviar-prod'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nombre_prod">Titulo del libro</label>
                <input class="form-control" type="text" id="nombre_prod" name="nombre_prod" value="<?= set_value('nombre_prod') ?>"
                    placeholder="Titulo del libro" autofocus>
                <!--Error-->
                <?php if ($validation->getError('nombre_prod')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('nombre_prod') ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="nombre_prod">Autor del libro</label>
                <input class="form-control" type="text" id="autor" name="autor" value="<?= set_value('autor') ?>"
                    placeholder="Autor del libro" autofocus>
                <!--Error-->
                <?php if ($validation->getError('autor')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('autor') ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="nombre_prod">Descripción del libro</label>
                <input class="form-control" type="text" id="nombre_prod" name="descripcion" value="<?= set_value('descripcion') ?>"
                    placeholder="Descripcion del libro" autofocus>
                <!--Error-->
                <?php if ($validation->getError('descripcion')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('descripcion') ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen </label>
                <input class="form-control" type="file" id="imagen" name="imagen" accept="image/png, image/jpg, image/jpeg">
                <?php if ($validation->getError('imagen')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('imagen'); ?></div>
                <?php endif; ?> <!-- Cierre de endif para la validación de imagen -->
            </div>
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select class="form-select" id="categoria_id" name="categoria_id" required>
                    <option value="" selected>Seleccionar categoría</option>
                    <?php if (!empty($categorias) && is_array($categorias)): ?>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= htmlspecialchars($categoria['id_categorias']) ?>">
                                <?= htmlspecialchars($categoria['descripcion']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled>No hay categorías disponibles</option>
                    <?php endif; ?>
                </select>
            </div>


            <div class="mb-3">
                <label for="precio" class="form-label">Precio de costo</label>
                <input class="form-control" type="text" id="precio" name="precio" value="<?= set_value('precio'); ?>">
                <!--Error-->
                <?php if ($validation->getError('precio')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('precio'); ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="precio_vta" class="form-label">Precio de Venta </label>
                <input class="form-control" type="text" id="precio_vta" name="precio_vta" value="<?= set_value('precio_vta'); ?>">
                <!--Error-->
                <?php if ($validation->getError('precio_vta')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('precio_vta'); ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock </label>
                <input class="form-control" type="text" id="stock" name="stock" min="0" value="<?= set_value('stock'); ?>">
                <!--Error-->
                <?php if ($validation->getError('stock')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('stock') ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="stock_min">Stock Mínimo *</label>
                <input class="form-control" type="text" id="stock_min" name="stock_min" min="0" value="<?= set_value('stock_min'); ?>">
                <!--Error-->
                <?php if ($validation->getError('stock_min')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('stock_min'); ?></div>
                <?php endif; ?>
            </div>

            <!--botones-->
            <div class="d-flex justify-content-end pt-5 productos-btn">
                <button type="submit" id="send_form" class="btn btn-success btn-estilos btn-continuar">Guardar</button>
                <button type="reset" class="btn btn-danger btn-estilos">Limpiar</button>
                <a href="<?= base_url('listaProductos'); ?>" class="btn btn-secondary btn-estilos btn-continuar">Volver</a>
            </div>
        </form><!--fin del formulario-->
    </div>
</div>