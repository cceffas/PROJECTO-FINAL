<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        $acessos = ['admin', 'secretaria', 'pedagogia'];

        $usuarios = Usuario::all();
        return view('forms.formUsuario', ['usuarios' => $usuarios, 'acessos' => $acessos]);
    }
    public function create(Request $dados)
    {

        $validar = validator::make($dados->all(), ['nome' => 'required|string|min:4', 'senha' => 'required|min:6', 'acesso' => 'required']);

        if ($validar->fails()) {

            return redirect()->back()->with('error', 'o nome deve conter no minimo 4 caracteres e senha 6, e um unico nivel de acesso!');
        }


        $novo_usuario = Usuario::create(['nome' => "$dados->nome", 'senha' => bcrypt($dados->senha), 'acesso' => $dados->acesso]);

        return redirect('/usuarios/')->with('sucess', 'o novo usuario foi criado com sucesso! ');
    }
    // end
    public function update(Request $dados)
    {

        $validar = validator::make($dados->all(), ['id' => 'required']);

        if ($validar->fails()) {
            return redirect()->back()->with('error', 'falhou!');
        }
        $usuario = Usuario::find($dados->id);

        if (password_verify($dados->senha, $usuario->senha)) {


            $usuario->update([
                'nome' => $dados->nome,
                'acesso' => $dados->acesso
            ]);

            $usuario->update();

            return redirect('/usuarios/')->with('sucess', 'usuario atualizado com sucesso! ');
        } else {
            return redirect('/usuarios/')->with('error', 'não foi possivel atualizar o usuario! senha incorrecta');
        }
    }
    public function delete($id)
    {

        $usuario = Usuario::find($id);

        if ($usuario) {


            if ($usuario->estatus == 'ON') {
                return redirect('/usuarios/')->with('error', 'não pode deletar usuario que esta online!');
            }

            $usuario->delete();
            return redirect('/usuarios/')->with('sucess', 'o usuario foi deletado com sucesso!');
        } else {
            return redirect('/usuarios/')->with('error', 'não foi possivel deletar usuario!');
        }
    }
}
