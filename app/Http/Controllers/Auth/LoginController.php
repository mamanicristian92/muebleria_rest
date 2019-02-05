<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function api_login(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' =>  'required|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>'Email o contraseña incorrectos'],401);
        }
        $email= $request->input('email');
        $password= $request->input('password');
        if (Auth::attempt(['usu_email'=>$email,'password'=>$password])){
            $user = Auth::user();
            $user['token'] = $user->createToken('MyAppp')->accessToken;
            return response()->json($user,200);
        }
        else {
            return response()->json(['error'=>'Contraseña y/o usuario incorrectos'],401);
        }
    }
    public function api_register(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' =>  'required|email',
            'password' => 'required|string',
            'c_password' => 'required|same:password',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>'Datos incorrectos'],401);
        }
        $email= $request->input('email');
        $password= $request->input('password');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $user = new Usuario();
        $user->email= $email;
        $user->usu_password= bcrypt($password);
        $user->nombre= $nombre;
        $user->apellido= $apellido;
        $user->save();
        $user['token'] = $user->createToken('MyAppp')->accessToken;
        return response()->json($user,200);

    }




    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var strinsg
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    +*/
}