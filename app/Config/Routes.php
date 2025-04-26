<?php

/**use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
namespace Config;
//Create a new instance of our RouteCollection class.
$routes = Services::routes();
//Load the system's routing file firts, so that the app and ENVIRONMENT
//can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')){
require SYSTEMPATH . 'Config/Routes.php';
}
/**
 * ---------------------------------------------------------------
 * Router Setup
 * ----------------------------------------
 * 
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->set404Override();
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(true);

/**
 * --------------------------------------------
 * route Definitions
 * ---------------------------------------------
 */

 //We get perfomance increase by specifying the default
 //route since we don't have to scan directories.
$routes->get('/' , 'Home::index');
$routes->get('inicio' , 'Home::index');
$routes->get('contactos', 'Home::contacto');
$routes->get('terminosYUsos', 'Home::terminos_Usos');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('categoria', 'Home::categoria');