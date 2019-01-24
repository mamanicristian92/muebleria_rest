<?php

namespace App\Http\Controllers\Home;

use App\Models\Mueble;
use App\Models\MuebleFoto;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
class HomeController extends Controller
{
	public function index(){
		$request = request();
		$muebles = Mueble::where('estado',1)->get();
		return view('welcome', ['muebles' => $muebles]);
	}
}