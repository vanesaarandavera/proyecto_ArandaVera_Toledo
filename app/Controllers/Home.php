<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        $data['titulo']='principal';
        echo view('front/head_view.php', $data);
        echo view('front/nav_view.php');
        echo view('front/plantilla.php');
        echo view('front/footer_view.php');
    }
    public function contacto() {
            // Lógica para la página de contacto
            $data['titulo'] = 'Contacto';
            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('front/contactos'); 
            echo view('front/footer_view');
        }

    public function terminos_Usos() {
            // Lógica para la página de contacto
            $data['titulo'] = 'Terminos Y Usos';
            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('front/terminosYUsos');
            echo view('front/footer_view');
        }

}
