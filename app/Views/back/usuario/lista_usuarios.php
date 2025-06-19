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
        <div class="container">
            <h1 class="titulo centrado">Listado de Usuarios</h1>
        </div>

    <div class=" d-flex justify-content-end productos-btn">
        <button class="btn btn-primary btn-estilos btn-continuar" onclick="location.href='<?= base_url('registrarse') ?>'">Agregar</button>
        <button class="btn btn-warning btn-estilos btn-continuar" onclick="location.href='<?= base_url('usuariosInactivos') ?>'">Inactivos</button>
        <button class="btn btn-info btn-estilos btn-continuar" onclick="location.href='<?= base_url('listaUsuarios') ?>'">Todos</button>
    </div>
    <div class="mt-3">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm cuadro">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios) && is_array($usuarios)) : ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?= esc($usuario['id_usuario']) ?></td>
                            <td><?= esc($usuario['nombre']) ?></td>
                            <td><?= esc($usuario['apellido']) ?></td>
                            <td><?= esc($usuario['email']) ?></td>
                            <td><?= esc($usuario['usuario']) ?></td>
                            <td>
                                <?php echo esc($usuario['perfil_id']);?>
                            </td>
                            <td>
                                <?php
                                // Muestra "Activo" o "Inactivo" según el campo 'baja'
                                echo ($usuario['baja'] === 'NO') ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>';
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/usuarios/editar/' . esc($usuario['id_usuario'])) ?>" class="btn btn-sm btn-info me-2">Editar</a>
                                <?php if ($usuario['baja'] === 'NO') : ?>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmacionCambioEstado(<?= esc($usuario['id_usuario']) ?>, 'baja')">Dar de Baja</button>
                                <?php else : ?>
                                    <button type="button" class="btn btn-sm btn-success" onclick="confirmacionCambioEstado(<?= esc($usuario['id_usuario']) ?>, 'alta')">Dar de Alta</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center">No hay usuarios para mostrar.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
 </div>
</div>

<script>
    function confirmacionCambioEstado(id, action) {
        let message = '';
        let url = '';

        if (action === 'baja') {
            message = '¿Estás seguro de que deseas dar de BAJA al usuario con ID ' + id + '? Esto lo desactivará.';
            url = '<?= base_url('admin/usuarios/baja/') ?>' + id; 
        } else if (action === 'alta') {
            message = '¿Estás seguro de que deseas dar de ALTA al usuario con ID ' + id + '? Esto lo activará.';
            url = '<?= base_url('admin/usuarios/alta/') ?>' + id; 
        }

        if (confirm(message)) {
            window.location.href = url;
        }
    }
</script>
