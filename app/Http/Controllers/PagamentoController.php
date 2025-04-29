<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Pagamento;
use Illuminate\Support\Facades\Validator;


class PagamentoController extends Controller
{
    public function index()
    {


        $cursos=Curso::all();
        $alunos=null;


        if(isset($_GET['nome']) && isset($_GET['curso'])){

            $curso=Curso::find($_GET['curso']);

            $alunos=$curso->alunos()->where('nome','like',"%".$_GET['nome']."%")->get();

            return view('Afinanca.pagamentos',['alunos'=>$alunos,'cursos'=>$cursos]);

        }


        return view('Afinanca.pagamentos',['cursos'=>$cursos,'alunos'=>$alunos]);
    }
    public function show($id){


        $aluno=Aluno::find($id);


        if($aluno!=null){

            $pdf = Pdf::loadView('pdf.ficha',['aluno'=>$aluno]);
            return $pdf->stream($aluno->nome);
        }

    }

    public function create(Request $dados){




        $validar=validator::make($dados->all(),
        [   'aluno'=>'required',
            "montante"=>'required',
            'assunto'=>'required',
            'agente'=>'required'
        ]);


        if($validar->fails()) return redirect()->back()->with('error','insira todos os dados obrigatorios!');



        $aluno=Aluno::find($dados->aluno);

        if($aluno!=null){


            $name_pdf="$aluno->id"."$aluno->nome".date('dmY').".pdf";
            $novo_pagamento=new Pagamento();

            $novo_pagamento->montante=$dados->montante;
            $novo_pagamento->assunto=$dados->assunto;
            $novo_pagamento->agente=$dados->agente;

            $novo_pagamento->doc=$name_pdf;
            $novo_pagamento->aluno()->associate($aluno);
            $novo_pagamento->save();

            return redirect()->back()->with('sucess','o pagamento foi registrado com sucesso!');


        }


            return redirect()->back()->with('error','ocorreu um erro!');

     
    }


}
