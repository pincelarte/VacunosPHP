<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Dentro del archivo add_establecimiento_id_to_vacunos_table.php

    public function up(): void
    {
        Schema::table('vacunos', function (Blueprint $table) {
            // Añade una columna de clave foránea que apunta a la tabla establecimientos
            $table->foreignId('establecimiento_id')->constrained()->onDelete('cascade')->after('caravana');
        });
    }

    public function down(): void
    {
        Schema::table('vacunos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('establecimiento_id');
        });
    }
};
