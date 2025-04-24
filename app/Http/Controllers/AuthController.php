<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use GuzzleHttp\Cookie\SetCookie;
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

                cookie("user$dados->id",true,2880*60);
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

            session()->flush();
            $usuario->estatus='OFF';
            $usuario->update();
            cookie("user$usuario->id",null);

            return redirect('/');
        }
    }

}
{

}
