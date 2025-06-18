<?php

namespace app\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\usuarios_model;

class Auth implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      // dd($arguments);
      //si el usuario no esta logeado
      if (!session()->logged_in) {
         // entonces redireciona a la pagina de login page
         return redirect()->to('login')->with('msg', [
            'type' => 'warning',
            'body' => 'para acceder a este lugar debes registrarte o ingresar con tu cuenta'
         ]);
      }

      // Verifica el ID del usuario en la sesión
      $userId = session()->get('id_usuario');
      if (!$userId) {
         session()->destroy();
         return redirect()->to('login')->with('msg', [
            'type' => 'danger',
            'body' => 'El usuario actualmente no está disponible'
         ]);
      }
   }
   //----------------------------------------------------
   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // do function after (Re)
   }
}
