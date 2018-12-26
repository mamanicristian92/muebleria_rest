<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class MuebleFoto extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_mueble_foto';
    protected $primaryKey='mfo_id';

    protected $hidden = [
        'mfo_id',
        'mfo_nombre',
        'mfo_dir',
    ];

    protected $maps = [
        'id' => 'mfo_id',
        'nombre' => 'mfo_nombre',
    ];
    
    protected $appends=[
        'id',
        'nombre',
    ];
}