<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; //URM

use Sofa\Eloquence\Eloquence;   //
use Sofa\Eloquence\Mappable;    //

class MuebleMadera extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_mueble_madera';
    protected $primaryKey='mma_id';
    protected $hidden = [
        'mma_id',
        'mue_id',
        'tma_id',
        'estado',
        'created_at',
        'updated_at',
        'usu_id',
    ];

    protected $maps = [
        'id' => 'tma_id',
        'tipo_madera_id' => 'tma_id',
        'mueble_id' => 'tma',
    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
    ];
    
}