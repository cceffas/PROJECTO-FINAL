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
        return view('main.estagiarios', compact('estagiarios'));
    }

    public function form()
    {
        $planos = PlanoEstagio::all();
        $institutos = Instituto::all();
        return view('forms.criarEstagiario', compact('planos', 'institutos'));
    }

    public function create(Request $dados)
    {
        $novo_estagiario = new Estagiario();
        $this->preencherDados($novo_estagiario, $dados);

        $salvo = $novo_estagiario->save();

        return $salvo
            ? redirect()->back()->with('sucess', 'Estagiário registrado com sucesso!')
            : redirect()->back()->with('error', 'A operação falhou!');
    }

    public function show($id)
    {
        $estagiario = Estagiario::find($id);

        if ($estagiario) {
            $planos = PlanoEstagio::all();
            $institutos = Instituto::all();
            return view('forms.editarEstagiario', compact('planos', 'institutos', 'estagiario'));
        }

        return redirect()->back();
    }

    public function update(Request $dados)
    {
        $_estagiario = Estagiario::find($dados->id);

        if ($_estagiario) {
            $this->preencherDados($_estagiario, $dados);

            $salvo = $_estagiario->save();

            return $salvo
                ? redirect()->back()->with('sucess', 'Estagiário registrado com sucesso!')
                : redirect()->back()->with('error', 'A operação falhou!');
        }

        return redirect()->back();
    }

    public function delete(Request $dados)
    {
        $estagiario = Estagiario::find($dados->id);

        if ($estagiario) {
            $estagiario->delete();
            return redirect()->back()->with('sucess', 'estagiario deletado com sucesso!');
        }

        return redirect()->back();
    }

    // =======================
    // Função reutilizável
    // =======================
    private function preencherDados(Estagiario $estagiario, Request $dados)
    {
        $estagiario->nome = $dados->nome;
        $estagiario->email = $dados->email;
        $estagiario->tel = $dados->tel;
        $estagiario->sexo = $dados->sexo;
        $estagiario->bi = $dados->bi;
        $estagiario->dt_nascimento = $dados->dt_nascimento;
        $estagiario->plano_estagio_id = $dados->plano;

        if ($dados->hasFile('foto')) {
            $estagiario->foto = $this->uploadFicheiro($dados->file('foto'));
        }

        if ($dados->hasFile('documentos')) {
            $estagiario->documentos = $this->uploadFicheiro($dados->file('documentos'));
        }

        $estagiario->instituto_id = $dados->instituto ?? null;
    }

    private function uploadFicheiro($ficheiro, $dir = 'uploads'): string
    {
        $nome = uniqid() . '_' . time() . '.' . $ficheiro->getClientOriginalExtension();
        $ficheiro->move(public_path($dir), $nome);
        return $nome;
    }
}
