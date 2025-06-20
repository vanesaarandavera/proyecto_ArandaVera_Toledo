<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
$usuario = $session->get('id_usuario');
?>

<!--carrousel de promociones-->
<div id="carouselExampleSlidesOnly" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-inner carousel-promo">
    <div class="carousel-item active text-center">
      <h5>3 y 6 cuotas sin interes</h5>
    </div>
    <div class="carousel-item  text-center">
      <h5>Envio gratis en la compra de mas de $10000</h5>
    </div>
  </div>
</div>

<!--menu de navegacion prueba-->
<?php if ($perfil == 2): ?>

  <nav nav class="navbar navbar-expand-lg bg-body-tertiary navbar-nav">
    <!--logo-->
    <div class="navbar-flex centrado">
      <!--opciones en el menu-->
      <div class="navbar-menu">
        <hr>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="<?php echo base_url('inicio'); ?>">Inicio</a>
              </li>
              <div class="collapse  nav-lista-cerrarSesion">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                      CLIENTE: <?php echo session('nombre'); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li class="menu-lista-perfil"  ><a class="dropdown-item" href="<?php echo base_url('ver_factura_usuario/' . $usuario); ?>">Pedidos</a></li>
                      <li class="menu-lista-perfil"  ><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Cerrar sesión</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('quienes_somos'); ?>">Quienes Somos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorias
                </a>
                <ul class="dropdown-menu">
                  <?php if (!empty($categorias) && is_array($categorias)): ?>
                    <?php foreach ($categorias as $categoria): ?>
                      <li class="dropdown-item menu-categoria-item" value="<?= htmlspecialchars($categoria['id_categorias']) ?>">
                        <a href="<?php echo base_url('productos_categoria/' . $categoria['id_categorias']); ?>"><?= htmlspecialchars($categoria['descripcion']) ?></a>
                      </li>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option value="" disabled>No hay categorías disponibles</option>
                  <?php endif; ?>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="menu-categoria-item "><a class="dropdown-item " href="<?php echo base_url('/todos_p'); ?>">Ver todos</a></li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('contactos'); ?>">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('comercializacion'); ?>">Comercializacion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('terminosYUsos'); ?>">Términos y usos</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="navbar-logo">
        <a href="<?php echo base_url('inicio'); ?>">
          <img class="navbar-logo-img" src="<?= base_url('assets/img/logo.png') ?>" alt="logo-voces-de-papel" width="100" height="100">
        </a>
      </div>

      <div class="navbar-cuenta-carrito">
        <div class="collapse navbar-collapse nav-cerrarSesion">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                CLIENTE: <?php echo session('nombre'); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li class="menu-lista-perfil" ><a class="dropdown-item" href="<?php echo base_url('ver_factura_usuario/' . $usuario); ?>">Pedidos</a></li>
                <li class="menu-lista-perfil" ><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <a class="nav-link navbar-carrito" href="<?php echo base_url('muestro'); ?>">Carrito</a>
      </div>
      <div class="navbar-busqueda">
        <form class="d-flex " method="GET" action="<?php echo base_url('buscar'); ?>" role="search">
          <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Buscar" require>
          <button class="btn btn-buscar btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- ADMIN-->
<?php elseif ($perfil == 1): ?>

  <nav nav class="navbar navbar-expand-lg bg-body-tertiary navbar-nav">
    <!--logo-->
    <div class="navbar-flex centrado">
      <!--opciones en el menu-->
      <div class="navbar-menu">
        <hr>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav flex-grow-1 pe-3">
              <li class="nav-item dropdown nav-lista-cerrarSesion ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ADMIN: <?php echo session('nombre'); ?>
                </a>

                <ul class="dropdown-menu">
                  <li class="menu-usuario" ><a class="dropdown-item " href="<?php echo base_url('logout'); ?>">Cerrar sesión</a></li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('listaUsuarios'); ?>">CRUD Usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('listaProductos'); ?>">CRUD Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/ventas'); ?>">Muestra Ventas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('listar_consultas'); ?>">Consultas</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="conteiner-fluit">
        <a href="<?php echo base_url('listadoProductos'); ?>">
      </div>

      <div class="navbar-logo">
        <a href="<?php echo base_url('inicio'); ?>">
          <img class="navbar-logo-img" src="<?= base_url('assets/img/logo.png') ?>" alt="logo-voces-de-papel" width="100" height="100">
        </a>
      </div>
      <div class="collapse navbar-collapse nav-cerrarSesion">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
              ADMIN: <?php echo session('nombre'); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="menu-lista-perfil" ><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="navbar-busqueda">
        <form class="d-flex " method="GET" action="<?php echo base_url('buscar'); ?>" role="search">
          <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Buscar" require>
          <button class="btn btn-buscar btn-outline-success" type="submit">Buscar</button>
        </form>

      </div>
    </div>
  </nav>

<?php else: ?>
  <nav nav class="navbar navbar-expand-lg bg-body-tertiary navbar-nav">
    <!--logo-->
    <div class="navbar-flex centrado">
      <!--opciones en el menu-->
      <div class="navbar-menu">
        <hr>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="<?php echo base_url('inicio'); ?>">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-item-mi-cuenta" aria-current="page" href="<?php echo base_url('login'); ?>">Mi cuenta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('quienes_somos'); ?>">Quienes Somos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorias
                </a>
                <ul class="dropdown-menu">
                  <?php if (!empty($categorias) && is_array($categorias)): ?>
                    <?php foreach ($categorias as $categoria): ?>
                      <li class="dropdown-item menu-categoria-item" value="<?= htmlspecialchars($categoria['id_categorias']) ?>">
                        <a href="<?php echo base_url('productos_categoria/' . $categoria['id_categorias']); ?>"><?= htmlspecialchars($categoria['descripcion']) ?></a>
                      </li>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option value="" disabled>No hay categorías disponibles</option>
                  <?php endif; ?>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="menu-categoria-item"  ><a class="dropdown-item " href="<?php echo base_url('/todos_p'); ?>">Ver todos</a></li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('contactos'); ?>">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('comercializacion'); ?>">Comercializacion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('terminosYUsos'); ?>">Términos y usos</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="navbar-logo">
        <a href="<?php echo base_url('inicio'); ?>">

          <img class="navbar-logo-img" src="<?= base_url('assets/img/logo.png') ?>" alt="logo-voces-de-papel" width="100" height="100">
        </a>
      </div>
      <div class="navbar-cuenta-carrito">
        <a class="nav-link  navbar-cuenta-principal" href="<?php echo base_url('login'); ?>">Mi cuenta</a>
      </div>
      <div class="navbar-busqueda">
        <form class="d-flex " method="GET" action="<?php echo base_url('buscar'); ?>" role="search">
          <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Buscar" require>
          <button class="btn btn-buscar btn-outline-success" type="submit">Buscar</button>
        </form>

      </div>
    </div>
  </nav>
<?php endif; ?>