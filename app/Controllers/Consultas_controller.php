<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\consultas_model;
use CodeIgniter\Validation\Validation;



class Consultas_controller extends Controller{
 public function guardar_consulta() {
    // Instancio el modelo de consultas
    $consultas = new consultas_model();

    // Obtengo los datos del formulario
    $data = [
        'nombre' => $this->request->getPost('nombre'),
        'apellido' => $this->request->getPost('apellido'),
        'email' => $this->request->getPost('email'),
        'telefono' => $this->request->getPost('telefono'),
        'mensaje' => $this->request->getPost('mensaje'),
        'respuesta' => 'NO' // Estado inicial de la respuesta
    ];
    // Guardar la consulta en la base de datos
    if ($consultas->insert($data)) {
        // Redirecciona al método de listar consultas con un mensaje de éxito
        return redirect()->to(base_url('contactos'))->with('success', 'Consulta guardada exitosamente.');//listar_consultas
    } else {
        // Redirecciona al método de listar consultas con un mensaje de error
        return redirect()->to(base_url('contactos'))->with('error', 'Error al guardar la consulta.');
    }
}

public function listar_consultas(){
    // instancio el modelo de consultas
    $consultas = new consultas_model();
    // traer todos los consultas activas desde la db
    $data['consultas'] = $consultas->getconsultas();
    $dato['titulo'] = 'Gestion-Consultas';
    // carga la vista
    echo view('front/head_view', $dato);
    echo view('front/nav_view');
    echo view('back/consultas/lista_consultas', $data);
    echo view('front/footer_view');
}

public function atender_consulta($id = null){
    // instancio el modelo de consultas
    $consultasM = new consultas_model();
    // traigo consulta por id
    $consultasM->getConsultas($id);
    // actualizo el estado de la consulta
    $consultasM->update($id, ['respuesta' => 'SI']);
    // redirecciona al metodo de el controlador
    return redirect()->to(base_url('listar_consultas'));
}

public function eliminar_consulta($id = null){
    // instancio el modelo de consultas
    $model = new consultas_model();
    // traigo consulta por id
    $model->getConsultas($id);
    // elimino la consulta
    $model->delete($id);
    // redirecciona al metodo de el controlador
    return redirect()->to(base_url('listar_consultas'));
}
}