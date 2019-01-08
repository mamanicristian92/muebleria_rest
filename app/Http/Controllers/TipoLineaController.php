<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use App\Models\TipoLinea;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
class MuebleController extends Controller
{

    public function index(){
        $request = request();

        $todo = TipoLinea::where('estado',1)->get();
        return response()->json($todo,200);
    }
    
}