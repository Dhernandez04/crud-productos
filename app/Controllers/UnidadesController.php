<?php

namespace App\Controllers;

use App\Models\UnidadesModel;

class UnidadesController extends BaseController
{
    protected $unidades;
    protected $reglas;
    public function __construct(){

        $this->unidades = new UnidadesModel();
        helper(['form']);
        $this->reglas = [
            'nombre'=>
                ['rules'=>'required',
                 'errors'=>[
                 'required'=>'El campo {field} es obligatorio'
                    ]
                 ],
            'nombre_corto'=>
                 ['rules'=>'required',
                  'errors'=>[
                  'required'=>'El campo {field} es obligatorio'
                     ]
                 ]
            ];
    }
	public function index($activo=1)
	{
        $unidades = $this->unidades->where('activo',$activo)->findAll();
        $data = ['titulo'=>'unidades',
                 'datos'=>$unidades];

		return view('unidades/index',$data);
	}

    public function eliminados($activo=0)
	{
        $unidades = $this->unidades->where('activo',$activo)->findAll();
        $data = ['titulo'=>'unidades eliminadas',
                 'datos'=>$unidades];

		return view('unidades/eliminados',$data);
	}

    public function nuevo()
    {

        $data = ['titulo'=>'Agregar unidad'];
		return view('unidades/nuevo',$data);
    }

    public function insertar()
    {
        if($this->request->getMethod()=="post" && $this->validate($this->reglas)){
        $datos = [
            'nombre'=>$this->request->getPost('nombre'),
            'nombre_corto'=>$this->request->getPost('nombre_corto')
        ];
        $this->unidades->save($datos);
        return redirect()->to(base_url().'/unidades');
        }else{
            $data = ['titulo'=>'Agregar unidad',
                    'validation'=>$this->validator];
            return view('unidades/nuevo',$data);
        }
    }

    public function editar($id,$valid=null)
    {
        $unidad= $this->unidades->where('id',$id)->first();
        if($valid != null){   
            $data = ['titulo'=>'Editar unidad','datos'=>$unidad,'validation'=>$valid];
        }else{
            $data = ['titulo'=>'Editar unidad','datos'=>$unidad];

        }
		return view('unidades/editar',$data);
    }

    public function actualizar()
    {
        if($this->request->getMethod()=="post" && $this->validate($this->reglas)){
            $id= $this->request->getPost('id');
            $datos = [
                'nombre'=>$this->request->getPost('nombre'),
                'nombre_corto'=>$this->request->getPost('nombre_corto')
            ];
            $this->unidades->update($id,$datos);
            return redirect()->to(base_url().'/unidades');
        }else{
            return $this->editar($this->request->getPost('nombre'),$this->validator);
        }
    }
    public function eliminar($id)
    {  
        $this->unidades->update($id,['activo'=>0]);
        return redirect()->to(base_url().'/unidades');
    }

    public function reingresar($id)
    {  
        $this->unidades->update($id,['activo'=>1]);
        return redirect()->to(base_url().'/unidades');
    }
}
