<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
 {
    //si el usuario no esta logeado
    if (!session()->get('logged_in')){
 // entonces redireciona a la pagina de login page
        return redirect()->to('/login');
    }
 }  
 //----------------------------------------------------
 public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
    // do function after (Re)
 } 
}
