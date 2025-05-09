<?php

use Illuminate\Support\Facades\Route;
// end init
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\InstrutorController;
use App\Http\Controllers\EstagiariosController;
use App\Http\Controllers\InstitutoController;
use App\Http\Controllers\NotaController;

use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\PlanoEstagioController;
// controllers end
use App\Http\Middleware\UsuarioNaoLogado;
use App\Http\Middleware\UsuarioLogado;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Pedagogia;
use App\Http\Middleware\Secretaria;
use App\Http\Middleware\NoCacheHeaders;
use App\Models\Notificacao;
use App\Models\PlanoEstagio;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Nette\Utils\Strings;

//end midlewares




Route::get('/teste', function () {});

Route::middleware(NoCacheHeaders::class)->group(function () {

    Route::get('/', [AuthController::class, 'index'])->middleware(UsuarioNaoLogado::class);


    Route::middleware(UsuarioLogado::class)->group(function () {

        Route::get('/sair', [AuthController::class, 'sair']);
        Route::get('/back', function () {

            return redirect('/panel');
        });

        Route::get('/notifications', [NotificacaoController::class, 'index']);
    });
    Route::post('/entrar', [AuthController::class, 'entrar'])->middleware(UsuarioNaoLogado::class);


    ##nivel de acesso Secretaria

    Route::middleware(Secretaria::class)->get('/panel', function () {


        $dados = [
            "labels" => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
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

        $turmas = App\Models\Turma::count();
        $cursos = App\Models\Curso::count();
        $alunos = App\Models\Aluno::count();

        $instrutores = App\Models\Instrutor::count();

        return view('main.dashboard', ['turmas' => $turmas, 'cursos' => $cursos, 'alunos' => $alunos, 'instrutores' => $instrutores, 'dados' => $dados]);
    });
    Route::middleware([Secretaria::class])->prefix("/alunos")->group(function () {

        Route::get("/", [AlunoController::class, 'index']);
        Route::get('/form', [AlunoController::class, 'form']);
        Route::post("/criar", [AlunoController::class, 'create']);
        Route::post('/atualizar', [AlunoController::class, 'update']);
        Route::get('/deletar/{id}', [AlunoController::class, 'delete']);
        Route::get('/{id}', [AlunoController::class, 'show']);
        Route::get('/ficha/{id}', [AlunoController::class, 'doc_pdf']);
    });
    Route::middleware([Secretaria::class])->prefix("/estagiarios")->group(function () {

        Route::get('/', [EstagiariosController::class, 'index']);
        Route::get('/form', [EstagiariosController::class, 'form']);
        Route::get('/{id}', [EstagiariosController::class, 'show']);
        Route::post('/criar', [EstagiariosController::class, 'create']);
        Route::post('/atualizar', [EstagiariosController::class, 'update']);
        Route::post('/deletar', [EstagiariosController::class, 'delete']);
    });
    Route::middleware([Secretaria::class])->prefix('/pagamentos')->group(function () {

        Route::get('/', [PagamentoController::class, 'index']);
        Route::get('/form', [PagamentoController::class, 'form']);
        Route::post('/criar', [PagamentoController::class, 'create']);
        Route::get('/{id}', [PagamentoController::class, 'show']);
    });
    ##------------------------------------------------------------------------------

    ##nivel de acesso pedagogia

    Route::middleware([Pedagogia::class])->prefix("/faltas")->group(function () {

        Route::view('/', 'main.assiduidades');
    });
    Route::middleware([Pedagogia::class])->prefix("/certificados")->group(function () {

        Route::view('/', 'main.certificados');
    });
    Route::middleware([Pedagogia::class])->prefix('/desempenho')->group(function () {

        Route::get('/', [NotaController::class, 'index']);
        Route::get('/{curso_id}/{turma_id}', [NotaController::class, 'show']);
    });


    #-------------------------------------------------------------------------------
    ##niveis de aceso admin
    Route::middleware([Admin::class])->prefix('/usuarios')->group(function () {

        Route::get('/', [UsuarioController::class, 'index']);
        Route::post('/criar', [UsuarioController::class, 'create']);
        Route::post('/atualizar', [UsuarioController::class, 'update']);
        Route::get('/deletar/{id}', [UsuarioController::class, 'delete']);
    });

    Route::middleware([Admin::class, UsuarioLogado::class])->prefix('/cursos')->group(function () {

        Route::get('/', [CursoController::class, 'index']);
        Route::get('/alunos/{id}', [CursoController::class, 'show']);
        Route::post('/criar', [CursoController::class, 'create']);
        Route::post('/atualizar', [CursoController::class, 'update']);
        Route::get('/deletar/{id}', [CursoController::class, 'delete']);
    });

    Route::middleware([Admin::class, UsuarioLogado::class])->prefix('/turmas')->group(function () {

        Route::get('/', [TurmaController::class, 'index']);
        Route::post('/criar', [TurmaController::class, 'create']);
        Route::get('/alunos/{id}', [TurmaController::class, 'show']);
        Route::post('/atualizar', [TurmaController::class, 'update']);
        Route::post('/enturmar', [TurmaController::class, 'store']);
        Route::get('/deletar/{id}', [TurmaController::class, 'delete']);
    });
    Route::middleware([Admin::class, UsuarioLogado::class])->prefix('/planos')->group(function () {

        Route::get('/', [PlanoEstagioController::class, 'index']);
        Route::get('/form', [PlanoEstagioController::class, 'form']);

        Route::get('/{id}', [PlanoEstagioController::class, 'show']);
        Route::post('/criar', [PlanoEstagioController::class, 'create']);
        Route::post('/atualizar', [PlanoEstagioController::class, 'update']);
        Route::post('/deletar', [PlanoEstagioController::class, 'delete']);
    });
    Route::middleware([Admin::class])->prefix('/instrutores')->group(function () {

        Route::get('/',[InstrutorController::class,'index']);
        Route::get('/form',[InstrutorController::class,'form']);
        Route::get('/{id}',[InstrutorController::class,'show']);
        Route::post('/criar', [InstrutorController::class,'create']);
        Route::post('/atualizar', [InstrutorController::class,'update']);
        Route::get('/deletar/{id}', [InstrutorController::class,'delete']);

    });
    Route::middleware([Admin::class])->prefix('/institutos')->group(function () {

        Route::get('/', [InstitutoController::class, 'index']);
        Route::get('/form', [InstitutoController::class, 'form']);
        Route::get('/{id}', [InstitutoController::class, 'show']);
        Route::post('/atualizar', [InstitutoController::class, 'update']);
        Route::post('/deletar', [InstitutoController::class, 'delete']);
        Route::post('/criar', [InstitutoController::class, 'create']);
    });
    #-------------------------------------------------------------------------------------------
});
