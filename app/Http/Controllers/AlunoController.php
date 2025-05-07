<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

use function PHPUnit\Framework\directoryExists;
use function PHPUnit\Framework\isInt;

class AlunoController extends Controller
{


    public function index()
    {

        $alunos = Aluno::all();
        $cursos = Curso::all();
        $_cursos = [];

        foreach ($cursos as $curso) {

            array_push($_cursos, ['label' => $curso->nome, 'value' => $curso->id]);
        }

        return view("main.alunos", ['alunos' => $alunos, 'cursos' => $_cursos]);
    }
    public function form()
    {


        $cursos = Curso::all();


        return view('forms.criarAluno', ['cursos' => $cursos]);
    }

    public function show($id)
    {

        $cursos = Curso::all();

        if (isset($id)) {

            $aluno_selecionado = Aluno::find($id);

            if ($aluno_selecionado != null) {

                return view('forms.editarAluno', ['cursos' => $cursos, 'aluno' => $aluno_selecionado]);
            } else {

                return redirect()->back();
            }
        }
    }

    public function create(Request $dados)
    {


        // Upload da imagem
        $arquivo = $dados->file('foto');
        $nomeImagem = time() . '.' . $arquivo->getClientOriginalExtension();
        $arquivo->move(public_path('uploads'), $nomeImagem);

        // Criação do aluno
        $novoAluno = new Aluno();
        $novoAluno->nome          = $dados->nome;
        $novoAluno->email         = $dados->email;
        $novoAluno->tel           = $dados->tel;
        $novoAluno->sexo          = $dados->sexo;
        $novoAluno->bi            = $dados->bi;
        $novoAluno->foto          = $nomeImagem;
        $novoAluno->dt_nascimento = $dados->dt_nascimento;
        $salvo = $novoAluno->save();

        // Associação com curso
        if ($salvo) {

            for ($n = 0; $n < 6; $n++) {

                $notas = new Nota();
                $notas->valor = 0;
                $notas->aluno()->associate($novoAluno);
                $notas->save();
            }

            $curso = Curso::find($dados->curso);
            $novoAluno->cursos()->attach($curso);


            return redirect('/alunos/')->with('sucess', 'Aluno cadastrado com sucesso!');
        } else {
            return redirect('/alunos/cadastro')->with('error', 'A operação falhou!');
        }
    }

    public function doc_pdf($id)
    {

        $aluno = Aluno::find($id);
        $pdf = Pdf::loadView('pdf.ficha', ['aluno' => $aluno]);

        return $pdf->stream();
    }

    public function update(Request $dados)
    {


        // return $dados;
        $curso = Curso::find($dados->curso);
        $atualizar_aluno = Aluno::find($dados->id);

        $atualizar_aluno->nome       = $dados->nome;
        $atualizar_aluno->email      = $dados->email;
        $atualizar_aluno->tel        = $dados->tel;
        $atualizar_aluno->sexo       = $dados->sexo;
        $atualizar_aluno->bi         = $dados->bi;
        $atualizar_aluno->dt_nascimento = $dados->dt_nascimento;

        if ($dados->file('foto') != $atualizar_aluno->foto) {

            $copy_file = $dados->file('foto');
            $nome_image = time() . '.' . $copy_file->guessClientExtension();
            move_uploaded_file($copy_file, public_path('/uploads/' . $nome_image));
            $atualizar_aluno->foto       = $nome_image;
        }

        if ($atualizar_aluno->cursos()->get()[0]->id != $curso->id) {



            $curso_antigo = $atualizar_aluno->cursos()->get()[0];
            $atualizar_aluno->cursos()->detach($curso_antigo);
            $atualizar_aluno->cursos()->attach($curso);
        }


        if ($atualizar_aluno->update()) {

            return redirect("/alunos/$atualizar_aluno->id")->with('sucess', 'feito com sucesso!');
        } else {

            return redirect("/alunos/$atualizar_aluno->id")->with('error', 'a operação falhou!');
        }
    }

    public function delete($id)
    {

        if (isset($id)) {

            $aluno_selecionado = Aluno::find($id);

            $dados = json_encode($aluno_selecionado);

            $file = fopen("data/$aluno_selecionado->nome.json ", 'w');

            fwrite($file, $dados);
            fclose($file);

            if ($aluno_selecionado != null) {

                $aluno_selecionado->delete();

                return redirect('alunos/')->with('sucess', 'registro deletado comsucesso');
            } else {

                return redirect('alunos/')->with('error', 'nao foipossivelexecutaraoperacao');
            }
        }
    }
}
