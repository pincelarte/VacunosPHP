<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Establecimiento; // <-- 1. NUEVO: Importa el modelo Establecimiento
use App\Models\Pesaje;          // <-- 1. NUEVO: Importa el modelo Pesaje

class Vacuno extends Model
{
    use HasFactory;

    // PROPIEDAD $fillable: Ahora incluye la clave foránea 'establecimiento_id'
    protected $fillable = [
        'caravana',
        'tipo',
        'raza',
        'fecha_nacimiento',
        'edad_estimada_meses',
        'peso_kg',
        'historial_notas',
        'establecimiento_id', // <--- 2. CAMBIO CLAVE: Clave foránea añadida
    ];

    // 3. NUEVA RELACIÓN: Un Vacuno pertenece a un Establecimiento (Many-to-One)
    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class);
    }

    // 3. NUEVA RELACIÓN: Un Vacuno tiene muchos Pesajes (One-to-Many)
    public function pesajes()
    {
        return $this->hasMany(Pesaje::class);
    }
}
