<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
//use App\Models\MuebleFoto;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
class CategoriaController extends Controller
{

    public function index(){
        $request = request();
        $todo = Categoria::where('estado',true)->get();
        return response()->json($todo,200);
    }
    public function store(){
        $request = request();
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        
        $categoria = new Categoria;
        $categoria->nombre = $nombre;
        $categoria->descripcion = $descripcion;
        $categoria->estado = true;
        $categoria->save();
        return response()->json($categoria,200);
    }

    public function show(){
        $request = request();
        $id_categoria = $request->route('id_categoria');
        $categoria = Categoria::find($id_categoria);
        return response()->json($categoria,200);
    }

    public function modify(){
        $request = request();

        $id = $request->route('id_categoria');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        $categoria = Categoria::find($id);
        $categoria->nombre=$nombre;
        $categoria->descripcion=$descripcion;
        $categoria->save();
        return response()->json($categoria,200);
    }

    public function delete(){
        $request = request();
        $id_categoria = $request->route('id_categoria');
        $categoria = Categoria::find($id_categoria);
        $categoria->estado = 0;
        $categoria->updated_at = Carbon::now();
        //$categoria->usu_id_baja = 0;
        $categoria->save();
        return response()->json($categoria,200);
    }
}