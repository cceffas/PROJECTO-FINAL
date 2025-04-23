<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller


{

  
    public function index()
    {
        $cargos= ['root', 'admin', 'secretaria', 'pedagogia'];

        $usuarios = Usuario::all();
        return view('forms.formUsuario', ['usuarios' => $usuarios,'cargos'=>$cargos]);
    }
    public function create(Request $dados)
    {



        // return dd($dados);

        $validar = $dados->validate(['nome' => 'required|string|min:4', 'senha' => 'required|min:6']);

        if ($validar) {

            $novo_usuario = Usuario::create(['nome' => "$dados->nome", 'senha' => bcrypt($dados->senha), 'cargo' => $dados->cargo]);

            return redirect('/usuarios/')->with('sucess', 'o novo usuario foi criado com sucesso! ');

        } else {

            return redirect('/usuarios/')->with('error', 'não foi possivel criar um novo usuario!');

        }

    }
    public function update(Request $dados)
    {


        $usuario= Usuario::find($dados->id);



        if(password_verify($dados->senha,$usuario->senha)){


            $usuario->update([
                'nome'=>$dados->nome,
                'cargo'=>$dados->cargo
            ]);
            return redirect('/usuarios/')->with('sucess', 'usuario atualizado com sucesso! ');

        }
        else{
            return redirect('/usuarios/')->with('error', 'não foi possivel atualizar o usuario!');

        }

    }
    public function delete($id)
    {

        $usuario = Usuario::find($id);

        if ($usuario) {


            if($usuario->estatus=='ON') return redirect('/usuarios/')->with('error', 'não pode deletar usuario que esta logado!');

            $usuario->delete();
            return redirect('/usuarios/')->with('sucess', 'o usuario foi deletado com sucesso!');

        } else {
            return redirect('/usuarios/')->with('error', 'não foi possivel deletar usuario!');

        }
    }
}
