<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuarios_model;

class Login_controller extends BaseController{ 
       public function index()
    {
        helper(['form', 'url']);
        return view('front/head_view', ['titulo' => 'Iniciar Sesión'])
            . view('front/nav_view')
            . view('back/usuario/login_view')
            . view('front/footer_view');
    }
    public function auth()
    {
        $session = session(); //iniciamos el objeto session()
        $model = new \App\Models\usuarios_model(); //instanciamos el modelo
        //trae los datos del formulario
        //$email = $this->request->getVar('email');
        //$password = $this->request->getVar('pass');
        $email = $this->request->getPost('email');
        $password_ingresada = $this->request->getPost('pass');

        $data = $model->where('email', $email)->first(); //consulta a la tabla
        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            $verify_pass = password_verify($password_ingresada , $pass); //verifica la contraseña
            //Verificar si el usuario está dado de baja
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'usuario dado de baja');
                return redirect()->to('/');
            }
            //password_verify determina los requisitos de configuracion de la contrasena
            #mostrando la
            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE
                ];
                //se cumple la verificacion e inicia la sesión
                $session->set($ses_data);
                $session->setFlashdata('success', 'Bienvenido!!');
                return redirect()->to('inicio'); //pagina principal

            } else {
                //no pasa la validacion de la password
                echo "<script>alert('" . $verify_pass . "');</script>";
                $session->setFlashdata('msg', 'Password Incorrecta');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'No ingreso un email o el mismo es incorrecto');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); //cierra la sesion
        return redirect()->to('/');
    }
}
