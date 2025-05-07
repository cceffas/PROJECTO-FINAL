<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function entrar(Request $dados)
    {

        $validacao = Validator::make($dados->all(), ['nome' => 'required', 'senha' => 'required']);

        if ($validacao->fails()) {

            return redirect('/')->with('error', 'preancha todos os campos!');
        }

        $usuario = Usuario::where('nome', '=', $dados->nome)->first();
        $message_erro = 'Credencias Invalidos!';


        if ($usuario) {

            if (password_verify($dados->senha, $usuario->senha)) {



                if ($usuario->estatus == 'ON') {

                    $notificacao = new Notificacao();
                    $notificacao->tipo = 'alerta';
                    $notificacao->descricao='alguém tentou logar com as suas credencias';
                    $notificacao->usuario()->associate($usuario);
                    $notificacao->save();


                    // return redirect('/')->with('error', 'acesso negado!');
                
                }
                session(['user_id' => $usuario->id]);
                session(['acesso' => $usuario->acesso]);
                Cookie('user', $usuario->id,24*60*60);

                $usuario->estatus = 'ON';
                $usuario->update();

                return redirect('/panel/');
            } else {

                return redirect('/')->with('error', $message_erro);
            }
        } else {

            return redirect('/')->with('error', $message_erro);
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
