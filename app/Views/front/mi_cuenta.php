<body>
    <div class="container mt-5 d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6 col-lg-4 p-4 rounded shadow bg-light">
            <h2 class="text-center mb-4">Ingresa a tu cuenta</h2>
            <form action="/action_page.php" class="was-validated">
                <div class="mb-3">
                    <label for="uname" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Ingresa nombre de usuario" name="uname" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor rellena este campo.</div>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Ingresa contraseña" name="pswd" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor rellena este campo.</div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <h5 class="mb-1">
                    ¿No tienes cuenta? <a href="#" class="text-decoration-none">Crear usuario nuevo</a>
                </h5>
                <h5 class="mb-0">
                    <a href="#" class="text-decoration-none text-muted">¿Olvidaste tu contraseña?</a>
                </h5>
            </div>
        </div>
    </div>