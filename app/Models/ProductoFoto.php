<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class ProductoFoto extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_productos_fotos';
    protected $primaryKey='pfo_id';

    protected $hidden = [
        'pfo_id',
        'pfo_nombre',
        'pfo_dir',
        'pro_id',

        'created_at',
        'update_at',
    ];

    protected $maps = [
        'id' => 'mfo_id',
        'nombre' => 'mfo_nombre',
        'direccion' => 'pfo_dir',
    ];
    
    protected $appends=[
        'id',
        'nombre',
    ];
}