@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-surface p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-black">Crear Nuevo Usuario</h2>
        <form action="{{-- route('usuarios.store') --}}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nombre" class="block mb-2 text-sm font-semibold text-black">Nombre</label>
                <input type="text" name="nombre" id="nombre"
                       class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-semibold text-black">Correo Electrónico</label>
                <input type="email" name="email" id="email"
                       class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
            </div>

            <div>
                <label for="password" class="block mb-2 text-sm font-semibold text-black">Contraseña</label>
                <input type="password" name="password" id="password"
                       class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
            </div>

            <div>
                <label for="meta" class="block mb-2 text-sm font-semibold text-black">Meta del Usuario</label>
                <select name="meta" id="meta"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
                    <option value="fuerza">Fuerza</option>
                    <option value="definicion">Definición</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 transition font-semibold py-2 rounded-lg text-white shadow-md">
                    Crear Usuario
                </button>
            </div>
        </form>
    </div>
@endsection
