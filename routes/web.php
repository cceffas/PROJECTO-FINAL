<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TurmaController;
// controllers end
use App\Http\Middleware\UsuarioNaoLogado;
use App\Http\Middleware\UsuarioLogado;
use App\Http\Middleware\Admin;
use App\Models\Instrutor;
use Illuminate\Support\Facades\Route;


//autenticacao
Route::get('/', [AuthController::class, 'index'])->middleware(UsuarioNaoLogado::class);
Route::post('/entrar', [AuthController::class, 'entrar'])->middleware(UsuarioNaoLogado::class);
Route::get('/sair',[AuthController::class,'sair'])->middleware(UsuarioLogado::class);

// rotas para todos usuarios
Route::middleware(UsuarioLogado::class)->get('/panel',function(){

    $dados= [
        "labels" => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
         "datasets" => [
        [
            'type' => 'bar',
            'label' => 'Inscirções',
            'data' => [10, 20, 30, 25, 15],
            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
            'borderColor' => 'rgb(75, 192, 192)',
        ],
        [
            'type' => 'line',
            'label' => 'desistentes',
            'data' => [12, 18, 28, 22, 17],
            'borderColor' => '#FF6384',
            'borderWidth' => 2,
            'fill' => false,
        ]
    ]
    ];

    $turmas= App\Models\Turma::count();
    $cursos=App\Models\Curso::count();
    $alunos=App\Models\Aluno::count();

    $instrutores=Instrutor::count();

    return view('main.dashboard',['turmas'=>$turmas,'cursos'=>$cursos,'alunos'=>$alunos,'instrutores'=>$instrutores,'dados'=>$dados]);
});
//rotas usuario
Route::middleware([Admin::class,UsuarioLogado::class])->prefix('/usuarios')->group(function () {

    Route::get('/', [UsuarioController::class, 'index'])->middleware(UsuarioLogado::class);
    Route::post('/criar', [UsuarioController::class, 'create'])->middleware(UsuarioLogado::class);
    Route::post('/atualizar',[UsuarioController::class,'update']);
    Route::get('/deletar/{id}', [UsuarioController::class, 'delete'])->middleware(UsuarioLogado::class);

});
//rotas cursos
Route::middleware([Admin::class,UsuarioLogado::class])->prefix('/cursos')->group(function(){

    Route::get('/',[CursoController::class,'index']);
    Route::get('/alunos/{id}',[CursoController::class,'show']);
    Route::post('/criar',[CursoController::class,'create']);
    Route::post('/atualizar',[CursoController::class,'update']);
    Route::get('/deletar/{id}',[CursoController::class,'delete']);

});
// rotas de alunos
Route::middleware([Admin::class,UsuarioLogado::class])->prefix("/alunos")->group(function () {

    Route::get("/",[AlunoController::class,'index']);
    Route::post("/criar", [AlunoController::class, 'create']);
    Route::post('/atualizar',[AlunoController::class,'update']);
    Route::get('/deletar/{id}', [AlunoController::class, 'delete']);
    Route::get('/{id}', [AlunoController::class, 'show']);
    Route::get('/ficha/{id}',[AlunoController::class,'doc_pdf']);
});
// rotas de estagiarios
Route::middleware([Admin::class,UsuarioLogado::class])->prefix("/estagiarios")->group(function(){

    Route::view('/','main.estagiarios');

});
// rotas de faltas
Route::middleware([Admin::class,UsuarioLogado::class])->prefix("/faltas")->group(function(){

    Route::view('/','main.assiduidades');

});
//rotas de certificados
Route::middleware([Admin::class,UsuarioLogado::class])->prefix("/certificados")->group(function(){

    Route::view('/','main.certificados');

});
// rotas instrutores
Route::middleware([UsuarioLogado::class,Admin::class])->prefix('/instrutores')->group(function(){

    Route::view('/','main.instrutores');
});
//rotas turmas
Route::middleware([Admin::class,UsuarioLogado::class])->prefix('/turmas')->group(function () {

    Route::get('/',[TurmaController::class,'index']);
    Route::post('/criar',[TurmaController::class,'create']);
    Route::get('/alunos/{id}',[TurmaController::class,'show']);
    Route::post('/atualizar',[TurmaController::class,'update']);
    Route::post('/enturmar',[TurmaController::class,'store']);
    Route::get('/deletar/{id}',[TurmaController::class,'delete']);
});
//rotasde pagamentos
Route::prefix('/pagamentos')->group(function () {

    Route::get('/', [PagamentoController::class, 'index']);
});
