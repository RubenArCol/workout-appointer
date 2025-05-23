<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('users.list', compact('usuarios'));
    }

    public function updatePermissions(Request $request, User $user)
    {
        $request->validate([
            'rol' => 'required|in:usuario,admin',
        ]);

        $user->syncRoles([$request->rol]);

        return redirect()->back()->with('success', 'Permisos actualizados correctamente.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'meta' => 'required|in:fuerza,definicion',
            'rol' => 'required|in:usuario,admin',
        ]);

        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'meta' => $request->meta,
        ]);

        $user->assignRole($request->rol);

        return redirect()->back()->with('success', 'Usuario creado correctamente.');
    }
}
