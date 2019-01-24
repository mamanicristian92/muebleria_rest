<?php

namespace App\Http\Controllers;

use App\Models\Producto;
//use App\Models\MuebleFoto;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
class ProductoController extends Controller
{

    public function index(){
        $request = request();
        $todo = Producto::where('estado',1)->get();
        return response()->json($todo,200);
    }
    public function store(){
        $request = request();
        $nombre = $request->input('nombre');
        $cantidad = $request->input('cantidad');
        $cantidad_min = $request->input('cantidad_min');
        $precio = $request->input('precio');
        $precio_lista = $request->input('precio_lista');
        $id_categoria = $request->input('id_categoria');
        $producto = new Producto;
        $producto->nombre = $nombre;
        $producto->cantidad = $cantidad;
        $producto->cantidad_min = $cantidad_min;
        $producto->precio = $precio;
        $producto->precio_lista = $precio_lista;
        $producto->id_categoria = $id_categoria;
        $producto->save();
        return response()->json($producto,200);
    }

    public function show(){
        $request = request();
        $id_producto = $request->route('id_producto');
        $producto = Producto::find($id_producto);
        return response()->json($producto,200);
    }

    public function modify(){
        $request = request();
    

        $id_producto = $request->route('id_producto');
        $nombre = $request->input('nombre');
        $cantidad = $request->input('cantidad');
        $cantidad_min = $request->input('cantidad_min');
        $precio = $request->input('precio');
        $precio_lista = $request->input('precio_lista');
        $id_categoria = $request->input('id_categoria');


        $producto = Producto::find($id_producto);
        $producto->nombre=$nombre;
        $producto->cantidad=$cantidad;
        $producto->cantidad_min = $cantidad_min;
        $producto->precio = $precio;
        $producto->precio_lista = $precio_lista;
        $producto->id_categoria = $id_categoria;
        $producto->save();
        return response()->json($producto,200);
    }

    public function delete(){
        $request = request();
        $id_producto = $request->route('id_producto');
        $Producto = Producto::find($id_producto);
        $Producto->estado = 0;
        $Producto->deleted_at = Carbon::now();
        $Producto->usu_id_baja = 0;
        $Producto->save();
        return response()->json($Producto,200);
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
}