<?php
namespace App\Http\Controllers;

use App\Models\TipoMadera;
//use App\Models\MuebleFoto;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TipoMaderaController extends Controller
{

    public function index(){
        $request = request();
        $todo = TipoMadera::where('estado',1)->get();
        return response()->json($todo,200);
    }
    
    public function store(){
        $request = request();
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $tipoMadera = new TipoMadera;
        $tipoMadera->nombre=$nombre;
        $tipoMadera->descripcion=$descripcion;
        $tipoMadera->save();
        return response()->json($tipoMadera,200);
    }

    public function show(){
        $request = request();
        $id_tipo_madera = $request->route('id_tipo_madera');
        $tipoMadera = TipoMadera::find($id_tipo_madera);
        return response()->json($tipoMadera,200);
    }
/*
    public function modify(){
        $request = request();

        $id_mueble = $request->route('id_mueble');

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        $mueble = Mueble::find($id_mueble);
        $mueble->nombre=$nombre;
        $mueble->descripcion=$descripcion;
        $mueble->save();
        return response()->json($mueble,200);
    }

    public function delete(){
        $request = request();
        $id_mueble = $request->route('id_mueble');
        $mueble = Mueble::find($id_mueble);
        $mueble->estado = 0;
        $mueble->deleted_at = Carbon::now();
        $mueble->usu_id_baja = 0;
        $mueble->save();

        return response()->json($mueble,200);
    }

    public function agregar_foto(){
        $request = request();
        $id_mueble = $request->route('id_mueble');
        if($request->hasFile('foto')){
            $archivo = $request->file('foto');
            $dir = $archivo->store('muebles/fotos');
            $foto = new MuebleFoto;
            $foto->nombre = $archivo->getClientOriginalName();
            $foto->mfo_dir = $dir;
            $foto->usu_id = 0;
            $foto->mue_id = $id_mueble;
            $foto->save();
            return response()->json($foto,200);
        }
        return response()->json(null,200);
    }
     public function fotos(){
        $fotos = MuebleFoto::where('estado',1)->get();
        return response()->json($fotos,200);
    }
    public function foto(){
        $id_foto = request()->route('id_mueble_foto');
        $foto = MuebleFoto::find($id_foto);
        return response()->download(storage_path("app/{$foto->mfo_dir}"));
    }
    */
}