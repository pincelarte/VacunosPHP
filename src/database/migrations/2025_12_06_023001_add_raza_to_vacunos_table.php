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
        Schema::table('vacunos', function (Blueprint $table) {
            // AÑADIMOS la nueva columna RAZA después de 'tipo'
            $table->string('raza')->nullable()->after('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacunos', function (Blueprint $table) {
            // ELIMINAMOS la columna si revertimos la migración
            $table->dropColumn('raza');
        });
    }
};
