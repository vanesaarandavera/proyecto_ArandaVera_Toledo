<?php

namespace App\Models;

use CodeIgniter\Model;

class Ventas_detalle_model extends Model
{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id_ventas_detalle';
    protected $allowedFields = ['venta_id', 'producto_id', 'cantidad', 'precio'];


    public function getDetalles($venta_id = null)
    {
        $db      = \Config\Database::connect();
        $builder = $this->db->table($this->table); // Comienza a construir la consulta desde ventas_detalle

        // Join con 'producto'  para obtener el nombre del producto y su imagen 
        $builder->select('ventas_detalle.*, producto.nombre_prod, producto.imagen');
        $builder->join('producto', 'producto.id_producto = ventas_detalle.producto_id');

        // Join con 'ventas_cabecera' la fecha de la venta_cabecera y usuario_id
        $builder->select('ventas_cabecera.fecha, ventas_cabecera.usuario_id');
        $builder->join('ventas_cabecera', 'ventas_cabecera.id_ventas_cabecera = ventas_detalle.venta_id');

        // Join con 'usuarios' para obtener nombre, apellido del usuario
        $builder->select('usuarios.nombre as nombre_usuario, usuarios.apellido as apellido_usuario');
        $builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id');


        if ($venta_id != null) {
            $builder->where('ventas_detalle.venta_id', $venta_id);
            return $builder->get()->getResultArray();
        } else {

            // Si no se pasa $id_venta, se recuperarán todos los detalles de venta
            return $builder->get()->getResultArray();
        }
    }
}
