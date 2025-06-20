<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'perfil_id', 'baja'];

     protected $returnType = 'array';

    /**
     * Obtiene un usuario por un campo y valor específicos.
     *
     * @param string $field El nombre del campo (ej. 'id', 'email', 'username')
     * @param mixed $value El valor a buscar
     * @return array|object|null El usuario encontrado o null
     */
    public function getUserBy(string $field, $value)
    {
        return $this->where($field, $value)->first();
    }
}