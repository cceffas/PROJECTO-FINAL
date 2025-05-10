<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;

class desempenhoController extends Controller
{
    public function index(){

        $cursos=Curso::all();

        return view("main.desempenho",["cursos"=>$cursos]);
    }
    public function show($id){

        $turma=Turma::find($id);

        if($turma!=null){
            return view("forms.desempenhoTurma",["turma"=>$turma]);
        }
    }
}
