<div class="container mt-5 mb-5 d-flex justify-content-center align-items-center ">
    <div class="col-md-6 col-lg-4 p-4 rounded shadow bg-light">
        <h2 class="titulo text-center mb-4">Ingresa a tu cuenta</h2>
        
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
            <?php endif; ?>

        <form action="<?= base_url('enviarlogin') ?>" class="was-validated" method="post">
            <div class="mb-3">
                <label for="uname" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Ingresa email de usuario" name="email" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback fs-4">Por favor, rellena este campo.</div>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Ingresa contraseña" name="pass" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback fs-4">Por favor, rellena este campo.</div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Continuar</button>
            </div>
            <div class="d-grid">
                <button type="button" class="btn btn-danger" onclick="window.location.href='<?= base_url('ruta/a/cancelar') ?>'">Cancelar</button>
            </div>
        </form>
        <div class="mt-3 text-center">
            <h5 class="mb-1">
                ¿No tienes cuenta? <a href="<?= base_url('agregarusuario'); ?>" class="text-decoration-none">Registrarse</a>
            </h5>
            <h5 class="mb-0">
                <a href="#" class="text-decoration-none text-muted">¿Olvidaste tu contraseña?</a>
            </h5>
        </div>
    </div>
</div>
