<?php

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnArgument;

Route::get('/', function () {
    return view('auth.login');
});
Route::view('/welcome', "welcome");
Route::view("/matricula", "main.matricula");

Route::view('/app', 'main.app');

//autenticacao

Route::view('/registrar', 'auth.registrarUsuario');
Route::post('/logar', [Auth::class, 'entrar']);
#janelas
Route::view("insc","AreaFinanceira.Inscricao");