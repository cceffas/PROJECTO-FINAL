<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrutorController extends Controller
{
    public function index(){

        return view("main.instrutores");
    }
}
