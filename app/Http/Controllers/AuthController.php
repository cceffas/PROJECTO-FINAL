<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function entrar(Request $dados)
    {
        $usuario = Usuario::where('nome', '=', $dados->nome)->first();


        if ($usuario) {

            if (password_verify($dados->senha, $usuario->senha)) {



                if($usuario->estatus=='ON') return redirect('/')->with('error','o usuario ja se encontra logado');

                session(['logado'=>true]);
                session(['id'=>$usuario->id]);
                session(['cargo'=>$usuario->cargo]);
                $usuario->estatus='ON';
                $usuario->update();

                return redirect('/usuarios/');

            } else {

                return redirect('/')->with('error', 'dados invalidos!');

            }
        } else {

            return redirect('/')->with('error', 'dados invalidos!');
        }
    }
    public function sair(){




        $usuario=Usuario::find(session()->get('id'));

        if(session()->has('logado')){

            session()->forget('logado');
            $usuario->estatus='OFF';
            $usuario->update();

            return redirect('/');
        }
    }

}
{

}
