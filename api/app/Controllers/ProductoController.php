<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductoModel;

class ProductoController extends ResourceController
{

    protected $producto;

    public function __construct()
    {
$this->productoModel = new ProductoModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {


$productos = $this->productoModel->orderBy('id','asc')->findAll();

$data=[
    'productos' => $productos
];
        return $this->response->setJson($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $producto = new ProductosModel();

       $id =   $productos-> insert([
        'nombre' => $this->resquest->getPost('nombre'),
        'descripcion' =>$this ->resquest->getPost('descripcion'),
        'imagen' => $this->resquest ->getPost('imagen'),
        'precio' =>$this->request->getPost('precio') ,
        'estado' => $this->request->getPost('estado'),
        'created_at' =>$this->request->getPost('created_at'),
        'updated_at' =>$this->request->getPost('update_at'),
        'deleted_at' =>$this->request->getPost('deleted_at'),
      ]) ;
      return $this->response->setJson($data);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $producto = new ProductosModel();
        $data = $this->request-getRawInput();

        $productos-> update(id,[
        'nombre'      =>$data['nombre'],
      'descripcion' =>$data['descripcion'],
        'imagen'      =>$data['imagen'],
      'precio'      =>$data['precio'],
       'estado'      =>$data['estado'],
      'created_at'  =>$data['created_at'],
        'updated_at'  =>$data['update_at'],
        'deleted_at'  =>$data['deleted_at'],
      ]) ;
      return $this->response->setJson($data);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        return $this->genericResponse($this->model->delete);
    }
}