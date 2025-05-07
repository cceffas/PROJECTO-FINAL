<?php

namespace App\Http\Controllers;

use App\Models\Estagiario;
use App\Models\Instituto;
use App\Models\PlanoEstagio;
use Illuminate\Http\Request;

class EstagiariosController extends Controller
{

    public function index()
    {
        $estagiarios = Estagiario::all();
        return view('main.estagiarios', ['estagiarios' => $estagiarios]);
    }

    public function form()
    {
        $planos = PlanoEstagio::all();
        $institutos = Instituto::all();
        return view('forms.criarEstagiario', ['planos' => $planos, 'institutos' => $institutos]);
    }
    public function create(Request $dados)
    {
        $arquivo = $dados->file('foto');
        $nomeImagem = time() . '.' . $arquivo->getClientOriginalExtension();
        $arquivo->move(public_path('uploads'), $nomeImagem);

        $documento = $dados->file('documentos');
        $nomeDocumento = time() . '.' . $documento->getClientOriginalExtension();
        $documento->move(public_path('uploads'), $nomeDocumento);

        $novo_estagiario = new Estagiario();
        $novo_estagiario->nome = $dados->nome;
        $novo_estagiario->email = $dados->email;
        $novo_estagiario->tel = $dados->tel;
        $novo_estagiario->sexo = $dados->sexo;
        $novo_estagiario->bi = $dados->bi;
        $novo_estagiario->foto = $nomeImagem;
        $novo_estagiario->documentos = $nomeDocumento;
        $novo_estagiario->dt_nascimento = $dados->dt_nascimento;
        $novo_estagiario->plano_estagio_id = $dados->plano;

        if ($dados->instituto == null) {
            $novo_estagiario->instituto_id = null;
        } else {
            $novo_estagiario->instituto()->associate($dados->instituto);
        }

        $salvo = $novo_estagiario->save();

        if ($salvo) {
            return redirect()->back()->with('sucess', 'Estagiário registrado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'A operação falhou!');
        }
    }


    public function show($id)
    {


        $estagiario = Estagiario::find($id);

        if ($estagiario != null) {
            $planos = PlanoEstagio::all();
            $institutos = Instituto::all();
            return view('forms.editarEstagiario', ['planos' => $planos, 'institutos' => $institutos, 'estagiario' => $estagiario]);
        }

        return redirect()->back();
    }

    public function update(Request $dados)
    {



        $_estagiario = Estagiario::find($dados->id);

        if ($_estagiario != null) {


            $arquivo = $dados->file('foto');
            $nomeImagem = time() . '.' . $arquivo->getClientOriginalExtension();
            $arquivo->move(public_path('uploads'), $nomeImagem);

            $documento = $dados->file('documentos');
            $nomeDocumento = time() . '.' . $documento->getClientOriginalExtension();
            $documento->move(public_path('uploads'), $nomeDocumento);

            $_estagiario->nome = $dados->nome;
            $_estagiario->email = $dados->email;
            $_estagiario->tel = $dados->tel;
            $_estagiario->sexo = $dados->sexo;
            $_estagiario->bi = $dados->bi;
            $_estagiario->foto = $nomeImagem;
            $_estagiario->documentos = $nomeDocumento;
            $_estagiario->dt_nascimento = $dados->dt_nascimento;
            $_estagiario->plano_estagio_id = $dados->plano;



            if ($dados->instituto == null) {
                $_estagiario->instituto_id = null;
            } else {
                $_estagiario->instituto()->associate($dados->instituto);
            }

            $salvo = $_estagiario->save();

            if ($salvo) {
                return redirect()->back()->with('sucess', 'Estagiário registrado com sucesso!');
            } else {
                return redirect()->back()->with('error', 'A operação falhou!');
            }
        }

        return redirect()->back();
    }

    public function delete(Request $dados)
    {



        $estagiario = Estagiario::find($dados->id);

        if ($estagiario != null) {

            $estagiario->delete();


            return redirect()->back()->with('sucess', 'estagiario deletado com sucesso!');
        }
        return redirect()->back();
    }
}
