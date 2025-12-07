<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // <-- AQUÍ EMPIEZA EL CONTENIDO A REEMPLAZAR
    {
        Schema::create('vacunos', function (Blueprint $table) {
            $table->id();

            // 1. IDENTIFICADOR ÚNICO
            $table->string('caravana')->unique();

            // 2. TIPO / CATEGORÍA DEL ANIMAL
            $table->enum('tipo', ['ternero', 'ternera', 'vaquillona', 'novillo', 'madre', 'toro']);

            // 3. GESTIÓN DE LA EDAD (FLEXIBLE Y ROBUSTA)
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('edad_estimada_meses')->nullable();

            // 4. OTROS DATOS
            $table->decimal('peso_kg', 8, 2)->nullable();
            $table->text('historial_notas')->nullable();

            $table->timestamps();
        });
    } // <-- AQUÍ TERMINA EL CONTENIDO A REEMPLAZAR

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacunos');
    }
};
