<?php

namespace App\Controllers;

use App\Models\CategoriaModel;

class CategoriasController extends BaseController
{
    protected $categorias;
    public function __construct(){

        $this-> categorias = new CategoriaModel();
    }
	public function index($activo=1)
	{
        $categorias = $this-> categorias->where('activo',$activo)->findAll();
        $data = ['titulo'=>' categorias',
                 'datos'=>$categorias];

		return view('categorias/index',$data);
	}

    public function eliminados($activo=0)
	{
        $categorias = $this-> categorias->where('activo',$activo)->findAll();
        $data = ['titulo'=>' categorias eliminadas',
                 'datos'=>$categorias];

		return view('categorias/eliminados',$data);
	}

    public function nuevo()
    {

        $data = ['titulo'=>'Agregar unidad'];
		return view('categorias/nuevo',$data);
    }

    public function insertar()
    {
        $datos = [
            'nombre'=>$this->request->getPost('nombre'),
        ];
        $this-> categorias->save($datos);
        return redirect()->to(base_url().'/categorias');
    }

    public function editar($id)
    {
        $categoria= $this-> categorias->where('id',$id)->first();
        $data = ['titulo'=>'Editar unidad','datos'=>$categoria];
		return view('categorias/editar',$data);
    }

    public function actualizar()
    {
        $id= $this->request->getPost('id');
        $datos = [
            'nombre'=>$this->request->getPost('nombre'),
    
        ];
        $this-> categorias->update($id,$datos);
        return redirect()->to(base_url().'/categorias');
    }
    public function eliminar($id)
    {  
        $this-> categorias->update($id,['activo'=>0]);
        return redirect()->to(base_url().'/categorias');
    }

    public function reingresar($id)
    {  
        $this-> categorias->update($id,['activo'=>1]);
        return redirect()->to(base_url().'/categorias');
    }
}
