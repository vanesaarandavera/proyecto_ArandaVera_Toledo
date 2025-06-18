<?php

namespace App\Controllers;

use App\Models\productos_Model;
use App\Models\categoria_model;

class Home extends BaseController
{
    private $user;
    private $usuario;
    private $session;
    public function index()
    {



        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        $cart = \Config\Services::cart();
        $cart = $cart->contents();
        $data['cart'] = $cart;
        $productoModel = new productos_Model(); //para ver el catalogo al inicio
        // Definir cantidad de productos por página
        $productosPorPagina = 10;
        // Obtener criterio de ordenación desde el formulario
        $orden = $this->request->getGet('orden') ?? 'ASC'; // Por defecto, orden descendente

        // Filtrar y ordenar productos activos según el precio
        $data['producto'] = $productoModel->where('eliminado', '0')
            ->orderBy('precio_vta', $orden) // Orden dinámico
            ->paginate($productosPorPagina);

        $data['pager'] = $productoModel->pager;
        $data['orden'] = $orden;

        $data['categoria_id'] = 0;


        // Pasar los enlaces de paginación
        $data['pager'] = $productoModel->pager;

        $dato['titulo'] = 'principal';
        echo view('front/head_view.php', $dato);
        echo view('front/nav_view.php', $data);
        echo view('front/inicio.php');
        echo view('back/carrito/catalogo_view', $data);
        echo view('front/footer_view.php');
    }
    public function contacto()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        // Lógica para la página de contacto
        $data['titulo'] = 'Contacto';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php', $data);
        echo view('front/contactos');
        echo view('front/footer_view');
    }

    public function terminos_Usos()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        // Lógica para la página de terminos y usos
        $data['titulo'] = 'Términos Y Usos';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php');
        echo view('front/terminosYUsos');
        echo view('front/footer_view');
    }
    public function comercializacion()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        // Lógica para la página de comercializacion
        $data['titulo'] = 'Comercialización';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php', $data);
        echo view('front/comercializacion');
        echo view('front/footer_view');
    }
    public function quienes_somos()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        // Lógica para la página de quienes somos
        $data['titulo'] = 'Quienes somos';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php', $data);
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }


    public function carrito()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        //lógica del carrito de campras
        $data['titulo'] = 'carrito de compras';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php', $data);
        echo view('front/carrito_view.php');
        echo view('front/footer_view');
    }


    public function login()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        // Lógica para la página de mi cuenta
        $data['titulo'] = 'Mi Cuenta';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php');
        echo view('front/login.php');
        echo view('front/footer_view');
    }

    public function agregar_usuario()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        $data['titulo'] = 'Crear ususario';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php', $data);
        echo view('back/usuario/agregarusuario_view.php');
        echo view('front/footer_view');
    }

    public function libro()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        // Lógica para la página de un libro
        $data['titulo'] = 'libro';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php', $data);
        echo view('front/libro');
        echo view('front/footer_view');
    }

    public function tablas()
    {
        $data['titulo'] = 'PANEL ADM';
        echo view('front/head', $data);
        //echo view('front/navbar_adm');
        echo view('front/tables');
        //echo view('front/footer');
    }
}
