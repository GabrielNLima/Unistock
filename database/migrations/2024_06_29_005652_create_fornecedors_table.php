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
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('codigo');
            $table->string('cnpj');
            $table->date('dataFornecedor');
            $table->string('telefone');
            $table->timestamps();
        });

        // Schema::table('produtos', function(Blueprint $table){
        //     $table->unsignedBigInteger('fornecedor_id');
        //     $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('produtos', function(Blueprint $table){
        //     $table->dropForeign('produtos_fornecedor_id_foreign');
        //     $table->dropColumn('fornecedor_id');
        // });

        Schema::dropIfExists('fornecedors');
    }
};
