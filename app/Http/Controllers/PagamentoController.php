<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Pagamento;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;


class PagamentoController extends Controller
{
    public function index()
    {

        $cursos = Curso::all();
        $alunos = null;
        $pagamentos = Pagamento::all();

        if (isset($_GET['nome']) && isset($_GET['curso'])) {

            $curso = Curso::find($_GET['curso']);

            $alunos = $curso->alunos()->where('nome', 'like', "%" . $_GET['nome'] . "%")->get();
        }


        return view('main.pagamentos', ['cursos' => $cursos, 'alunos' => $alunos, 'pagamentos' => $pagamentos]);
    }

    public function form()
    {

        return view('forms.criarPagamento');
    }

    public function show($id)
    {


        $aluno = Aluno::find($id);


        if ($aluno != null) {

            $pdf = Pdf::loadView('pdf.ficha', ['aluno' => $aluno]);
            return $pdf->stream($aluno->nome);
        }
    }

    public function create(Request $dados)
    {

        if ($dados->all() != null) {


            $aluno = Aluno::find($dados->aluno_id);
            $usuario = Usuario::find($dados->usuario_id);



            if ($aluno != null && $usuario != null) {


                $arquivo = $dados->file('comprovativo');
                $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
                $caminho = $arquivo->storeAs('comprovativos', $nomeArquivo, 'public');



                $novo_pagamento = new Pagamento();
                $novo_pagamento->valor = $dados->valor;
                $novo_pagamento->m_pagamento = $dados->m_pagamento;
                $novo_pagamento->referencia = $dados->referencia;
                $novo_pagamento->descricao = $dados->descricao;
                $novo_pagamento->usuario()->associate($usuario);
                $novo_pagamento->aluno()->associate($aluno);
                $novo_pagamento->comprovativo = $nomeArquivo;

                $novo_pagamento->save();
                return redirect()->back()->with('sucess', 'pagamento registrado com sucesso');
            } else {

                return redirect()->back()->with('error', 'verifique se inseriu o codigo certo do aluno!');
            }


            return redirect()->back();
        }


        $aluno = Aluno::find($dados->aluno);

        if ($aluno != null) {

            $name_pdf = "$aluno->id" . "$aluno->nome" . date('dmY') . ".pdf";
            $novo_pagamento = new Pagamento();

            $novo_pagamento->montante = $dados->montante;
            $novo_pagamento->assunto = $dados->assunto;
            $novo_pagamento->agente = $dados->agente;

            $novo_pagamento->doc = $name_pdf;
            $novo_pagamento->aluno()->associate($aluno);
            $novo_pagamento->save();

            return redirect()->back()->with('sucess', 'o pagamento foi registrado com sucesso!');
        }


        return redirect()->back()->with('error', 'ocorreu um erro!');
    }
}
