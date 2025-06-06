<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        $data['titulo']='principal';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php');
        echo view('front/inicio.php');
        echo view('front/footer_view.php');
    }
    public function contacto() {
            // Lógica para la página de contacto
            $data['titulo'] = 'Contacto';
            echo view('front/head_view.php', $data);
            echo view('front/nav_view.php');
            echo view('front/contactos'); 
            echo view('front/footer_view');
        }

    public function terminos_Usos() {
            // Lógica para la página de terminos y usos
            $data['titulo'] = 'Términos Y Usos';
            echo view('front/head_view.php', $data);
            echo view('front/nav_view.php');
            echo view('front/terminosYUsos');
            echo view('front/footer_view');
        }
    public function comercializacion() {
            // Lógica para la página de comercializacion
            $data['titulo'] = 'Comercialización';
            echo view('front/head_view.php', $data);
            echo view('front/nav_view.php');
            echo view('front/comercializacion');
            echo view('front/footer_view');
        }
    public function quienes_somos() {
            // Lógica para la página de quienes somos
            $data['titulo'] = 'Quienes somos';
            echo view('front/head_view.php', $data);
            echo view('front/nav_view.php');
            echo view('front/quienes_somos');
            echo view('front/footer_view');
        }
    public function categoria() {
            // Lógica para la página de categoria
            $data['titulo'] = 'Categoria-Ciencia Ficción';
            echo view('front/head_view.php', $data);
            echo view('front/nav_view.php');
            echo view('front/categoria_libro');
            echo view('front/footer_view');
    }


    public function login() {
         // Lógica para la página de mi cuenta
         $data['titulo'] = 'Mi Cuenta';
         echo view('front/head_view.php', $data);
         echo view('front/nav_view.php');
         echo view('front/login.php');
         echo view('front/footer_view');
    }
    public function libro() {
            // Lógica para la página de un libro
            $data['titulo'] = 'libro';
            echo view('front/head_view.php', $data);
            echo view('front/nav_view.php');
            echo view('front/libro');
            echo view('front/footer_view');
        }


}