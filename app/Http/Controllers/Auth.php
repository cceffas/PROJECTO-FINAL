<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function entrar(Request $dados){


        
        if (strlen($dados->nome)==0 || strlen($dados->senha)==0){
    
         return redirect('/')->with('error','preencha todos os campos');
        }

        else{

            echo $dados->nome;
            echo "<br>";
            echo $dados->senha;
            echo "<br>";
            echo $dados->lembrar;
            // echo "<a href='/app'>admin</a>";

            return redirect('/welcome')->with("message","seja bem vido ".$dados->nome);
        }


    }
}
