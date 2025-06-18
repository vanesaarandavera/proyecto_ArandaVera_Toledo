<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productos_model;
use App\Models\categoria_model;
use App\Models\usuarios_model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;

class Ventas_controller extends Controller
{

    public function registrar_venta()
    {
        $session = session();
        require_once(APPPATH . 'Controllers/carrito_controller.php');
        $cartController = new Carrito_controller(); //instancia de carrito controller
        $carrito_contents = $cartController->devolver_carrito();

        $productoModel = new productos_model();
        $ventasModel = new Ventas_cabecera_model();
        // *** IMPORTANTE: Instanciando Ventas_detalle_recomendado ***
        $detalleModel = new Ventas_detalle_model();
        $productos_validos = [];
        $productos_sin_stock = [];
        $total_venta_cabecera = 0;

        // Validar stock y filtrar productos válidos
        foreach ($carrito_contents as $item) {
            $producto = $productoModel->getProducto($item['id']);

            if ($producto && $producto['stock'] >= $item['qty']) {
                $productos_validos[] = $item;
                $total_venta_cabecera += $item['subtotal'];
            } else {
                $productos_sin_stock[] = $item['name'];
                // Eliminar del carrito el producto sin stock
                $cartController->eliminar_item($item['rowid']);
            }
        }

        //Si hay productos sin stock, avisar y volver al carrito
        if (!empty($productos_sin_stock)) {
            $mensaje = 'Los siguientes productos no tienen stock suficiente y fueron eliminados del carrito: <br>'
                . implode(', ', $productos_sin_stock);
            $session->setFlashdata('mensaje', $mensaje);
            return redirect()->to(base_url('muestro'));
        }

        // Si no hay productos válidos, no se registra la venta
        if (empty($productos_validos)) {
            $session->setFlashdata('mensaje', 'No hay productos válidos para registrar la venta.');
            return redirect()->to(base_url('muestro'));
        }
        // Register sale header
        // Asegurarse de que el usuario_is de la session existe
        $usuario_id = $session->get('id_usuario');
        if (!$usuario_id) {
            $session->setFlashdata('mensaje', 'Error: No se pudo obtener el ID de usuario de la sesión.');
            return redirect()->to(base_url('muestro'));
        }
        // Registrar cabecera de la venta
        $nueva_venta = [
            'usuario_id' => $usuario_id,
            'total_venta' => $total_venta_cabecera,
            'fecha' => date('d-m-Y') 
        ];
        $venta_id = $ventasModel->insert($nueva_venta);
        // Si la inserción de la cabecera falla
        if (!$venta_id) {
            $session->setFlashdata('mensaje', 'Error al registrar la cabecera de la venta.');
            return redirect()->to(base_url('muestro'));
        }
        // Registrar detalle y actualizar stock
        foreach ($productos_validos as $item) {
            $detalle = [
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio' => $item['price']
            ];

            $producto_actual = $productoModel->getProducto($item['id']);
            if (!$producto_actual || $producto_actual['stock'] < $item['qty']) {
                $session->setFlashdata('mensaje', 'Stock insuficiente para el producto ' . $item['name'] . ' durante el registro de la venta.');

                return redirect()->to(base_url('muestro'));
            }

            if (!$detalleModel->insert($detalle)) {
                $session->setFlashdata('mensaje', 'Error al registrar el detalle de la venta para el producto: ' . $item['name']);

                return redirect()->to(base_url('muestro'));
            }

            // Actualiza el stock
            $new_stock = $producto_actual['stock'] - $item['qty'];
            if (!$productoModel->update($item['id'], ['stock' => $new_stock])) {
                $session->setFlashdata('mensaje', 'Error al actualizar el stock del producto: ' . $item['name']);

                return redirect()->to(base_url('muestro'));
            }

            $producto = $productoModel->getProducto($item['id']);
        }

        // Vaciar carrito y mostrar confirmación
        $cartController->borrar_carrito();
        $session->setFlashdata('mensaje', 'Venta registrada exitosamente.');
        return redirect()->to(base_url('vista_compras/' . $venta_id));
    }

    //función del usuario cliente para ver sus compras
    public function ver_factura($venta_id)
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        $detalle_ventas = new Ventas_detalle_model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);
        $dato['titulo'] = "Mi compra";

        echo view('front/head_view', $dato);
        echo view('front/nav_view', $data);
        echo view('back/compras/vista_compras', $data);
        echo view('front/footer_view');
    }
    //función del cliente para ver el detalle de su facturas de compras
    public function ver_facturas_usuario($id_usuario)
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        $ventas = new Ventas_cabecera_model();
        $data['ventas'] = $ventas->getVentas($id_usuario);
        $dato['titulo'] = "Todos mis compras";

        echo view('front/head_view', $dato);
        echo view('front/nav_view', $data);
        echo view('back/compras/ver_factura_usuario', $data);
        echo view('front/footer_view');
    }
    //admin
    public function ventas()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        $venta_id = $this->request->getGet('id');
        $detalle_ventas = new Ventas_detalle_model();
        $data['ventas_detalle'] = $detalle_ventas->getDetalles($venta_id);
        $ventascabecera = new Ventas_cabecera_model();
        $data['usuarios'] = $ventascabecera->getBuilderVentas_cabecera();
        $dato['titulo'] = "ventas";

        echo view('front/head_view', $dato);
        echo view('front/nav_view', $data);
        echo view('back/ventas/ventas', $data);
        echo view('front/footer_view');
    }
}
