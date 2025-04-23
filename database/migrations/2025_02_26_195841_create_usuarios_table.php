<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 50);
            $table->string("senha", 60);
            $table->enum("cargo", ['root', 'admin', 'secretaria', 'pedagogia']);
            $table->enum("estatus", ['OFF', 'ON']);
            $table->timestamps();
        });

        DB::table('usuarios')->insert([
            'nome'=>'root',
            'senha'=>bcrypt('123456'),
            'cargo'=>'root']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
