<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    public function register(Request $request){
        $rules = [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'accept_terms' => 'accepted'
        ];

        $customMessages = [
            'name.required' => '*Informe Seu Nome',
            'name.regex' => '*Digite seu nome corretamente',
            'name.max' => '*Limite de caracteres de 255 para o nome',
            'email.required' => '*Digite seu email',
            'email.email' => '*Email digitado não é válido',
            'email.unique' => '*Email informado já existe',
            'password.required' => '*Digite sua senha',
            'password.confirmed' => '*Confirme sua senha',
            'accept_terms.accepted' => '*Aceite nossos termos'
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->passes()){
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));

            if ($user->save()){
                $request->session()->flash('messageSuccessfull', 'Cadastro realizado com sucesso!');
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 0, 'errors' => 'Erro ao tentar cadastrá-lo!']);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->all()]);
        }
    }


    public function account(Request $request){
        $rules = [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
        ];

        if ($request->has('password')){
            $rules['password'] = 'required|confirmed';
        }

        $customMessages = [
            'name.required' => '*Informe Seu Nome',
            'name.regex' => '*Digite seu nome corretamente',
            'password.required' => '*Digite sua senha',
            'password.confirmed' => '*Confirme sua senha'
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->passes()){
            $user = User::find(Auth::user()->id);

            if ($user){
                $user->name = $request->name;

                if ($request->has('password')){
                    $user->password = Hash::make($request->input('password'));
                }

                if ($user->save()){
                    Auth::user()->name = $request->input('name');

                    $request->session()->flash('messageSuccessfull', 'Dados alterados com sucesso!');
                    return response()->json(['status' => 1]);
                } else {
                    return response()->json(['status' => 0, 'errors' => ['*Erro ao alterar dados']]);
                }
            } else {
                return response()->json(['status' => 0, 'errors' => ['*Usuário não encontrado']]);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => $validator->errors()->all()]);
        }
    }

}
