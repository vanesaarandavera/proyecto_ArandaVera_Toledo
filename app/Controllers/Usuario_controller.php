<?php
namespace App\Controllers;

use App\Models\usuarios_model;
use App\Models\perfiles_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller
{
    private $user;
    private $session;
    public function __construct()
    {
        helper(['form', 'url']);
        $this->user = new usuarios_model();
        $this->session = session();
    }

    public function create(){

        $input = $this->validate(
            [ //objeto validate
                'nombre'   => 'required|min_length[3]',
                'apellido' => 'required|min_length[3]|max_length[25]',
                'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
                'usuario'  => 'required|min_length[3] |is_unique[usuarios.usuario]',
                'pass'     => 'required|min_length[3]|max_length[10]'

            ],
            [
                'nombre' => [
                    'required' => 'Debe ingresar un nombre.'
                ],
                'apellido' => [
                    'required' => 'Debe ingresar un apellido.'
                ],
                'direccion' => [
                    'required' => 'Debe ingresar un direccion.'
                ],
                'usuario' => [
                    'required' => 'Debe ingresar un usuario.'
                ],
                'email' => [
                    'required' => 'Debe ingresar un email.', //agregar array de errores para email en uso
                    'is_unique' => 'Este email ya está en uso.'
                ],
                'pass' => [
                    'required' => 'Debe ingresar un password.'
                ]
            ]
        );
        //Si NO pasa el VALIDATE retorna las vistas con los errores
        if (!$input) {
            $data['titulo'] = 'Registrarse';
            return view('front/head_view', $data) . view('front/nav_view') . view('back/usuario/agregarusuario_view', ['validation' => $this->validator]) . view('front/footer_view');
        }
        //Guarda
        $this->user->save([
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email'  => $this->request->getVar('email'),
            'pass'  => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('success', 'Exito! Registro completado.');
        //Redirecciona
        return $this->response->redirect(site_url('/registrarse'));
        
    }

    // Gestión de usuarios para administradores
    public function index()  //Muestra una lista de todos los usuarios, 
    {
        $usuarioModel = new usuarios_model();
        $data['usuarios'] = $usuarioModel->findAll(); 

        $titulo['titulo'] = 'Lista de Usuarios';
        return view('front/head_view', $titulo)
             . view('front/nav_view')
             . view('back/usuario/lista_usuarios', $data)
             . view('front/footer_view');
    }
    ## Editar datos de usuario
    public function editar_usuario($id_usuario = null){
        // Asegurar que la usuario esté conectada
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('/login'));
        }

        $usuarioModel = new usuarios_model();
        $perfilModel = new perfiles_model();

        // Verificar si el usuario conectado es administrador (perfil_id = 1)
        // Si no es administrador, asegurarse de que solo pueda editar su propio perfil.
        if (session()->get('perfil_id') != 1 && session()->get('id_usuario') != $id_usuario) {
            session()->setFlashdata('error', 'No tienes permiso para editar este usuario.');
            return redirect()->back(); // O redirigir a su propia página de edición de perfil
        }

        $user = $usuarioModel->find($id_usuario);

        if (!$user) {
            session()->setFlashdata('error', 'Usuario no encontrado.');
            return redirect()->to(site_url('/listaUsuarios')); // Redirigir a la lista de usuarios si no se encuentra
        }

        $data['user_data'] = $user;
        $data['perfiles'] = $perfilModel->findAll(); // Obtener todos los perfiles para que el administrador cambie el rol del usuario

        $dato['titulo'] = 'Editar Usuario';
        return view('front/head_view', $dato)
             . view('front/nav_view')
             . view('back/usuario/editar_usuario_view', $data) //Esta vista contendrá el formulario
             . view('front/footer_view');
    }
   ##Procesa los datos del formulario enviado desde `editar_usuario` y actualiza la información del usuario en la base de datos.
    public function modificar_usuario($id_usuario) {
        // Asegurar que la usuario esté conectada
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('/login'));
        }
        
        $usuarioModel = new usuarios_model();
        $currentUser = $usuarioModel->find($id_usuario); // Obtener datos del usuario actual

        // Verificar si el usuario que inició sesión es un administrador o está editando su propio perfil
        if (session()->get('perfil_id') != 1 && session()->get('id_usuario') != $id_usuario) {
            session()->setFlashdata('error', 'No tienes permiso para modificar este usuario.');
            return redirect()->to(site_url('listaUsuarios'));
        }

        // Definir reglas de validación, ajustando is_unique en email/usuario
        $rules = [
            'nombre'    => 'required|min_length[3]',
            'apellido'  => 'required|min_length[3]|max_length[25]',
            'email'     => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email,id_usuario,' . $id_usuario . ']',
            'usuario'   => 'required|min_length[3]|is_unique[usuarios.usuario,id_usuario,' . $id_usuario . ']',
            'pass'      => 'permit_empty|min_length[3]|max_length[10]',
            'perfil_id' => 'permit_empty|integer'
        ];

        // Mensajes de error personalizados para mayor claridad
        $messages = [
            'nombre' => ['required' => 'Debe ingresar un nombre.'],
            'apellido' => ['required' => 'Debe ingresar un apellido.'],
            //'direccion' => ['required' => 'Debe ingresar una dirección.'],
            'email' => [
                'required'  => 'Debe ingresar un email.',
                'is_unique' => 'Este email ya está en uso por otro usuario.'
            ],
            'usuario' => [
                'required'  => 'Debe ingresar un nombre de usuario.',
                'is_unique' => 'Este nombre de usuario ya está en uso.'
            ],
            'pass' => [
                'min_length' => 'La contraseña debe tener al menos 3 caracteres.',
                'max_length' => 'La contraseña no debe exceder los 10 caracteres.'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            // Redirigir nuevamente con errores de entrada y validación
            session()->setFlashdata('error', 'Error en la validación de los datos.');
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Preparar datos para la actualización
        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'apellido'  => $this->request->getPost('apellido'),
            'usuario'   => $this->request->getPost('usuario'),
            'email'     => $this->request->getPost('email')
        ];

        // Actualice la contraseña solo si se proporciona una nueva
        $newPass = $this->request->getPost('pass');
        if (!empty($newPass)) {
            $data['pass'] = password_hash($newPass, PASSWORD_DEFAULT);
        }

        // Permitir únicamente al administrador cambiar perfil_id
        if (session()->get('perfil_id') == 1 && $this->request->getPost('perfil_id')) {
            $data['perfil_id'] = $this->request->getPost('perfil_id');
        }

        // Realizar la actualización
        $usuarioModel->update($id_usuario, $data);
        session()->setFlashdata('success', 'Usuario actualizado correctamente.');

        // Redirigir según quién actualizó (administrador o usuario)
        if (session()->get('perfil_id') == 1) {
            return redirect()->to(site_url('/listaUsuarios')); // El administrador vuelve a la lista de usuarios
        } else {
            return redirect()->to(site_url('inicio')); // El usuario normal accede al inicio
        }
    }
     public function bajaUsuario($id){
        // Verificar si el usuario logueado es un administrador ===
        if (session()->get('perfil_id') != 1) {
            session()->setFlashdata('error', 'Acceso denegado. No tienes permisos para realizar esta acción.');
            return redirect()->to(site_url('/login'));
        }
        
        // AÑADIR ESTA VERIFICACIÓN PARA IMPEDIR QUE EL ADMINISTRADOR SE DE BAJA A SÍ MISMO**
        if (session()->get('id_usuario') == $id) {
            session()->setFlashdata('error', 'No puedes darte de baja a ti mismo mientras tienes la sesión iniciada.');
            return redirect()->to(site_url('listaUsuarios'));
        }



        // Actualiza el estado 'baja' del usuario ===
        $data = ['baja' => 'SI']; // Marcamos al usuario como inactivo

        if ($this->user->update($id, $data)) {
            session()->setFlashdata('success', 'Usuario dado de baja correctamente.');
        } else {
            session()->setFlashdata('error', 'Error al intentar dar de baja al usuario.');
        }
        // Redirigir de vuelta al listado de usuarios ===
        return redirect()->to(site_url('listaUsuarios')); 
    }

    
    public function altaUsuario($id){
        // === 1. Seguridad: Verificar si el usuario logueado es un administrador ===
        if (!session()->get('logged_in') || session()->get('perfil_id') != 1) {
            session()->setFlashdata('error', 'Acceso denegado. No tienes permisos para realizar esta acción.');
            return redirect()->to(site_url('/login'));
        }

        // === 2. Actualizar el estado 'baja' del usuario ===
        $data = ['baja' => 'NO']; // Marcamos al usuario como activo

        if ($this->user->update($id, $data)) {
            session()->setFlashdata('success', 'Usuario dado de alta correctamente.');
        } else {
            session()->setFlashdata('error', 'Error al intentar dar de alta al usuario.');
        }

        // === 3. Redirigir de vuelta al listado de usuarios ===
        return redirect()->to(site_url('listaUsuarios')); // O a la ruta de listado que uses
    }
     public function inactivos(){
        if (!session()->get('logged_in') || session()->get('perfil_id') != 1) {
            session()->setFlashdata('error', 'Acceso denegado. No tienes permisos para ver usuarios inactivos.');
            return redirect()->to(site_url('/login')); // Redirige al login o a una página de error
        }

        $usuarioModel = new usuarios_model();
        // Obtener solo los usuarios donde 'baja' es 'SI'
        $data['usuarios'] = $usuarioModel->where('baja', 'SI')->findAll();

        $dato['titulo'] = 'Usuarios Inactivos';
        return view('front/head_view', $dato)
             . view('front/nav_view')
             . view('back/usuario/lista_usuarios', $data) // Reutilizamos la misma vista de listado
             . view('front/footer_view');
    }
}
