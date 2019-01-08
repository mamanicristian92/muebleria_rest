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
        'mue_nombre',
        'mue_descripcion',
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
        'usu_id_baja',
    ];

    protected $maps = [
        'id' => 'mue_id',
        'nombre' => 'mue_nombre',
        'descripcion' => 'mue_descripcion',
        'id_tipo_mueble' => 'tmu_id',
        'id_tipo_linea' => 'tli_id',
        'cantidad_puertas' => 'mue_cantidad_puertas',
         'cantidad_estantes'=> 'mue_cantidad_estantes',
        'cantidad_cajones' => 'mue_cantidad_cajones',
        'alto' =>'mue_alto',
        'ancho'=>'mue_ancho',
        'profundidad'=>'mue_profundidad',
        'tapizado'=> 'mue_tapizado',
        'id_Usuario'=> 'usu_id' ,
        'id_Usuario_baja'=> 'usu_id_baja',


    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
        'id_tipo_mueble',
        'id_tipo_linea',
        'cantidad_puertas',
        'cantidad_estantes',
        'cantidad_cajones',
        'alto',
        'ancho',
        'profundidad',
        'tapizado',
        'id_Usuario',
        'id_Usuario_baja',
    ];

    public function tipo_mueble()
    {
        return $this->hasOne('App\TipoMueble','tmu_id');
    }

    public function tipo_linea()
    {
        return $this->hasOne('App\TipoLinea','tli_id');
    }
}