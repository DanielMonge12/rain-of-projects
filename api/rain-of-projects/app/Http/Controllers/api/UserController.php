<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function list() {
        $users = User::all();

        return response()->json($users);
    }

    public function item($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            // Agrega validaciones para los demás campos como surname, phone, image, status, level_id, etc.
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Asegúrate de encriptar la contraseña
            // Agrega los demás campos según sea necesario
        ]);

        if ($user) {
            return response()->json(['message' => 'User created successfully'], 201);
        } else {
            return response()->json(['error' => 'Error creating user'], 500);
        }
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id,
            // Agrega validaciones para los demás campos que deseas actualizar
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            // Actualiza los demás campos según sea necesario
        ]);

        return response()->json(['message' => 'User updated successfully'], 200);
    }

    public function delete($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
