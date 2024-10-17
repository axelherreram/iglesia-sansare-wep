<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    // Mostrar el perfil del usuario autenticado
    public function show()
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        return view('user-profile', compact('user'));
    }

    // Actualizar la información del usuario autenticado
    public function update(Request $request)
    {
        $user = auth()->user(); // Obtener el usuario autenticado

        // Validación de los datos enviados por el formulario
        $data = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6', // Contraseña opcional
        ], [
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.', // Mensaje de error personalizado
        ]);

        // Verificar si se proporciona una nueva contraseña
        if (!empty($data['password'])) {
            // Encriptar la contraseña
            $data['password'] = bcrypt($data['password']);
        } else {
            // Si no se proporciona, eliminar el campo de la actualización
            unset($data['password']);
        }

        // Actualizar la información del usuario
        $user->update($data);

        // Redirigir de nuevo al perfil con un mensaje de éxito
        return redirect()->route('user.profile')->with('success', 'Perfil actualizado con éxito.');
    }
}
