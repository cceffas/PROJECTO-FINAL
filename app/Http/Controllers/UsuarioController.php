<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        $acessos = ['secretaria'];

        $usuarios = Usuario::all();
        return view('main.usuarios', ['usuarios' => $usuarios, 'acessos' => $acessos]);
    }
    public function form()
    {

        return view('forms.criarUsuario');
    }
    public function edit($id)
    {

        $usuario = Usuario::find($id);
        if ($usuario) {

            return view('forms.editarUsuario', ['usuario' => $usuario]);
        }

        return redirect()->back();
    }
    public function create(Request $dados)
    {

        $validar = validator::make($dados->all(), ['nome' => 'required', 'senha' => 'required|min:6', 'acesso' => 'required']);

        if ($validar->fails()) {

            return redirect()->back()->with('error', 'o nome deve conter no minimo 4 caracteres e senha 6, e um unico nivel de acesso!');
        }


        try {
            $novo_usuario = Usuario::create(['nome' => "$dados->nome", 'senha' => bcrypt($dados->senha), 'acesso' => $dados->acesso]);
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'o nome do usuario deve ser unico');
        }

       return redirect('/usuarios/')->with('sucess', 'o novo usuario foi criado com sucesso! ');
    }
    // end
    public function update(Request $dados)
    {



        $validar = validator::make(
            $dados->all(),
            [
                'id' => 'required',
                'nome' => 'required',
                'senha' => 'required',
                'acesso' => 'required'
            ]
        );



        if ($validar->fails()) {
            return redirect()->back()->with('error', 'preencha todos os campos obrigatorios!');
        }

        $usuario = Usuario::find($dados->id);

        if (password_verify($dados->senha, $usuario->senha)) {


            try {
                $usuario->nome = $dados->nome;
                $usuario->acesso = $dados->acesso;
                $usuario->senha = $dados->senhaNova ? bcrypt($dados->senhaNova) : bcrypt($dados->senha);
                $usuario->update();
                return redirect()->back()->with('sucess', 'usuario atualizado com sucesso! ');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'o nome do usuario deve ser  unico!');
            }
        } else {

            return redirect()->back()->with('error', 'senha errada!');
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
