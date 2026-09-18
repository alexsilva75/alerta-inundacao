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
        //
        Schema::create('incidentes', function (Blueprint $table){
            $table->id();
            $table->string('titulo', 150);
            $table->text('descricao');
            $table->timestamp('data_hora');
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->double('latitude');
            $table->double('longitude');
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('incidentes');
    }
};
