<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Usuario extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use Eloquence, Mappable;

    protected $table = 'tbl_usuarios';
    protected $primaryKey='usu_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usu_email',
        'usu_password',
        'usu_apellido',
    ];
    protected $maps = [
        'email' => 'usu_email',
        'nombre' => 'usu_nombre',
        'apellido' => 'usu_apellido',
    ];
    protected $appends = [
        'email',
        'nombre',
        'apellido',
    ];
    public function getAuthPassword() {
        return $this->usu_password;
    }
}
