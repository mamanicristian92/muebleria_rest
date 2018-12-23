<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use App\Http\Controllers\Controller;

class muebleController extends Controller
{

    public function index(){
        $request = request();
        $tipo_mueble = $request->query('tipo_mueble',1);

        $todo = Mueble::where('tmu_id','=',$tipo_mueble)->get();

        return response()->json($todo,200);
    }

    public function store(){
        $request = request();

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        $mueble = new Mueble;
        $mueble->mue_nombre=$nombre;
        $mueble->mue_descripcion=$descripcion;
        $mueble->tmu_id = 1;
        $mueble->tli_id = 1;
        $mueble->mue_tapizado = 0;
        $mueble->usu_id = 0;
        $mueble->save();

        return response()->json($mueble,200);
    }

    public function show(){
        $request = request();

        $id_mueble = $request->route('id_mueble');
        $mueble = Mueble::find($id_mueble);
        return response()->json($mueble,200);
    }

     public function modify(){
        $request = request();

        $id_mueble = $request->route('id_mueble');

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        $mueble = Mueble::find($id_mueble);
        $mueble->mue_nombre=$nombre;
        $mueble->mue_descripcion=$descripcion;
        $mueble->save();
        return response()->json($mueble,200);
     }
}
