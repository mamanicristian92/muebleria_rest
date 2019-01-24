<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoFoto;
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
        //
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $cantidad = $request->input('cantidad');
        $cantidad_minima = $request->input('cantidad_minima');

        $producto = new Producto;

        $producto->nombre=$nombre;
        $producto->descripcion=$descripcion;
        $producto->precio = $precio;
        $producto->cantidad = $cantidad;
        $producto->cantidad_minima = $cantidad_minima;

        $producto->estado = true;
        $producto->id_categoria = 0;
        $producto->usu_id = 0;
        $producto->usu_id_baja = 0;

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
        $descripcion = $request->input('descripcion');

        $producto = Producto::find($id_mueble);

        $producto->nombre=$nombre;
        $producto->descripcion=$descripcion;
        $producto->save();
        return response()->json($producto,200);
    }

    public function delete(){
        $request = request();
        $id_producto = $request->route('id_producto');
        $producto = Producto::find($id_producto);
        $producto->estado = 0;
        $producto->deleted_at = Carbon::now();
        $producto->usu_id_baja = 0;
        $producto->save();

        return response()->json($producto,200);
    }

    public function agregar_foto(){
        $request = request();
        $id_producto = $request->route('id_producto');
        if($request->hasFile('foto')){
            $archivo = $request->file('foto');
            $dir = $archivo->store('productos/fotos');

            $foto = new ProductoFoto;
            $foto->nombre = $archivo->getClientOriginalName();
            $foto->pfo_dir = $dir;
            $foto->usu_id = 0;
            $foto->mue_id = $id_mueble;
            $foto->save();
            return response()->json($foto,200);
        }
        return response()->json(null,200);
    }
    
     public function fotos(){
        $fotos = ProductoFoto::where('estado',1)->get();
        return response()->json($fotos,200);
    }

    public function foto(){
        $id_foto = request()->route('id_producto_foto');
        $foto = ProductoFoto::find($id_foto);
        return response()->download(storage_path("app/{$foto->pfo_dir}"));
    }
}