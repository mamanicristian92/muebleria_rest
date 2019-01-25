<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoFoto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use File;

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
        $id_producto = $request->route('id_producto');
        if($request->hasFile('foto')){
            $archivo = $request->file('foto');
            $dir = $archivo->store('productos/fotos');
            $foto = new ProductoFoto;
            $foto->nombre = $archivo->getClientOriginalName();
            $foto->pfo_dir = $dir;
            $foto->usu_id = 0;
            $foto->pro_id = $id_producto;
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
    public function deletefoto(){
        $id_foto = request()->route('id_producto_foto');
        $foto = ProductoFoto::find($id_foto);
        $foto->estado = 0;
        $foto->save();  
        Storage::delete("{$foto->pfo_dir}"); 
    }
}