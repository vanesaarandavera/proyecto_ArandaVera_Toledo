<?php

namespace App\Models;

use CodeIgniter\Model;

class productos_model extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = [
        'nombre_prod',
        'autor',
        'descripcion',
        'imagen',
        'categoria_id',
        'precio',
        'precio_vta',
        'stock',
        'stock_min',
        'eliminado'
    ];
    protected $returnType = 'array';

    // Método para obtener productos con sus categorías
    public function getBuilderProductos()
    {
        $bd = \Config\Database::connect(); // Contacta la base de datos
        $builder = $bd->table('producto'); // $builder es una instancia de la QueryBuilder de CodeIgniter
        $builder->select('producto.*, categorias.descripcion as categoria_descripcion');
        $builder->join('categorias', 'categorias.id_categorias = producto.categoria_id');
        return $builder;
    }

    public function getProducto($id = null)
    {
        $builder = $this->getBuilderProductos(); // Trae los productos por id
        $builder->where('producto.id_producto', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null)
    {
        $builder = $this->getBuilderProductos();
        $builder->where('producto.id_producto', $id);
        $builder->set('producto.stock', $stock_actual); // Se cambia el valor para la columna del stock por el nuevo valor de stock
        $builder->update();
    }
}