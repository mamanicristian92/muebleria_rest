<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Categoria extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_categorias';
    protected $primaryKey='cat_id';

    protected $hidden = [
        'cat_id',
        'cat_nombre',
        'cat_descripcion',
        'estado',
        'created_at',
        'updated_at'    
    ];

    protected $maps = [
        'id' => 'cat_id',
        'nombre' => 'cat_nombre',
        'descripcion' => 'cat_descripcion',
    ];
    
    protected $appends=[
        'id',
        'nombre',
        'descripcion',
        'estado',
        'created_at',
        'updated_at',
    ];
}