<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 50)->unique();
            $table->string("senha", 60);
            $table->enum("acesso", ['admin', 'secretaria', 'pedagogia']);
            $table->enum("estatus", ['OFF', 'ON']);
            $table->timestamps();
        });

        DB::table('usuarios')->insert([
            'nome' => 'admin',
            'senha' => bcrypt('123456'),
            'acesso' => 'admin'
        ]);
    }
  
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
