<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Dentro del archivo create_establecimientos_table.php

    public function up(): void
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            // Clave foránea que asocia este establecimiento al usuario dueño
            // El on Delete('cascade') significa que si borras al usuario, se borran sus establecimientos.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('direccion')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('establecimientos');
    }
};
