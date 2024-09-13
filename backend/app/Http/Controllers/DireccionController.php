<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    // Mostrar todas las direcciones de un contacto específico
    public function index($contactoId)
    {
        $direcciones = Direccion::where('contacto_id', $contactoId)->get();
        return response()->json($direcciones);
    }

    // Crear una nueva dirección para un contacto
    public function store(Request $request, $contactoId)
    {
        $validatedData = $request->validate([
            'calle' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:20',
            'pais' => 'required|string|max:255',
        ]);

        $direccion = new Direccion($validatedData);
        $direccion->contacto_id = $contactoId;
        $direccion->save();

        return response()->json($direccion, 201);
    }

    // Actualizar una dirección
    public function update(Request $request, $id)
    {
        $direccion = Direccion::find($id);
        if (!$direccion) {
            return response()->json(['error' => 'Dirección no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'calle' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:20',
            'pais' => 'required|string|max:255',
        ]);

        $direccion->update($validatedData);
        return response()->json($direccion);
    }

    // Eliminar una dirección
    public function destroy($id)
    {
        $direccion = Direccion::find($id);
        if (!$direccion) {
            return response()->json(['error' => 'Dirección no encontrada'], 404);
        }

        $direccion->delete();
        return response()->json(['message' => 'Dirección eliminada con éxito']);
    }
}
