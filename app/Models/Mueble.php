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
        'estado',
        'created_at',
        'updated_at',
        'deleted_at',
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

    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
        'id_tipo_mueble',
        'id_tipo_linea',
    
    ];
}