<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

classs Auth implements implements FilterInterface{
    public funtion before(RequestInterface $request, $arguments = null)
 {
    //si el usuario no esta logeado
    if (!session()->get('logged_in')){
 // entonces redireciona a la pagina de login page
        return redirect()->('/login');
    }
 }  
 //----------------------------------------------------
 oublic fution after(RequestInterface $request, ResponseInterface $response, $arguments =null){
    // do function after (Re)
 } 
}
