<div class="container mt-5">
    <h2>Editar Libro</h2>
    <!--Validacion -->
    <?php if (!empty(session()->getFlashdata('error'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if (!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php $validation = \Config\Services::validation(); ?>
    <!-- Inicio del formulario -->
    <form action="<?= base_url('modificar/' . $old['id_producto']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre_prod" class="form-label">Título del libro</label>
            <input type="text" class="form-control" name="nombre_prod" id="nombre_prod" value="<?= esc($old['nombre_prod']) ?>">
            <?php if ($validation->getError('nombre_prod')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('nombre_prod') ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="nombre_prod" class="form-label">Autor del libro</label>
            <input type="text" class="form-control" name="autor" id="autor" value="<?= esc($old['autor']) ?>">
            <?php if ($validation->getError('autor')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('autor') ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="nombre_prod" class="form-label">Descripción del libro</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= esc($old['descripcion']) ?>">
            <?php if ($validation->getError('descripcion')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('descripcion') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-control" name="categoria_id" id="categoria_id" required>
                <option value="">Seleccione una categoría</option>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= esc($categoria['id_categorias']) ?>" <?= $categoria['id_categorias'] == $old['categoria_id'] ? 'selected' : '' ?>>
                        <?= esc($categoria['descripcion']) ?>
                    </option>
                <?php endforeach; ?>
                <?php if ($validation->getError('categoria_id')): ?>
                    <div class="alert alert-danger mt-2"><?= $validation->getError('categoria_id'); ?></div>
                <?php endif; ?>
            </select>

        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" value="<?= esc($old['precio']) ?>">
            <?php if ($validation->getError('precio')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('precio'); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="precio_vta" class="form-label">Precio de Venta</label>
            <input type="number" class="form-control" name="precio_vta" id="precio_vta" value="<?= esc($old['precio_vta']) ?>">
            <?php if ($validation->getError('precio_vta')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('precio_vta'); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="<?= esc($old['stock']) ?>">
            <?php if ($validation->getError('stock')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('stock') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="stock_min" class="form-label">Stock Mínimo</label>
            <input type="number" class="form-control" name="stock_min" id="stock_min" value="<?= esc($old['stock_min']) ?>">
            <?php if ($validation->getError('stock_min')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('stock_min'); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del Producto</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
            <?php if (!empty($old['imagen']) && file_exists(FCPATH . 'assets/uploads/' . $old['imagen'])) : ?>
                <img src="<?= base_url('assets/uploads/' . $old['imagen']) ?>" alt="Imagen del producto" class="img-thumbnail mt-2" width="150">
            <?php endif; ?>
            <?php if ($validation->getError('imagen')): ?>
                <div class="alert alert-danger mt-2"><?= $validation->getError('imagen'); ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        <a href="<?= base_url('listaProductos') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>