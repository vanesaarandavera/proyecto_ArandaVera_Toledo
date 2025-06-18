<?php

namespace App\Models;

use CodeIgniter\Model;

class categoria_model extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categorias';
    protected $allowedFields = ['descripcion', 'activo'];
    protected $returnType = 'array';
    // Método para obtener todas las categorías activas
    public function getCategorias()
    {
        $categorias = $this->orderBy('descripcion', 'ASC')->findAll();
        return $categorias;
    }
}