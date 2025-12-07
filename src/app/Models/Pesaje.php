<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacuno; // <-- Importa el modelo Vacuno

class Pesaje extends Model
{
    use HasFactory;

    // Propiedad $fillable: Define los campos seguros para guardar
    // Esto es crucial para poder registrar el peso.
    protected $fillable = [
        'vacuno_id',
        'peso_kg',
        'fecha_pesaje'
    ];

    // Propiedad $casts: Le dice a Laravel que convierta automáticamente el campo a un tipo
    // En este caso, asegura que 'fecha_pesaje' se maneje como un objeto de fecha/hora de PHP.
    protected $casts = [
        'fecha_pesaje' => 'date',
        'peso_kg' => 'decimal:2',
    ];

    // RELACIÓN: Un Pesaje pertenece a un Vacuno (Many-to-One)
    // Busca la clave foránea 'vacuno_id' en esta misma tabla.
    public function vacuno()
    {
        return $this->belongsTo(Vacuno::class);
    }
}
