<body>

<div class="container">
    <div class="containerContacto mb-5"> <h1 class="titulo text-center mb-4">Datos de Contacto</h1> <h3 class="contactos-dato"><strong>Nombre de la Empresa: </strong> Voces de Papel</h3>
        <h3 class="contactos-dato"><strong>Dirección:</strong> Calle 9 de Julio 1272, Corrientes, Argentina</h3>
        <h3 class="contactos-dato"><strong>Teléfono:</strong> +54 379 4989898</h3>
        <h3 class="contactos-dato"><strong>Email:</strong> info@vocesdepapel.com</h3>
    </div>
    <div class="formularioContacto">
        <h1 class="titulo text-center mb-4">Comunicate con nosotros</h1> <div class="mb-3">
            <form action="<?= base_url('guardar_consulta') ?>" method="post" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3"> <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required autocomplete="given-name" placeholder="Tu nombre" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" required autocomplete="family-name" placeholder="Tu apellido" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" required autocomplete="email" placeholder="tu@correo.com" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" autocomplete="tel" placeholder="(opcional)" />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" rows="5" required placeholder="Escribe tu consulta aquí..."></textarea>
                </div>

                <div class="d-grid gap-2"> <button type="submit" class="btn btn-success btn-lg" aria-label="Enviar consulta">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>