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
        Schema::create('saidas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->integer('quantidadeProduto');
            $table->float('valorTotal');
            $table->date('dataSaida');
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
        Schema::dropIfExists('saidas');
    }
};
