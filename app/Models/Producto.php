<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Producto extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_productos';
    protected $primaryKey='pro_id';

    protected $hidden = [
        'pro_id',
        'pro_nombre',
        'pro_descripcion',
        'cat_id',

        'pro_precio',
        'pro_precio',
        'pro_precio_lista',
        'pro_precio_mayor',
        'pro_cantidad',
        'pro_cantidad_minima',

        'mue_ancho',
        'mue_profundidad',
        'mue_tapizado',

        'estado',
        'created_at',
        'updated_at',

        'usu_id',
        'usu_id_baja',
    ];

    protected $maps = [
        'id' => 'pro_id',
        'nombre' => 'pro_nombre',
        'descripcion' => 'pro_descripcion',

        'cantidad' => 'pro_cantidad',
        'cantidad_minima' => 'pro_cantidad_minima',
        'precio' => 'pro_precio',
        'precio_lista' => 'pro_precio_lista',
        'precio_mayor' => 'pro_precio_mayor',

        'id_categoria' => 'cat_id',
        'id_usuario'=> 'usu_id' ,
        'id_usuario_baja'=> 'usu_id_baja',
    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
        
        'cantidad'
        'cantidad_minima'
        'precio',
        'precio_lista',
        'precio_lista_mayor',

        'id_usuario',
        'id_usuario_baja',
    ];

/*
    public function categoria()
    {
        return $this->hasOne('App\TipoMueble','cat_id');
    }


    public function tipo_linea()
    {
        return $this->hasOne('App\TipoLinea','tli_id');
    }
*/
    public function fotos()
    {
        return $this->hasMany('App\ProductoFoto','pro_id');
    }
    */
}