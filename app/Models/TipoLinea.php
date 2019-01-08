<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; //URM

use Sofa\Eloquence\Eloquence;   //
use Sofa\Eloquence\Mappable;    //

class TipoLinea extends Model
{
    use Eloquence, Mappable;

    protected $table = 'tbl_tipo_mueble';
    protected $primaryKey='tli_id';

    protected $hidden = [
        'tli_id',
        'tli_nombre',
        'estado',
        
    ];

    protected $maps = [
        'id' => 'tli_id',
        'nombre' => 'tli_nombre',
    ];
    
    protected $appends=[
        'id',
        'nombre',
    ];

    public function muebles()
    {
        return $this->hasMany('App\Mueble','tli_id');
    }
    
}