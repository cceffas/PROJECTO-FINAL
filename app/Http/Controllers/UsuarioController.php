<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;





enum AcessoUsuario: string
{
    case ADMIN = 'admin';
    case SECRETARIA = 'secretaria';
    case FORMADOR = 'formador';


}
enum UsuarioStatus
{
    case ON;
    case OFF;
}

class UsuarioController extends Controller
{


    private function validarDados(Request $dados)
    {

        $validar = validator::make(
            $dados->all(),
            [
                'nome' => 'required',
                'senha' => 'required|min:6',
                'senha_confirmation' => 'required|same:senha',
                'acesso' => 'required'
            ],
            [
                'nome.required' => 'o nome é obrigatorio',
                'senha.required' => 'a senha é obrigatoria',
                'senha.min' => 'a senha deve conter no minimo 6 caracteres',
                'senha_confirmation.required' => 'confirme a senha',
                'senha_confirmation.same' => 'as senhas não coincidem',
                'acesso.required' => 'selecione um nivel de acesso'
            ]
        );

        return $validar;
    }
    public function index()
    {
        $acessos = AcessoUsuario::cases();

        $usuarios = Usuario::all();
        return view('main.usuarios', ['usuarios' => $usuarios, 'acessos' => $acessos]);
    }
    public function form()
    {

        $acessos =
            [
                // ["label" => "Admin", "value" => "admin"],
                ["label" => "Secretaria", "value" => "secretaria"],
                ["label" => "Formador", "value" => "formador"],
            ];

        return view('forms.criarUsuario', compact('acessos'));
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


        $validar = $this->validarDados($dados);

        if ($validar->fails()) {

            return redirect()->back()->with('error', $validar->errors()->first());
        }

        try {

            $novo_usuario = Usuario::create(
                [
                    'nome' => "$dados->nome",
                    'senha' => bcrypt($dados->senha),
                    'acesso' => $dados->acesso
                ]
            );

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'ja existe um usuario com esse email!');
        }


        return redirect('/usuarios/')->with('sucess', 'o novo usuario foi criado com sucesso!');

    }
    // end
    public function update(Request $dados)
    {


        $validar = $this->validarDados($dados);


        if ($validar->fails()) {

            return redirect()->back()->with('error', $validar->errors()->first());
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

            $usuario->update(['estatus' => UsuarioStatus::OFF->name]);

            return redirect('/usuarios/')->with('sucess', 'o usuario foi deletado com sucesso!');

        } else {

            return redirect('/usuarios/')->with('error', 'não foi possivel deletar usuario!');

        }
    }
}
