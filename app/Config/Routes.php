<?php

//use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

namespace Config;
//Create a new instance of our RouteCollection class.
$routes = Services::routes();
//Load the system's routing file firts, so that the app and ENVIRONMENT
//can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::index');
$routes->get('contactos', 'Home::contacto');
$routes->get('terminosYUsos', 'Home::terminos_Usos');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('categoria', 'Home::categoria');
$routes->get('libro', 'Home::libro');
$routes->get('carrito_view', 'Home::carrito');

//registro e usuario
$routes->get('agregarusuario', 'Home::agregar_usuario');
$routes->post('enviar-form', 'Usuario_controller::formValidation');

// Admin routes
$routes->get('listaUsuarios', 'Usuario_controller::index', ['filter' => 'Auth']);
$routes->get('usuariosInactivos', 'Usuario_controller::inactivos', ['filter' => 'Auth']);
$routes->get('admin/usuarios/editar/(:num)', 'Usuario_controller::editar_usuario/$1', ['filter' => 'Auth']);
$routes->post('admin/usuarios/modificar/(:num)', 'Usuario_controller::modificar_usuario/$1', ['filter' => 'Auth']);
$routes->get('admin/usuarios/baja/(:num)', 'Usuario_controller::bajaUsuario/$1', ['filter' => 'Auth']);
$routes->get('admin/usuarios/alta/(:num)', 'Usuario_controller::altaUsuario/$1', ['filter' => 'Auth']);
// User ruta de autoedición
$routes->get('editarPerfil/(:num)', 'Usuario_controller::editar_usuario/$1', ['filter' => 'Auth']);
$routes->post('modificarPerfil/(:num)', 'Usuario_controller::modificar_usuario/$1', ['filter' => 'Auth']);

//rutas para login
$routes->get('login', 'Home::login');
$routes->post('enviarlogin', 'Login_controller::Auth');
$routes->get('logout', 'Login_controller::logout');
$routes->get('registrarse', 'Home::agregar_usuario');
$routes->post('validacion', 'Usuario_controller::create');

//para productos
$routes->get('crear', 'Productos_controller::creaproducto' ,['filter'=>'Auth']);
$routes->get('listaProductos', 'Productos_controller::index' ,['filter'=>'Auth']);
$routes->get('/libro/(:num)', 'Productos_controller::verLibro/$1');
$routes->get('produ-form', 'Productos_controller::creaproducto',['filter'=>'Auth']);
$routes->post('enviar-prod', 'Productos_controller::store' ,['filter'=>'Auth']);
$routes->get('editar/(:num)','Productos_controller::editar/$1',['filter'=>'Auth']);
$routes->post('modificar/(:num)', 'Productos_controller::modificar/$1',['filter'=>'Auth']);
$routes->get('borrar/(:num)', 'Productos_controller::deleteproducto/$1',['filter'=>'Auth']);
$routes->get('eliminados', 'Productos_controller::eliminados',['filter'=>'Auth']);
$routes->get('activar_pro/(:num)', 'Productos_controller::activarproducto/$1',['filter'=>'Auth']);
//muestra los productos segun el id de la categoria
$routes->get('productos_categoria/(:num)', 'Productos_controller::catalogoPorCategoria/$1');

//Rutas para el carrito
//muestra todos los productos del catalogo
$routes->get('/todos_p', 'Carrito_controller::catalogo');
//carga la vista carrito_parte_view
$routes->get('/muestro', 'Carrito_controller::muestra',['filter' => 'Auth']);
//actualiza los datos del carrito
$routes->get('/carrito_actualiza', 'Carrito_controller::actualiza_carrito',['filter' => 'Auth']);
//agregar los items seleccionados
$routes->post('/carrito/add', 'Carrito_controller::add',['filter' => 'Auth']);
//elimina un item del carrito
$routes->get('/carrito_elimina/(:any)', 'Carrito_controller::remove/$1',['filter' => 'Auth']);
//eliminar todo el carrito
$routes->get('/borrar', 'Carrito_controller::borrar_carrito', ['filter' => 'Auth']);
//Registrar la venta en las tablas
$routes->get('/carrito-comprar', 'Ventas_controller::registrar_venta',['filter' => 'Auth']);
//botones de sumar y restar en la vista del carrito
$routes->get('/carrito_suma/(:any)', 'Carrito_controller::suma/$1', ['filter' => 'Auth']);
$routes->get('/carrito_resta/(:any)', 'Carrito_controller::resta/$1', ['filter' => 'Auth']);

//rutas del cliente para ver sus compras y el detalle
$routes->get('vista_compras/(:num)', 'Ventas_controller::ver_factura/$1', ['filter' => 'Auth']);
$routes->get('ver_factura_usuario/(:num)', 'Ventas_controller::ver_facturas_usuario/$1', ['filter' => 'Auth']);

//las ventas que ve el admin
$routes->get('/ventas', 'Ventas_controller::ventas', ['filter' => 'Auth']);

//gestión de consultas
$routes->post('guardar_consulta', 'Consultas_controller::guardar_consulta');
$routes->get('listar_consultas', 'Consultas_controller::listar_consultas', ['filter' => 'Auth']);
$routes->get('atender_consulta/(:segment)', 'Consultas_controller::atender_consulta/$1', ['filter' => 'Auth']);
$routes->get('eliminar_consulta/(:segment)', 'Consultas_controller::eliminar_consulta/$1', ['filter' => 'Auth']);
$routes->get('buscar', 'Productos_controller::buscar');
