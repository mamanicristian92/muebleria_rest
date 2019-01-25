<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Mueble extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_muebles';
    protected $primaryKey='mue_id';

    protected $hidden = [
        'mue_id',
        'pro_id',
        'tmu_id',
        'tli_id',
        'mue_cantidad_puertas',
        'mue_cantidad_estantes',
        'mue_cantidad_cajones',
        'mue_alto',
        'mue_ancho',
        'mue_profundidad',
        'mue_tapizado',
        'usu_id',
        
    ];

    protected $maps = [
        'id' => 'mue_id',
        'id_tipo_mueble' => 'tmu_id',
        'id_tipo_linea' => 'tli_id',
        'cantidad_puertas' => 'mue_cantidad_puertas',
         'cantidad_estantes'=> 'mue_cantidad_estantes',
        'cantidad_cajones' => 'mue_cantidad_cajones',
        'alto' =>'mue_alto',
        'ancho'=>'mue_ancho',
        'profundidad'=>'mue_profundidad',
        'tapizado'=> 'mue_tapizado',
        'id_producto'=>'pro_id',

        'id_usuario'=> 'usu_id' ,
       


    ];
    
    protected $appends=[
        'id',
        'id_producto',
        'id_tipo_mueble',
        'id_tipo_linea',
        'cantidad_puertas',
        'cantidad_estantes',
        'cantidad_cajones',
        'alto',
        'ancho',
        'profundidad',
        'tapizado',
        'id_usuario',
       
    ];

    public $timestamps = false;

    public function tipo_mueble()
    {
    return $this->hasOne('App\Models\TipoMueble','tmu_id');
    }

    public function tipo_linea()
    {
    return $this->hasOne('App\Models\TipoLinea','tli_id');
    }

    public function productos()
    {
        return $this->hasOne('App\Models\Producto','pro_id','pro_id');
    }
}