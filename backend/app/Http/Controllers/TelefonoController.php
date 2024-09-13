<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    // Mostrar todos los teléfonos de un contacto específico
    public function index($contactoId)
    {
        $telefonos = Telefono::where('contacto_id', $contactoId)->get();
        return response()->json($telefonos);
    }

    // Crear un nuevo teléfono para un contacto
    public function store(Request $request, $contactoId)
    {
        $validatedData = $request->validate([
            'numero' => 'required|string|max:20',
        ]);

        $telefono = new Telefono($validatedData);
        $telefono->contacto_id = $contactoId;
        $telefono->save();

        return response()->json($telefono, 201);
    }

    // Actualizar un teléfono
    public function update(Request $request, $id)
    {
        $telefono = Telefono::find($id);
        if (!$telefono) {
            return response()->json(['error' => 'Teléfono no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'numero' => 'required|string|max:20',
        ]);

        $telefono->update($validatedData);
        return response()->json($telefono);
    }

    // Eliminar un teléfono
    public function destroy($id)
    {
        $telefono = Telefono::find($id);
        if (!$telefono) {
            return response()->json(['error' => 'Teléfono no encontrado'], 404);
        }

        $telefono->delete();
        return response()->json(['message' => 'Teléfono eliminado con éxito']);
    }
}
