<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 m-auto">

            <?php
            // Display flash messages (success/error)
            if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php elseif (session()->getFlashdata('error')) : // Changed 'failed' to 'error' for consistency with controller ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?php echo session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php $validation = \Config\Services::validation(); ?>

            <form action="<?= base_url('admin/usuarios/modificar/' . $user_data['id_usuario']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Editar Usuario</h5>
                    </div>

                    <div class="card-body p-5">
                        <div class="form-group mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control <?php if ($validation->getError('nombre')) : ?>is-invalid<?php endif ?>"
                                name="nombre" id="nombre" placeholder="Nombre"
                                value="<?= set_value('nombre', $user_data['nombre']); ?>" />
                            <?php if ($validation->getError('nombre')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control <?php if ($validation->getError('apellido')) : ?>is-invalid<?php endif ?>"
                                name="apellido" id="apellido" placeholder="Apellido"
                                value="<?= set_value('apellido', $user_data['apellido']); ?>" />
                            <?php if ($validation->getError('apellido')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('apellido') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control <?php if ($validation->getError('email')) : ?>is-invalid<?php endif ?>"
                                name="email" id="email" placeholder="Email"
                                value="<?= set_value('email', $user_data['email']); ?>" />
                            <?php if ($validation->getError('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control <?php if ($validation->getError('usuario')) : ?>is-invalid<?php endif ?>"
                                name="usuario" id="usuario" placeholder="Usuario"
                                value="<?= set_value('usuario', $user_data['usuario']); ?>" />
                            <?php if ($validation->getError('usuario')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('usuario') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pass" class="form-label">Contraseña (dejar en blanco para no cambiar)</label>
                            <input type="password" class="form-control <?php if ($validation->getError('pass')) : ?>is-invalid<?php endif ?>"
                                name="pass" id="pass" placeholder="Contraseña" value="" />
                            <?php if ($validation->getError('pass')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pass') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php
                        
                        if (session()->get('perfil_id') == 1) : ?>
                            <div class="form-group mb-3">
                                <label for="perfil_id" class="form-label">Perfil</label>
                                <select class="form-select <?php if ($validation->getError('perfil_id')) : ?>is-invalid<?php endif ?>" name="perfil_id" id="perfil_id">
                                    <?php foreach ($perfiles as $perfil) : ?>
                                        <option value="<?= $perfil['id_perfil'] ?>"
                                            <?= set_select('perfil_id', $perfil['id_perfil'], ($perfil['id_perfil'] == $user_data['perfil_id'])); ?>>
                                            <?= $perfil['descripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if ($validation->getError('perfil_id')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('perfil_id') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group pt-5 d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
                            <p class="d-flex justify-content-between align-items-center m-0">
                                <?php if (session()->get('perfil_id') == 1) : ?>
                                    <a href="<?= base_url('listaUsuarios') ?>" class="btn btn-danger">CANCELAR</a>
                                <?php else : ?>
                                    <a href="<?= base_url('inicio') ?>" class="btn btn-danger">CANCELAR</a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>