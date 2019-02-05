<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use App\Models\Producto;
use App\Models\MuebleFoto;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
class MuebleController extends Controller
{

    public function index(){
        $request = request();
        $tipo_mueble = $request->query('tipo_mueble',1);
        $todo = Mueble::with('producto')->where('id_tipo_mueble',$tipo_mueble)
            ->whereHas('producto',function($q){
                $q->where('estado',1);
            })
            ->get();
        return response()->json($todo,200);
    }
    public function store(){
        $request = request();

        //atributos de producto
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $cantidad = $request->input('cantidad');
        $cantidad_min = $request->input('cantidad_min');
        $precio = $request->input('precio');
        $precio_lista = $request->input('precio_lista');
        $id_categoria = $request->input('id_categoria');
        //atributos mueble
        $alto = $request->input('alto');
        $ancho = $request->input('ancho');
        $profundidad = $request->input('profundidad');
        $cantidad_puertas= $request->input('cantidad_puertas');
        $cantidad_cajones= $request->input('cantidad_cajones');
        $cantidad_estantes= $request->input('cantidad_estantes');
        $tapizado = $request->input('tapizado');
        

        $producto=new Producto;
        $producto->id_categoria=1;
        $producto->nombre = $nombre;
        $producto->pro_descripcion = $descripcion;
        //$producto->cantidad = $cantidad;
        //$producto->cantidad_min = $cantidad_min;
        $producto->cantidad = 2;
        $producto->cantidad_min = 1;
        //$producto->precio = $precio;
        //$producto->precio_lista = $precio_lista;
        $producto->precio = 100;
        $producto->precio_lista = 100;
        //$producto->id_categoria = $id_categoria;
        $producto->usu_id = 0;
        $producto->save();

        $mueble = new Mueble;
        $mueble->id_tipo_mueble = 1;
        $mueble->id_tipo_linea = 1;
        //$mueble->mue_tapizado = $tapizado;
        $mueble->mue_tapizado = false;
        $mueble->alto = $alto;
        $mueble->ancho = $ancho;
        $mueble->profundidad = $profundidad;
        $mueble->cantidad_puertas = $cantidad_puertas;
        $mueble->cantidad_cajones = $cantidad_cajones;
        $mueble->cantidad_estantes = $cantidad_estantes;

        $mueble->usu_id = 0;
        $mueble->id_producto=$producto->id;


        $mueble->save();
        return response()->json($mueble,200);
    }

    public function show(){
        $request = request();
        $id_mueble = $request->route('id_mueble');
        $mueble = Mueble::with('producto')->find($id_mueble);
        return response()->json($mueble,200);
    }

    public function modify(){
        $request = request();
        $id_mueble = $request->route('id_mueble');
        //atributos de producto
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $cantidad = $request->input('cantidad');
        $cantidad_min = $request->input('cantidad_min');
        $precio = $request->input('precio');
        $precio_lista = $request->input('precio_lista');
        $id_categoria = $request->input('id_categoria');
        //atributos mueble
        $alto = $request->input('alto');
        $ancho = $request->input('ancho');
        $profundidad = $request->input('profundidad');
        $cantidad_puertas= $request->input('cantidad_puertas');
        $cantidad_cajones= $request->input('cantidad_cajones');
        $cantidad_estantes= $request->input('cantidad_estantes');
        $tapizado = $request->input('tapizado');

        $mueble = Mueble::find($id_mueble);

        $mueble->id_tipo_mueble = 1;
        $mueble->id_tipo_linea = 1;
        //$mueble->mue_tapizado = $tapizado;
        $mueble->mue_tapizado = false;
        $mueble->alto = $alto;
        $mueble->ancho = $ancho;
        $mueble->profundidad = $profundidad;
        $mueble->cantidad_puertas = $cantidad_puertas;
        $mueble->cantidad_cajones = $cantidad_cajones;
        $mueble->cantidad_estantes = $cantidad_estantes;

        $producto= Producto::find($mueble->id_producto);
        $producto->id_categoria=1;
        $producto->nombre = $nombre;
        $producto->pro_descripcion = $descripcion;
        //$producto->cantidad = $cantidad;
        //$producto->cantidad_min = $cantidad_min;
        $producto->cantidad = 2;
        $producto->cantidad_min = 1;
        //$producto->precio = $precio;
        //$producto->precio_lista = $precio_lista;
        $producto->precio = 100;
        $producto->precio_lista = 100;
        //$producto->id_categoria = $id_categoria;
        $producto->usu_id = 0;

        $producto->save();
        $mueble->save();
        return response()->json($mueble,200);
    }

    public function delete(){
        $request = request();
        $id_mueble = $request->route('id_mueble');
        $mueble = Mueble::find($id_mueble);
        $producto = Producto::fin($mueble->id_producto);
        $producto->estado = 0;
        $producto->deleted_at = Carbon::now();
        $producto->save();
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
}