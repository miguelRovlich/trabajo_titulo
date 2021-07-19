<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth, Mail, Str;
use App\Mail\UserSendRecover, App\Mail\UserSendNewPassword;
use App\Models\User;

class ConnectController extends Controller
{
	public function __construct(){
		$this->middleware('guest')->except(['getLogout']);
	}

    public function getLogin(){
    	return view('connect.login');
    }

    public function postLogin(Request $request){
    	$rules = [
    		'email' => 'required|email',
    		'password' => 'required|min:8'
    	];

    	$messages = [
    		'email.required' => 'Su correo electrónico es requerido.',
    		'email.email' => 'El formato de su correo electrónico es invalido',
    		'password.required' => 'Por favor escriba una contraseña',
    		'password.min' => 'La contraseña debe de tener al menos 8 caracteres.',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
    	else:

    		if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)):
                if(Auth::user()->status == "100"):
                    return redirect('/logout');
                else:
                    return redirect('/');
                endif;
    		else:
    			return back()->with('message', 'Correo electrónico o contraseña errónea.')->with('typealert', 'danger');
    		endif;

    	endif;

    }

    public function getRegister(){
    	return view('connect.register');
    }

    public function postRegister(Request $request){
    	$rules = [
    		'name' => 'required',
    		'lastname' => 'required',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|min:8',
    		'cpassword' => 'required|min:8|same:password',
    	];

    	$messages = [
    		'name.required' => 'Su nombre es requerido.',
    		'lastname.required' => 'Su apellido es requerido.',
    		'email.required' => 'Su correo electrónico es requerido.',
    		'email.email' => 'El formato de su correo electrónico es invalido',
    		'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.',
    		'password.required' => 'Por favor escriba una contraseña',
    		'password.min' => 'La contraseña debe de tener al menos 8 caracteres.',
    		'cpassword.required' => 'Es necesario confirmar la contraseña',
    		'cpassword.min' => 'La confirmación de la contraseña debe de tener al menos 8 caracteres.',
    		'cpassword.same' => 'Las contraseñas no coinciden.'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
    	else:
    		$user = new User;
    		$user->name = e($request->input('name'));
    		$user->lastname = e($request->input('lastname'));
    		$user->email = $request->input('email');
    		$user->password = Hash::make($request->input('password'));

    		if($user->save()):
    			return redirect('/login')->with('message', 'Su usuario se creo con éxito, ahora puede iniciar sesión ')->with('typealert', 'success');
    		endif;
    	endif;
    }

    public function getLogout(){
        $status = Auth::user()->status;
        Auth::logout();
        if($status == "100"):
            return redirect('/login')->with('message', 'Su usuario fue suspendido.')->with('typealert', 'danger');
        else:
            return redirect('/');
        endif;
    	
    }

    public function getRecover(){
        return view('connect.recover');
    }

    public function postRecover(Request $request){
        $rules = [
            'email' => 'required|email'
        ];

        $messages = [
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'El formato de su correo electrónico es invalido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
            $user = User::where('email', $request->input('email'))->count();
            if($user == "1"):
                $user = User::where('email', $request->input('email'))->first();
                $code = rand(100000, 999999);
                $data = ['name' => $user->name, 'email' => $user->email, 'code' => $code];
                $u = User::find($user->id);
                $u->password_code = $code;
                if($u->save()):
                Mail::to($user->email)->send(new UserSendRecover($data));
                return redirect('/reset?email='.$user->email)->with('message', 'Ingrese el código que le hemos enviado a su correo electrónico.')->with('typealert', 'success');
                endif;
            else:
                return back()->with('message', 'Este correo electrónico no existe.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getReset(Request $request){
        $data = ['email' => $request->get('email')];
         return view('connect.reset', $data);
    }

    public function postReset(Request $request){
        $rules = [
            'email' => 'required|email',
            'code' => 'required'
        ];

        $messages = [
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'El formato de su correo electrónico es invalido',
            'code.required' => 'El codigo de recuperación es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
            $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->count();
            if($user == "1"):
                $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->first();
                $new_password = Str::random(8);
                $user->password = Hash::make($new_password);
                $user->password_code = null;
                if($user->save()):
                    $data = ['name' => $user->name, 'password' => $new_password];
                    Mail::to($user->email)->send(new UserSendNewPassword($data));
                    return redirect('/login')->with('message', 'La contraseña fue restablecida con éxito, le hemos enviado un correo electrónico con su nueva contraseña para que pueda iniciar sesión.')->with('typealert', 'success');
                endif;
            else:
                return back()->with('message', 'El correo electrónico o el código de recuperación son erróneos.')->with('typealert', 'danger');
            endif;
        endif;
    }
}
