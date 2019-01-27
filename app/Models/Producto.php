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
        'pro_cantidad',
        'pro_cantidad_min',
        'pro_precio',
        'pro_precio_lista',
        'cat_id',
    ];

    protected $maps = [
        'id' => 'pro_id',
        'nombre' => 'pro_nombre',
         'descripcion'=>'pro_descripcion',
        'cantidad' => 'pro_cantidad',
        'cantidad_min'=>'pro_cantidad_min',
        'precio'=>'pro_precio',
        'precio_lista'=>'pro_precio_lista',
        'id_categoria'=>'cat_id',
    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
        'cantidad',
        'cantidad_min',
        'precio',
        'precio_lista',
        'id_categoria',
    ];

    /*public function tipo_mueble()
    {
        return $this->hasOne('App\TipoMueble','tmu_id');
    }

    public function tipo_linea()
    {
        return $this->hasOne('App\TipoLinea','tli_id');
    }*/
}