<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Importar el facade de autenticación

class EstablecimientoController extends Controller
{
    /**
     * Muestra la lista de establecimientos del usuario actual.
     */
    public function index()
    {
        // 1. Obtener solo los establecimientos del usuario que está logueado
        $establecimientos = Auth::user()->establecimientos;

        // 2. Retornar la vista 'index' y pasarle los datos
        return view('establecimientos.index', compact('establecimientos'));
    }

    /**
     * Muestra el formulario para crear un nuevo establecimiento.
     */
    public function create()
    {
        // Retorna la vista Blade que contiene el formulario HTML
        return view('establecimientos.create');
    }

    /**
     * Guarda un nuevo establecimiento en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        // 2. Creación del registro: Asociando el Establecimiento al usuario logueado
        Establecimiento::create([
            'user_id' => Auth::id(), // Clave foránea tomada automáticamente del usuario logueado
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
        ]);

        // 3. Redirección
        return redirect()->route('establecimientos.index')
            ->with('success', 'Establecimiento creado con éxito.');
    }

    // Los métodos show, edit, update y destroy quedan por ahora vacíos.
    // Los completaremos si los necesitas para la edición o eliminación.
}
