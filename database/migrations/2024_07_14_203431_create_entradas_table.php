<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();                               // Da entrada
            $table->integer('codigo');                  // Da entrada
            $table->string('nomeProduto');
            $table->integer('quantidadeProduto');
            $table->float('custoUnitario');
            $table->float('custoTotal');
            $table->date('dataEntrada');
            $table->integer('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            // EXEMPLO
            // $table->integer('id_fornecedor');
            // $table->foreign('id_fornecedor')->references('id')->on('fornecedors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
