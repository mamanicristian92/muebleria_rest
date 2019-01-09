<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; //URM

use Sofa\Eloquence\Eloquence;   //
use Sofa\Eloquence\Mappable;    //

class TipoMueble extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_tipo_mueble';
    protected $primaryKey='tmu_id';

    protected $hidden = [
        'tmu_id',
        'tmu_nombre',
        'tmu_descripcion',
        'estado',
        'created_at',
        'updated_at',
        'deleted_at',
        'usu_id',
    ];


    protected $maps = [
        'id' => 'tmu_id',
        'nombre' => 'tmu_nombre',
        'descripcion' => 'tmu_descripcion',
    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
    ];
    
}