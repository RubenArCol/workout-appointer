@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Gestión de Usuarios</h2>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse mb-6">
            <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border-b">Nombre</th>
                <th class="p-3 border-b">Correo</th>
                <th class="p-3 border-b">Rol Actual</th>
                <th class="p-3 border-b">Cambiar Rol</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $user)
                <tr class="border-b">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">
                        @foreach($user->getRoleNames() as $role)
                            <span class="bg-gray-800 text-white px-2 py-1 rounded text-sm">{{ $role }}</span>
                        @endforeach
                    </td>
                    <td class="p-3">
                        <form action="{{ route('usuarios.update.permissions', $user->id) }}" method="POST" class="flex space-x-2">
                            @csrf
                            <select name="rol" class="bg-gray-800 text-white px-3 py-1 rounded">
                                <option value="usuario" {{ $user->hasRole('usuario') ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                            </select>
                            <button type="submit" onclick="return confirm('¿Estás seguro de cambiar el rol?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Actualizar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
