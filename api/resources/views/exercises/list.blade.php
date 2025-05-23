@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-black">Lista de Ejercicios</h2>

        @if(session('success'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800">
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase">Nombre</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase">Tipo</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase">Grupo Muscular</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase">Descripción</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($ejercicios as $ejercicio)
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-900">{{ $ejercicio->nombre }}</td>
                    <td class="px-4 py-2 text-sm text-gray-900 capitalize">{{ $ejercicio->tipo }}</td>
                    <td class="px-4 py-2 text-sm text-gray-900 capitalize">{{ $ejercicio->grupo_muscular }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $ejercicio->descripcion }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">No hay ejercicios registrados.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
