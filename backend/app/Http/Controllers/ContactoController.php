<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Direccion;
use App\Models\Email;
use App\Models\Telefono;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // Mostrar todos los contactos
    public function index(Request $request)
    {
        // Define cuántos contactos mostrar por página (puedes ajustar este número)
        $perPage = $request->input('per_page', 10); // Default to 10 per page

        $contactos = Contacto::with(['direcciones', 'emails', 'telefonos'])->paginate($perPage);

        return response()->json($contactos);
    }

    // Mostrar un contacto por ID
    public function show($id)
    {
        $contacto = Contacto::with(['direcciones', 'emails', 'telefonos'])->find($id);
        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }
        return response()->json($contacto);
    }

    // Crear un nuevo contacto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'notas' => 'nullable|string',
            'fecha_de_cumpleanios' => 'required|date',
            'pagina_web' => 'nullable|url',
            'empresa' => 'nullable|string|max:255',
            'direcciones' => 'array',
            'emails' => 'array',
            'telefonos' => 'array',
        ]);

        // Crear el contacto
        $contacto = Contacto::create($validatedData);

        // Agregar direcciones
        if (isset($validatedData['direcciones'])) {
            foreach ($validatedData['direcciones'] as $direccion) {
                $contacto->direcciones()->create($direccion);
            }
        }

        // Agregar emails
        if (isset($validatedData['emails'])) {
            foreach ($validatedData['emails'] as $email) {
                $contacto->emails()->create($email);
            }
        }

        // Agregar teléfonos
        if (isset($validatedData['telefonos'])) {
            foreach ($validatedData['telefonos'] as $telefono) {
                $contacto->telefonos()->create($telefono);
            }
        }

        return response()->json($contacto->load(['direcciones', 'emails', 'telefonos']), 201);
    }

    // Actualizar un contacto
    public function update(Request $request, $id)
    {
        $contacto = Contacto::find($id);
        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'notas' => 'nullable|string',
            'fecha_de_cumpleaños' => 'required|date',
            'pagina_web' => 'nullable|url',
            'empresa' => 'nullable|string|max:255',
            'direcciones' => 'array',
            'emails' => 'array',
            'telefonos' => 'array',
        ]);

        // Actualizar el contacto
        $contacto->update($validatedData);

        // Actualizar direcciones, emails y teléfonos (puedes adaptar esta lógica según tus necesidades)
        if (isset($validatedData['direcciones'])) {
            $contacto->direcciones()->delete(); // Elimina las direcciones anteriores
            foreach ($validatedData['direcciones'] as $direccion) {
                $contacto->direcciones()->create($direccion);
            }
        }

        if (isset($validatedData['emails'])) {
            $contacto->emails()->delete();
            foreach ($validatedData['emails'] as $email) {
                $contacto->emails()->create($email);
            }
        }

        if (isset($validatedData['telefonos'])) {
            $contacto->telefonos()->delete();
            foreach ($validatedData['telefonos'] as $telefono) {
                $contacto->telefonos()->create($telefono);
            }
        }

        return response()->json($contacto->load(['direcciones', 'emails', 'telefonos']));
    }

    // Eliminar un contacto
    public function destroy($id)
    {
        $contacto = Contacto::find($id);
        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }

        $contacto->delete();
        return response()->json(['message' => 'Contacto eliminado con éxito']);
    }
}
