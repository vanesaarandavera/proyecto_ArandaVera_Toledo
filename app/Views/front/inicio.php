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
        <img src="assets\img\imgCarr1.webp" class="d-block w-100" alt="imagen-promocion1">
      </div>
      <div class="carousel-item">
        <img src="assets\img\imgCarr2.webp" class="d-block w-100" alt="imagen-promocion2">
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
  <!--Seccion que muetra los libros mas vendidos-->
  <div class=" inicio-seccion-libros centrado">
    <h3 class="titulo" >Los libros más vendidos</h3>
    <!--tarjeta para un libro-->
    <div class="inicio-libros-tarjetas inicio-flex">
      <div class="card  inicio-libros-tarjetas-item" >
        <a href="<?php echo base_url('libro');?>">
        <img src="assets\img\portada-libro-de-los-cuentos-perdidos-j-r-r-tolkien.jpg" class="card-img-top" alt="imagen-portada-libro-de-los-cuentos-perdidos">
        </a>
        <div class=" card-body inicio-libros-item-body">
          <h5 class=" inicio-libros-tarjetas-titulo">Hª Tierra Media Nº 01/12 El libro de los cuentos perdidos 1</h5>
          <p class="card-text inicio-libros-tarjetas-autor">J. R. R. Tolkien</p>
          <p class="card-text inicio-libros-tarjetas-precio">Precio $31700.00</p>
          <a href="#" class="btn btn-comprar btn-primary">Comprar</a>
        </div>
      </div>     
      <div class="card inicio-libros-tarjetas-item" >
        <img src="assets\img\portada_ese-algo-especial_sandra-miro.jpg" class="card-img-top" alt="imagen-portada-libro-ese-algo-especial">
        <div class="card-body inicio-libros-tarjetas-body">
          <h5 class="inicio-libros-tarjetas-titulo">Ese algo especial</h5>
          <p class="card-text inicio-libros-tarjetas-autor">Sandra Miro</p>
          <p class="card-text inicio-libros-tarjetas-precio">Precio $25000.00</p>
          <a href="#" class="btn btn-primary btn-comprar">Comprar</a>
        </div>
      </div>
      <div class="card inicio-libros-tarjetas-item">
        <img src="assets\img\portada_la-lengua-de-los-elfos_luis-gonzalez-b.jpg" class="card-img-top" alt="imagen-portada-la-lengua-de-los-elfos">
        <div class="card-body inicio-libros-tarjetas-body">
          <h5 class="card-title inicio-libros-tarjetas-titulo">La lengua de los elfos</h5>
          <p class="card-text inicio-libros-tarjetas-autor">Luis Gonzalez</p>
          <p class="card-text inicio-libros-tarjetas-precio">Precio $35000.00</p>
          <a href="#" class="btn btn-primary btn-comprar">Comprar</a>
        </div>
      </div>
      <div class="card inicio-libros-tarjetas-item" >
        <img src="assets\img\portada_shanghai-inmortal_ay-chao_.jpg" class="card-img-top" alt="imagen-portada-shanghai-inmortal">
        <div class="card-body inicio-libros-tarjetas-body">
          <h5 class="card-title inicio-libros-tarjetas-titulo">Shanghai inmortal</h5>
          <p class="card-text inicio-libros-tarjetas-autor">Ay Chao</p>
          <p class="card-text inicio-libros-tarjetas-precio">Precio $40000.00</p>
          <a href="#" class="btn  btn-comprar btn-primary">Comprar</a>
        </div>
      </div>
      
    </div>
  </div>