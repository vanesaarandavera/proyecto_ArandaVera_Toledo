<?php

namespace App\Controllers;

use App\Models\productos_model;
use App\Models\usuarios_model;
use App\Models\categoria_model;
use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;



class Productos_controller extends Controller
{
    private $producto;
    private $session;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->producto = new productos_model();
        $this->session = session();
    }
    public function creaproducto()
    {

        $producto = new productos_model();
        $data['producto'] =  $producto->findAll(); // obtener todos los productos
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        $dato['titulo'] = 'alta_productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view', $data);
        echo view('back/producto/alta_productos', $data);
        echo view('front/footer_view');
    }

    public function index()
    {
        $producto = new productos_model();
        //realizo la consulta para mostrar todos los productos
        $data['producto'] =  $producto->findAll(); //getProductoAll();funcion en el modelo


        $dato['titulo'] = 'Crud_productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/producto/listar_productos', $data);
        echo view('front/footer_view');
    }
    /**
     * Procesa los datos enviados desde el formulario de creación de productos.
     * Realiza validación, subida de imágenes y guarda el producto en la BD.
     */
    public function store()
    {
        // construimos reglas de validacion
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]|max_length[255]',
            'autor' => 'required|min_length[3]|max_length[80]',
            'descripcion' => 'required|min_length[3]|max_length[500]',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
            'categoria_id' => 'required',
            'precio' => 'required|decimal',
            'precio_vta' => 'required|decimal',
            'stock' => 'required|integer',
            'stock_min' => 'required|integer',
        ]);

        $producto = new productos_model(); //se intancia el modelo
        //  Comprobar si la validación falló.
        if (!$input) {
            $categoriasmodel = new categoria_model();
            $data['categorias'] = $categoriasmodel->getCategorias();
            $data['validation'] = $this->validator;

            $dato['titulo'] = 'Alta';
            echo view('front/head_view', $dato);
            echo view('front/nav_view');
            echo view('back/producto/alta_productos', $data);
        } else {
            // Manejar la carga de la imagen
            $img = $this->request->getFile('imagen');
            //este codigo genera un nombre aleatorio para el archivo
            $nombre_aleatorio = $img->getRandomName();
            //mueve el archivo de imagen a una ubicacion especifica
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);
            // Guardar el producto en la base de datos
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'autor' => $this->request->getVar('autor'),
                'descripcion' => $this->request->getVar('descripcion'),
                'imagen' => $nombre_aleatorio,
                'categoria_id' => $this->request->getVar('categoria_id'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
                
            ];
            // Inserta los datos en la base de datos a través del modelo.
            $producto = new productos_model();
            $producto->insert($data);
            session()->setFlashdata('success', 'Alta Exitosa...'); //Configura un mensaje flash de éxito para mostrar en la siguiente petición.
            return $this->response->redirect(Site_url('listaProductos')); // Redirige a la URL 'listarProductos'
        }
    }
    /**
     * Muestra los detalles de un solo producto para edición.
     * Recupera el producto por ID y las categorías para el select.
     */
    public function editar($id_producto)
    {
        $productoModel = new productos_model();
        $categoriaModel = new categoria_model();

        // Obtener producto específico
        $producto = $productoModel->find($id_producto);
        if (!$producto) {
            return redirect()->to(site_url('listaProductos'))->with('error', 'Producto no encontrado');
        }



        $data['old'] = $producto; // Asegura que la variable esté definida
        // Cargar vista con datos
        $categoriasM = new categoria_model();
        // Obtener categorías disponibles
        $data['categorias'] = $categoriasM->getCategorias();

        $dato['titulo'] = 'Crud_productos';
        return view('front/head_view', $dato)
            . view('front/nav_view')
            . view('back/producto/edit', $data)
            . view('front/footer_view');
    }

    /**
     * Actualiza un producto existente en la base de datos.
     * Maneja la subida de una nueva imagen o la conservación de la existente.
     */
    public function modificar($id_producto)
    {
        $productoModel = new productos_model();

        // Validaciones de datos
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'autor' => 'required|min_length[3]|max_length[80]',
            'descripcion' => 'required|min_length[3]|max_length[500]',
            'categoria_id' => 'required|integer',
            'precio' => 'required|decimal',
            'precio_vta' => 'required|decimal',
            'stock' => 'required|integer',
            'stock_min' => 'required|integer',
            'imagen' => 'permit_empty|uploaded[imagen]|max_size[imagen,2048]|is_image[imagen]'
        ]);

        if (!$input) {
            $producto = $productoModel->find($id_producto);
            $data['old'] = $producto; // Asegura que la variable esté definida
            // Cargar vista con datos
            $categoriasM = new categoria_model();
            // Obtener categorías disponibles
            $data['categorias'] = $categoriasM->getCategorias();

            $dato['titulo'] = 'Crud_productos';
            return view('front/head_view', $dato)
                . view('front/nav_view')
                . view('back/producto/edit', $data)
                . view('front/footer_view');
            // VEr por que no funcionan las validaciones
        }

        // Obtener datos del formulario
        $data = [
            'nombre_prod' => $this->request->getPost('nombre_prod'),
            'autor' => $this->request->getVar('autor'),
            'descripcion' => $this->request->getVar('descripcion'),
            'categoria_id' => $this->request->getPost('categoria_id'),
            'precio' => $this->request->getPost('precio'),
            'precio_vta' => $this->request->getPost('precio_vta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min')
        ];

        // Procesar imagen si se subió
        if ($image = $this->request->getFile('imagen')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(FCPATH . 'assets/uploads/', $newName);
                $data['imagen'] = $newName;
            }
        }

        // Actualizar producto en la base de datos
        $productoModel->update($id_producto, $data);

        return redirect()->to(site_url('listaProductos'))->with('success', 'Producto actualizado correctamente');
    }

    public function deleteproducto($id)
    {
        $productoModel = new productos_model();
        $data['eliminado'] = $productoModel->where('id_producto', $id)->first();
        $data['eliminado'] = '1';
        $productoModel->update($id, $data);
        return $this->response->redirect(site_url('listaProductos'));
    }
    public function eliminados()
    {
        $productoModel = new productos_model();
        $data['producto'] = $productoModel->findAll();
        $dato['titulo'] = 'Crud_productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/producto/productos_eliminados', $data);
        echo view('front/footer_view');
    }

    public function activarproducto($id)
    {
        $productoModel = new productos_model();
        $data['eliminado'] = $productoModel->where('id_producto', $id)->first();
        $data['eliminado'] = '0';
        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Activación Exitosa...');
        return $this->response->redirect(base_url('listaProductos'));
    }
    public function catalogoPorCategoria($id)
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        //encuentra la categoria
        $categoriaModel = new categoria_model();
        //Para añadir paginación en CodeIgniter 4, se usa el método paginate()
        $productoModel = new productos_Model();

        // Definir cantidad de productos por página
        $productosPorPagina = 10;

        // where() solo acepta un par clave-valor o un array.
        $data['producto'] = $productoModel->where(['eliminado' => '0', 'categoria_id' => $id])
            ->orderBy('id_producto', 'DESC')
            ->paginate($productosPorPagina);


        // Pasar los enlaces de paginación
        $data['pager'] = $productoModel->pager;

        $dato = ['titulo' => 'Todos Los Productos'];
        echo view('front/head_view', $dato);
        echo view('front/nav_view', $data);
        echo view('back/carrito/catalogo_view', $data);
        echo view('front/footer_view');
    }

    public function buscar()
    {
        $categorias = new categoria_model(); // Asegúrate de que el modelo esté correctamente instanciado
        $data['categorias'] = $categorias->findAll();
        $productoModel = new productos_Model();
        $termino = $this->request->getGet('query');

        // Filtrar productos por nombre o autor
        $data['producto'] = $productoModel->groupStart()
            ->like('nombre_prod', $termino)
            ->orLike('autor', $termino) //para que el usuario pueda buscar por nombre o por autor del libro
            ->groupEnd()
            ->where('eliminado', '0')
            ->orderBy('id_producto', 'DESC')
            ->paginate(10);

        $data['pager'] = $productoModel->pager;
        $data['titulo'] = "Resultados para: " . esc($termino);

        echo view('front/head_view', $data);
        echo view('front/nav_view', $data);
        echo view('back/carrito/catalogo_view', $data);
        echo view('front/footer_view');
    }
}