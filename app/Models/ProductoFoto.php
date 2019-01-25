<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class ProductoFoto extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_producto_fotos';
    protected $primaryKey='pfo_id';

    protected $hidden = [
        'pfo_id',
        'pfo_nombre',
        'pfo_dir',
    ];

    protected $maps = [
        'id' => 'pfo_id',
        'nombre' => 'pfo_nombre',
    ];
    
    protected $appends=[
        'id',
        'nombre',
    ];
}