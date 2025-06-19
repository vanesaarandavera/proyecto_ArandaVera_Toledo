<?php namespace App\Models;

use CodeIgniter\Model;

class Ventas_cabecera_model extends Model
{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id_ventas_cabecera';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta'];

    public function getBuilderVentas_cabecera()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('ventas_cabecera');
        // Seleccionamos todas las columnas de ventas_cabecera, y nombre y apellido del usuario
        $builder->select('*');
        // Usamos LEFT JOIN para que las ventas se muestren incluso si el usuario_id no coincide
        $builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id  ', 'left');
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function getVentas($id_usuario = null)
    {
        // Aplicamos la condición WHERE si se proporciona un ID de usuario
        if ($id_usuario === null) {
            return $this->getBuilderVentas_cabecera();
        } else {
            $db      = \Config\Database::connect();
            $builder = $db->table('ventas_cabecera');
            $builder->select('*');
            $builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id ', 'left');
            $builder->where('ventas_cabecera.usuario_id', $id_usuario);
            $query = $builder->get();
            return $query->getResultArray();
        }
    }
}
