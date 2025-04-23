<?php
namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;

class PagamentoController extends Controller
{
    public function index()
    {
        $cursos=Curso::all();
        $turmas=Turma::all();
        $alunos=null;
        $alunos_data=[];


   

        if(isset($_GET['nome'])){

            $nome=$_GET['nome'];
            $alunos=Aluno::with(['turmas','cursos'])->get();


            // return dd($alunos);

            if(sizeof($alunos)<1){

                $alunos=null;
            }
        }



        // foreach ($alunos as $aluno) {
            
        //     array_push($alunos_data,[$aluno]);
        // }

        // return dd($alunos_data);
      

        $curso_data=[];
        $turmas_data=[];


        foreach ($cursos as $curso) {

            array_push($curso_data,["$curso->nome"=>"$curso->id"]);
        }

        foreach ($turmas as $turma) {

            array_push($turmas_data,['label'=>$turma->nome,'value'=>$turma->id]);
        }

        // return $curso_data;
        return view('Afinanca.pagamentos',['cursos'=>$curso_data,'turmas'=>$turmas_data,'alunos'=>$alunos]);
    }
}
