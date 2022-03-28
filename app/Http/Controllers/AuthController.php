<?php

namespace App\Http\Controllers;

use App\Mail\CodeConfirm;
use App\Mail\TestEmail;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function index()
    {
        Mail::to('ubaldo_desantiago@hotmail.com')->send(new TestEmail());
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if($user = User::where('email', $request->input('email'))->first()){
            if(Hash::check($password, $user->password)){
                $url = URL::temporarySignedRoute('code', now()->addMinutes(10), ['email' => $user->email]);
                AuthController::crear($user->one_time_code);
                $files = Storage::disk('spaces')->files('Codigos');
                $codig = $files[0];
                Mail::to($user->email)->send(new CodeConfirm($codig));
                return redirect($url);
            }
            return back()->withErrors([
                'password' => 'Contraseña incorrecta.',
            ]);
        }
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function crear($conte){
        $contenido = $conte;
        $archivo = fopen('Codigo.txt','w');
        fputs($archivo,$contenido);
        fclose($archivo);
        Storage::disk('spaces')->putFile('Codigos', 'Codigo.txt', 'public');
        return $archivo;
    }

    public function borrar(){
        $files = Storage::disk('spaces')->allFiles("Codigos");
        foreach($files as $archi){
            Storage::disk('spaces')->delete($archi);
        }
    }

    public function traer(){
        return $files = Storage::disk('spaces')->files('Codigos');
    }

    public function loginWithCode(Request $request){
        $request->validate([
            'code' => 'required|numeric'
        ]);
        $code = $request->input('code');
        error_log($code);
        if($user = User::where('email', $request->input('email'))->first()){
            error_log($user->one_time_code);
            if($user->one_time_code == $code){
                if(Auth::loginUsingId($user->id)){
                    $request->session()->regenerate();
                    $user->one_time_code = rand(100000, 999999);
                    $user->save();
                    AuthController::borrar();
                    return redirect()->intended('home');
                }
                error_log('yes');
            }
            return back()->withErrors([
                'code' => 'El código que introdujo es incorrecto',
            ]);
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $code = rand(100000, 999999);
        $email = $request->input('email');
        $user = new User();
        $user->email = $request->input('email');
        $user->one_time_code = $code;
        $user->password = Hash::make($request->input('password'));
        if($user->save()){
            return redirect('/login');
        }
        return response()->json(['message' => 'No se pudo crear el usuario'], 500);
    }

    public function sendVerificationEmail($email="ubaldo_desantiago@hotmail.com"){
        $url = URL::temporarySignedRoute('verifyEmail', now()->addMinutes(30), ['email' => $email]);
        Mail::to($email)->send(new VerifyEmail($url));
        print_r($url);
    }
}
