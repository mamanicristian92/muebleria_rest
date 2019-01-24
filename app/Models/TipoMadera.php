<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; //URM

use Sofa\Eloquence\Eloquence;   //
use Sofa\Eloquence\Mappable;    //

class TipoMadera extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_tipo_madera';
    protected $primaryKey = 'tma_id';

    protected $hidden = [
        'tma_id',
        'tma_nombre',
        'tma_descripcion',
        'estado',
    ];

    protected $maps = [
        'id' => 'tma_id',
        'nombre' => 'tma_nombre',
        'descripcion' => 'tma_descripcion',
    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
    ];
    
}