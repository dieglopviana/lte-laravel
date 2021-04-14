<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;

class LoginController extends Controller
{

    public function index(){
        return view('login.index');
    }


    public function authenticate(Request $request){
        $credetials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $customMessages = [
            'email.required' => '*Digite seu email cadastrado',
            'email.email' => '*Digite um email válido',
            'password.required' => '*Digite sua senha'
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->passes()){
            if (Auth::attempt($credetials, $request->has('remember'))){
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 0, 'errors' => ['*Email ou senha inválidos']]);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->all()]);
        }
    }


    public function logout(){
        Auth::logout();

        return redirect()->route('login.index');
    }


    public function forgotPassword(Request $request){
        $rules = [
            'email' => 'required|email|exists:users,email',
        ];

        $customMessages = [
            'email.required' => '*Digite seu email corretamente',
            'email.email' => '*Email informado é inválido',
            'email.exists' => '*Email informado não cadastrado',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->passes()){
            $token = Str::random(64);

            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );

            Mail::to($request->email)->send(new ForgotPassword($request->email, $token));

            $request->session()->flash('messageSuccessfull', '- Email de recuperação de senha enviado');
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->all()]);
        }
    }


    public function newPassword(Request $request){
        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$updatePassword){
            $request->session()->flash('messageError', '- Email ou token inválido');
            return redirect('/login');
        }

        return view('login.reset_password', ['email' => $request->email, 'token' => $request->token]);
    }


    public function resetPassword(Request $request){
        $rules = [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
        ];

        $customMessages = [
            'email.required' => '*Digite seu email corretamente',
            'email.email' => '*Email informado é inválido',
            'email.exists' => '*Email informado não cadastrado',
            'password.required' => '*Digite sua senha',
            'password.confirmed' => '*Confirme sua senha',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->passes()){
            $user = User::where('email', '=', $request->email);

            if ($user){
                if ($user->update(['password' => Hash::make($request->password)])){
                    $request->session()->flash('messageSuccessfull', '- Senha alterada com sucesso');
                    return response()->json(['status' => 1]);
                } else {
                    return response()->json(['status' => 0, 'errors' => '*Erro ao redefinir senha']);
                }
            } else {
                return response()->json(['status' => 0, 'errors' => '*Email informado inválido']);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->all()]);
        }
    }



}
