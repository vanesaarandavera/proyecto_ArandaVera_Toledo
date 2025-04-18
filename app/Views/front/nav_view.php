<div id="carouselExampleCaptions" class="carousel slide">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <div class="carousel-item active text-center">
        <h5>3 y 6 cuotas sin interes</h5>

      </div>
      <div class="carousel-item  text-center">
        <h5>Envio gratis en la compra de mas de $10000</h5>
      </div>
    </div>
  </div>
</div>

<!--menu de navegacion prueba-->
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-nav">
  <!--logo-->
  <div class="navbar-flex centrado" >
    <!--opciones en el menu-->
    <div class="navbar-menu" >
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
            <a class="nav-link " aria-current="page" href="<?php echo base_url('inicio');?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('quienes_somos');?>">Quienes Somos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item " href="#">Ciencia Ficcion</a></li>
              <li><a class="dropdown-item " href="#">Clásicos</a></li>
              <li><a class="dropdown-item " href="#">Romance</a></li>
              <li><a class="dropdown-item " href="#">Thriller y suspenso</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item " href="#">Los mas vendidos</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('contactos');?>">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('comercializacion');?>">Comercializacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('terminosYUsos');?>">Términos y usos</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
    
    <div class="navbar-logo">
      <a  href="<?php echo base_url('inicio');?>">
      <img class="navbar-logo" src="assets/img/logo.png" alt="logo-voces-de-papel" width="100" height="100">
      </a>
    </div>
    
    <div class="navbar-cuenta-carrito" >
      
          <a class="nav-link  navbar-cuenta-principal"  href="#">Mi cuenta</a>
       
          <a class="nav-link navbar-carrito" href="#">Carrito</a>
        
    </div>
    <div class="navbar-busqueda" >
      <form class="d-flex " role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  

 

  </div>
  
  
</nav>




  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url('inicio'); ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('contactos'); ?>"> Contactos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('terminosYUsos'); ?>"> Terminos y Usos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categoria
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Ciencia Ficción</a></li>
              <li><a class="dropdown-item" href="#">Clásicos</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Romance</a></li>
              <li><a class="dropdown-item" href="#">Thriller y suspenso</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('comercializacion'); ?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('quienes_somos'); ?>">Quienes somos</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>