<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    // Mostrar todos los correos de un contacto específico
    public function index($contactoId)
    {
        $emails = Email::where('contacto_id', $contactoId)->get();
        return response()->json($emails);
    }

    // Crear un nuevo correo para un contacto
    public function store(Request $request, $contactoId)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $email = new Email($validatedData);
        $email->contacto_id = $contactoId;
        $email->save();

        return response()->json($email, 201);
    }

    // Actualizar un correo
    public function update(Request $request, $id)
    {
        $email = Email::find($id);
        if (!$email) {
            return response()->json(['error' => 'Correo no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $email->update($validatedData);
        return response()->json($email);
    }

    // Eliminar un correo
    public function destroy($id)
    {
        $email = Email::find($id);
        if (!$email) {
            return response()->json(['error' => 'Correo no encontrado'], 404);
        }

        $email->delete();
        return response()->json(['message' => 'Correo eliminado con éxito']);
    }
}
