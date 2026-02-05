<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


enum MessagesErrorAuth: string
{
    case CAMPOS_VAZIOS = 'preancha todos os campos!';
    case CREDENCIAIS_INVALIDAS = 'Credencias Invalidos!';
    case ACESSO_NEGADO = 'acesso negado!';

    case USUARIO_INATIVO = 'usuario inativo, contate o administrador!';
    case SENHA_FRACA = 'a senha deve ter no minimo 6 caracteres';
}

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function entrar(Request $dados)
    {

        $validacao = Validator::make(
            $dados->all(),
            [
                'nome' => 'required',
                'senha' => 'required|min:6',
            ],
            [
                'nome.required' => MessagesErrorAuth::CAMPOS_VAZIOS->value,
                'senha.required' => MessagesErrorAuth::CAMPOS_VAZIOS->value,
                'senha.min' => MessagesErrorAuth::SENHA_FRACA->value,

            ]
        );


        if ($validacao->fails()) {

            return redirect('/')->with('error', $validacao->errors()->first());
        }






        $usuario = Usuario::where('nome', '=', $dados->nome)->first();

        if ($usuario) {

            if (password_verify($dados->senha, $usuario->senha)) {

                // if ($usuario->estatus == 'ON') {


                //     $notificacao = Notificacao::create([

                //         "tipo" => 'alerta',
                //         "descricao" => 'alguém tentou logar com as suas credencias',
                //     ]);

                //     $notificacao->usuario()->associate($usuario);
                //     $notificacao->save();

                // }


                session(['user_id' => $usuario->id]);
                session(['acesso' => $usuario->acesso]);
                Cookie('user', $usuario->id, 24 * 60 * 60);

                $usuario->estatus = 'ON';
                $usuario->update();

                return redirect('/panel/');

            } else {

                return redirect('/')->with('error', MessagesErrorAuth::CREDENCIAIS_INVALIDAS->value);
            }
        } else {

            return redirect('/')->with('error', MessagesErrorAuth::CREDENCIAIS_INVALIDAS->value);
        }
    }


    public function sair()
    {

        $id = session()->get('user_id');

        if ($id != null) {

            $usuario = Usuario::find($id);

            if (session()->has('user_id')) {

                $usuario->estatus = 'OFF';
                $usuario->update();
                session()->flush();

                return redirect('/');
            }
        }
    }
} {
}
