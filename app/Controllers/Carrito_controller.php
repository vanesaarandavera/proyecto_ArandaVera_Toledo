<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\usuarios_model;
use App\Models\productos_Model;
use App\Models\categoria_model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Carrito_controller extends  BaseController{
    public function construct(){
        helper(['form', 'url', 'cart']);
        $cart = \Config\Services::cart();
        $session = session();
    }
    //Añade producto al carrito
    public function add(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $cart -> insert (array(
            'id' => $request -> getPost('id'),
            'qty' => 1,
            'name' => $request->getPost('nombre_prod'),
            'price' =>$request->getPost('precio_vta'),
            'imagen'=>$request->getPost('imagen'),
        ));
        return redirect()->back()->withInput();
    }
 

    public function eliminar_item($rowid){
    $cart = \Config\Services::Cart();
    $cart->remove($rowid);
    return redirect()->to(base_url('muestro'));
}

public function borrar_carrito(){
    $cart = \Config\Services::Cart();
    $cart->destroy();
    return redirect()->to(base_url('muestro'));
}

    //Actualiza e carrito que se muestra
    public function actualiza_carrito(){
        $cart =\Config\Services::cart();
        $request = \Config\Services::request();
        $cart->update(array(
            'id' => $request -> getPost('id_producto'),
            'qty' => 1,
            'name' => $request->getPost('nombre_prod'),
            'price' =>$request->getPost('precio_vta'),
            'imagen'=>$request->getPost('imagen'),
        ));
        return redirect()->back()->withInput();
    }

    public function remove($rowid){
    $cart = \Config\Services::cart();
    if ($rowid === "all") {
        $cart->destroy(); //vacia el carrito
    } else {
        $cart->remove($rowid);
    }
    return redirect()->back()->withInput();
}

public function devolver_carrito(){
    $cart = \Config\Services::cart();
    return $cart->contents();
}

public function suma($rowid){
    // suma 1 a la cantidad del producto
    $cart = \Config\Services::cart();
    $item = $cart->getItem($rowid);
    if ($item) {
        $cart->update([
            'rowid' => $rowid,
            'qty' => $item['qty'] + 1
        ]);
    }
    return redirect()->to('muestro');
}

public function resta($rowid){
    // resta 1 a la cantidad al producto
    $cart = \Config\Services::cart();
    $item = $cart->getItem($rowid);
    if ($item) {
        if ($item['qty'] > 1) {
            $cart->update([
                'rowid' => $rowid,
                'qty' => $item['qty'] - 1,
            ]);
        } else {
            $cart->remove($rowid);
        }
    }
    return redirect()->to('muestro');
}

    public function catalogo()
{
    $categorias = new categoria_model();
    $data['categorias'] = $categorias->findAll();
    $productoModel = new productos_Model();

    // Definir cantidad de productos por página
    $productosPorPagina = 10;

    // Obtener criterio de ordenación desde el formulario
    $orden = $this->request->getGet('orden') ?? 'ASC'; // Por defecto, orden descendente

    // Filtrar y ordenar productos activos según el precio
    $data['producto'] = $productoModel->where('eliminado', '0')
                                       ->orderBy('precio_vta', $orden) // Orden dinámico
                                       ->paginate($productosPorPagina);

    $data['pager'] = $productoModel->pager;
    $data['orden'] = $orden; // Guardamos la selección para reflejarla en la vista
    

    $dato = ['titulo' => 'Todos Los Productos'];
    echo view('front/head_view', $dato);
    echo view('front/nav_view', $data);
    echo view('back/carrito/catalogo_view', $data);
    echo view('front/footer_view');
}

   public function muestra() //carrito que se muestra
{
    $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
    $data['categorias'] = $categorias->findAll();
    $cart = \Config\Services::cart();
    $cart = $cart->contents();
    $data['cart'] = $cart;

    $dato['titulo'] = 'Confirmar compra';
    echo view('front/head_view', $dato);
    echo view('front/nav_view',$data);
    echo view('back/carrito/carrito_view', $data);
    echo view('front/footer_view');
}

}