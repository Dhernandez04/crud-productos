<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\CategoriaModel;
use App\Models\UnidadesModel;

class ProductosController extends BaseController
{
    protected $productos;
    public function __construct(){

        $this->productos = new productosModel();
        $this-> categorias = new CategoriaModel();
        $this->unidades = new UnidadesModel();
    }
	public function index($activo=1)
	{
        $productos = $this->productos->where('activo',$activo)->findAll();
        $data = ['titulo'=>'productos',
                 'datos'=>$productos];

		return view('productos/index',$data);
	}

    public function eliminados($activo=0)
	{
        $productos = $this->productos->where('activo',$activo)->findAll();
        $data = ['titulo'=>'productos eliminadas',
                 'datos'=>$productos];

		return view('productos/eliminados',$data);
	}

    public function nuevo()
    {
        $unidades = $this->unidades->where('activo',1)->findAll();
        $categorias = $this-> categorias->where('activo',1)->findAll();
        $data = ['titulo'=>'Agregar producto',
                 'unidades'=>$unidades,
                 'categorias'=>$categorias
                ];
		return view('productos/nuevo',$data);
    }

    public function insertar()
    {
        if($this->request->getMethod()=="post" ){
        $datos = [
            'codigo'=>$this->request->getPost('codigo'),
            'nombre'=>$this->request->getPost('nombre'),
            'precio_venta'=>$this->request->getPost('precio_venta'),
            'precio_compra'=>$this->request->getPost('precio_compra'),
            'stock_minimo'=>$this->request->getPost('stock_minimo'),
            'inventariable'=>$this->request->getPost('inventariable'),
            'id_unidad'=>$this->request->getPost('id_unidad'),
            'id_categoria'=>$this->request->getPost('id_categoria'),
        ];
        $this->productos->save($datos);
        return redirect()->to(base_url().'/productos');
        }else{
            $data = ['titulo'=>'Agregar producto',
                    'validation'=>$this->validator];
            return view('productos/nuevo',$data);
        }
    }

    public function editar($id)
    {
        $unidades = $this->unidades->where('activo',1)->findAll();
        $categorias = $this-> categorias->where('activo',1)->findAll();
      
        $producto= $this->productos->where('id',$id)->first();
        $data = ['titulo'=>'Editar Producto',
        'producto'=>$producto,
        'unidades'=>$unidades,
        'categorias'=>$categorias];
		return view('productos/editar',$data);
    }

    public function actualizar()
    {
        $id= $this->request->getPost('id');
        $datos = [
            'codigo'=>$this->request->getPost('codigo'),
            'nombre'=>$this->request->getPost('nombre'),
            'precio_venta'=>$this->request->getPost('precio_venta'),
            'precio_compra'=>$this->request->getPost('precio_compra'),
            'stock_minimo'=>$this->request->getPost('stock_minimo'),
            'inventariable'=>$this->request->getPost('inventariable'),
            'id_unidad'=>$this->request->getPost('id_unidad'),
            'id_categoria'=>$this->request->getPost('id_categoria'),
        ];
        $this->productos->update($id,$datos);
        return redirect()->to(base_url().'/productos');
    }
    public function eliminar($id)
    {  
        $this->productos->update($id,['activo'=>0]);
        return redirect()->to(base_url().'/productos');
    }

    public function reingresar($id)
    {  
        $this->productos->update($id,['activo'=>1]);
        return redirect()->to(base_url().'/productos');
    }
}
