<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Añadir este 'use'
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacuno;        // <-- Importa el modelo Vacuno
use App\Models\User;         // <-- Importa el modelo User

class Establecimiento extends Model
{
    use HasFactory; // <-- Añadir aquí

    // Propiedad $fillable: Define los campos seguros para guardar
    protected $fillable = [
        'user_id',
        'nombre',
        'direccion'
    ];

    // 1. RELACIÓN: Un Establecimiento pertenece a un Usuario (Many-to-One)
    // Busca la clave foránea 'user_id' en esta tabla.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 2. RELACIÓN: Un Establecimiento tiene muchos Vacunos (One-to-Many)
    // Busca la clave foránea 'establecimiento_id' en la tabla 'vacunos'.
    public function vacunos()
    {
        return $this->hasMany(Vacuno::class);
    }
}
