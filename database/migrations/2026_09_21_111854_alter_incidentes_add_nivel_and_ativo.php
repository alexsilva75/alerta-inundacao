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
        //
        Schema::table('incidentes', function(Blueprint $table){
            $table->string('nivel_severidade')->default('Baixo');
            $table->boolean('ativo')->default(true);
        });

        DB::statement('ALTER TABLE incidentes ADD CONSTRAINT chk_nivel_severidade_valido CHECK (nivel_severidade IN ("Baixo", "Moderado", "Alto"))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('incidentes', function(Blueprint $table){
            DB::statement('ALTER TABLE incidentes DROP CONSTRAINT chk_nivel_severidade_valido');
            $table->dropColumn('nivel_severidade');
            $table->dropColumn('ativo');
        });
    }
};
