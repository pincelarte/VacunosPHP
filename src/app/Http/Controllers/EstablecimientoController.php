<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstablecimientoController extends Controller
{
    /**
     * Muestra la lista de establecimientos del usuario actual.
     */
    public function index()
    {
        $establecimientos = Auth::user()->establecimientos;
        return view('establecimientos.index', compact('establecimientos'));
    }

    /**
     * Muestra el formulario para crear un nuevo establecimiento.
     */
    public function create()
    {
        return view('establecimientos.create');
    }

    /**
     * Guarda un nuevo establecimiento en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        Auth::user()->establecimientos()->create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('establecimientos.index')
            ->with('success', 'Establecimiento creado con éxito.');
    }
    /**
     * Muestra los detalles de un establecimiento.
     */
    public function show(Establecimiento $establecimiento)
    {
        // Autorización
        if (Auth::id() !== $establecimiento->user_id) {
            abort(403, 'No tienes permiso para ver este establecimiento.');
        }

        return view('establecimientos.show', compact('establecimiento'));
    }

    // ------------------------------------------------------------------
    // MÉTODOS AÑADIDOS PARA EDICIÓN Y ELIMINACIÓN
    // ------------------------------------------------------------------

    // ------------------------------------------------------------------
    // MÉTODOS AÑADIDOS PARA EDICIÓN Y ELIMINACIÓN
    // ------------------------------------------------------------------

    /**
     * Muestra el formulario para editar un establecimiento.
     */
    public function edit(Establecimiento $establecimiento)
    {
        // 1. Autorización: Verifica que el usuario logueado sea el dueño
        if (Auth::id() !== $establecimiento->user_id) {
            abort(403, 'No tienes permiso para editar este establecimiento.');
        }

        // 2. Retorna la vista de edición
        return view('establecimientos.edit', compact('establecimiento'));
    }

    /**
     * Actualiza un establecimiento en la base de datos.
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        // 1. Autorización
        if (Auth::id() !== $establecimiento->user_id) {
            abort(403, 'No tienes permiso para actualizar este establecimiento.');
        }

        // 2. Validación
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        // 3. Actualización
        $establecimiento->update($request->only(['nombre', 'direccion']));

        // 4. Redirección
        return redirect()->route('establecimientos.index')
            ->with('success', 'Establecimiento actualizado con éxito.');
    }

    /**
     * Elimina un establecimiento de la base de datos.
     */
    public function destroy(Establecimiento $establecimiento)
    {
        // 1. Autorización
        if (Auth::id() !== $establecimiento->user_id) {
            abort(403, 'No tienes permiso para eliminar este establecimiento.');
        }

        // 2. Eliminación
        $establecimiento->delete();

        // 3. Redirección
        return redirect()->route('establecimientos.index')
            ->with('success', 'Establecimiento eliminado con éxito.');
    }
}
