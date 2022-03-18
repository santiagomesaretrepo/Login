<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    
    public function creteuser(Request $request){
       // echo $request->nombre.$request->usuario.$request->password;
        $url = 'http://127.0.0.1:8000/api/newuser';
        //los datos que van con el post
        $fields = array(
                'name' => $request->name,
                'usuario' => $request->usuario,
                'password' => $request->password,
        );
        $ch = curl_init();
        $headers = array
        (
            //'Authorization: key=' . '',
            //forma de como van ir los registros
            'Content-Type: application/json;'
        );
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch,CURLOPT_POST, count($files));
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch); 
        return $result;
    }
    public function index(){
        $usuarios=User::all();
        return  $usuarios; 
    }
    //vista para mostrar el login
    public function indexViewuser(){
        return view('users.loginuser'); 
    }
    //vista para para la creacion de un nuevo usuario 
    public function indexViewNewuser(){
        return view('users.viewnewuser'); 
    }
    //vista para para la creacion de un nuevo usuario 
    public function indexViewEditeuser(Request $request){
       $nombre_usuario= $request->name;
        return view('users.viewediteuser',compact('nombre_usuario')); 
    }
    //vista para para luego de loguerase
    public function indexViewUserlogueo(){
        return view('users.viewlogin'); 
    }
    //metodo crear nuevo usuario
    public function store(Request $request){

        $request->validate([
           //validar  los campos de login si esten ingresados
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        //validar buscar en la base de datos si hay o no un registro
        $validarususrios=User::where('name', '=', $request->name )
        ->orWhere('email',"=",$request->email)
        ->get();
        //luego de consultar validamos si creamos el usuario o no 
        if ( count($validarususrios)>= 1) {
            return back()->with('mensaje','El usuario ya Existe'); 
        } else {
            $usuarios=new User();
            $usuarios->name=$request->name;
            $usuarios->email=$request->email;
            $usuarios->password= Hash::make($request->password);
            $usuarios->save();
            return back()->with('mensaje','Registro Exitoso Ya puedes Ingresar al Login'); 
        }
    }
    public function login(Request $request){

        $request->validate([
            //validar  los campos de login si esten ingresados
            'email'=>'required',
            'password'=>'required',
        ]);
        //verificamos el email si exite  para validar su contraseña con la que esta ingresando
        $validarususrios=User::where('email', '=', $request->email )
        ->get();
        if (count($validarususrios)>= 1) {
            $obteneremail=User::where('email', '=', $request->email )
            ->first();
            $validar_clave=Hash::check($request->password, $obteneremail->password);
            //validar mostrar mensaje de que te debes registrar o mostrar pantalla luego de loguiarte 
            if ( $validar_clave>= 1) {
                return view('users.viewlogin',compact('obteneremail')); 
            } else {
                return back()->with('mensaje','El email o contraseña No Existen Registrate'); 
            }
        } else {
            return back()->with('mensaje','El email o contraseña No Existen Registrate'); 
        }

    }
    public function edite(Request $request){

        $request->validate([
            //validar  los campos de login si esten ingresados
            'email'=>'required',
            'password'=>'required',
        ]);
        //consultamos el usuario para editarlo
        $udateuser=User::where('name', '=', $request->name)
        ->first();
        echo $request->name;
         $udateuser->email=$request->email;
        $udateuser->password= Hash::make($request->password);
        $udateuser->save(); 
        return back()->with('mensaje','ACTUALIZACIÓN EXITOSO'); 
    }
}
