<?php
namespace App\Http\Controllers;

use App\Models\MuebleMadera;
//use App\Models\MuebleFoto;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class MuebleMaderaController extends Controller
{

    public function index(){
        $request = request();
        $todo = MuebleMadera::where('estado',1)->get();
        return response()->json($todo,200);
    }
    
    public function store(){
        $request = request();
        $nombre = $request->input('mue_id');
        $nombre = $request->input('tma_id');
        $muebleMadera = new TipoMadera;
        $muebleMadera->mue_id=$mue_id;
        $muebleMadera->tma_id=$tma_id;
        $muebleMadera->save();
        return response()->json($tipoMadera,200);
    }

    /*public function show(){
        $request = request();
        $id_tipo_madera = $request->route('id_tipo_madera');
        $tipoMadera = TipoMadera::find($id_tipo_madera);
        return response()->json($tipoMadera,200);
    }
    */
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
*/
    public function delete(){
        $request = request();
        $id_mueble_madera = $request->route('id_mueble_madera');
        $muebleMadera = MuebleMadera::find($id_mueble_madera);
        $muebleMadera->estado = 0;
        //$muebleMadera->deleted_at = Carbon::now();
        //$muebleMadera->usu_id_baja = 0;
        $muebleMadera->save();

        return response()->json($mueble,200);
    }
/*
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