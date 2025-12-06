<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- Línea añadida (Buena Práctica)
use Illuminate\Database\Eloquent\Model;

class Vacuno extends Model
{
    // Añadimos el trait HasFactory para usar factorías si las necesitas
    use HasFactory;
    
    // PROPIEDAD $fillable: Define qué campos son seguros para rellenar
    protected $fillable = [
        'caravana',
        'tipo',
        'raza',
        'fecha_nacimiento',
        'edad_estimada_meses',
        'peso_kg',
        'historial_notas',
    ];

}