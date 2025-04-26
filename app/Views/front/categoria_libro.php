<div class="seccion-categoria centrado">
    <h3 class="titulo">Categoria</h3>
    <!--boton ordenar-->
    <select class="form-select categoria-ordenar" aria-label="Large  select example">
        <option selected>Ordenar</option>
        <option value="1">Precio: menor a mayor</option>
        <option value="2">Precio: mayor a menor</option>
        <option value="3">Más nuevo al más viejo</option>
        <option value="3">Más viejo al más nuevo</option>
        <option value="3">Más vendidos</option>
    </select>
    <!--Seccion que muestra las tarjetas de la categoria-->
    <div class="inicio-libros-tarjetas inicio-flex">
        <div class="card  inicio-libros-tarjetas-item">
            <img src="assets\img\portada-libro-de-los-cuentos-perdidos-j-r-r-tolkien.jpg" class="card-img-top" alt="imagen-portada-libro-de-los-cuentos-perdidos">
            <div class=" card-body inicio-libros-item-body">
                <h5 class=" inicio-libros-tarjetas-titulo">Hª Tierra Media Nº 01/12 El libro de los cuentos perdidos 1</h5>
                <p class="card-text inicio-libros-tarjetas-autor">J. R. R. Tolkien</p>
                <p class="card-text inicio-libros-tarjetas-precio">Precio $31700.00</p>
                <a href="#" class="btn btn-comprar btn-primary">Comprar</a>
            </div>
        </div>
        <div class="card inicio-libros-tarjetas-item">
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
                <a href="#" class="btn  btn-comprar btn-primary">Comprar</a>
            </div>
        </div>
        <div class="card inicio-libros-tarjetas-item">
            <img src="assets\img\portada_shanghai-inmortal_ay-chao_.jpg" class="card-img-top" alt="imagen-portada-shanghai-inmortal">
            <div class="card-body inicio-libros-tarjetas-body">
                <h5 class="card-title inicio-libros-tarjetas-titulo">Shanghai inmortal</h5>
                <p class="card-text inicio-libros-tarjetas-autor">Ay Chao</p>
                <p class="card-text inicio-libros-tarjetas-precio">Precio $40000.00</p>
                <a href="#" class="btn  btn-comprar btn-primary">Comprar</a>
            </div>
        </div>

    </div>
    <!--Seccion de navegacion entre paginas-->
    <nav aria-label="...">
        <ul class="pagination justify-content-center categoria-paginacion-items">
            <li class="page-item disabled">
                <a class="page-link">Anterior</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item " aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
            </li>
        </ul>
    </nav>
</div>