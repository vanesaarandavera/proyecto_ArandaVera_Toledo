<body>
  <!--Carrusel principal-->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets\img\imgCarr1.png" class="d-block w-100" alt="imagen-promocion1">
      </div>
      <div class="carousel-item">
        <img src="assets\img\imgCarr2.png" class="d-block w-100" alt="imagen-promocion2">
      </div>
      <div class="carousel-item">
        <img src="assets\img\imgCarr3.png" class="d-block w-100" alt="imagen-promocion3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
  <div class="centrado">
    <h3 class="titulo">Todos los libros</h3>
  </div>
  <div class="centrado inicio-ordenar">
    <form action="<?= site_url('inicio') ?>" method="get" class="d-flex inicio-ordenar-form">
      <select name="orden" class="t form-select inicio-ordenar-select" aria-label="Large  select example">
        <option selected>Ordenar</option>
        <option value="asc" <?= ($orden == 'asc') ? 'selected' : '' ?>>Precio: Menor a Mayor</option>
        <option value="desc" <?= ($orden == 'desc') ? 'selected' : '' ?>>Precio: Mayor a Menor</option>
      </select>
      <button type="submit" class="btn  btn-buscar">Ordenar</button>
    </form>
  </div>