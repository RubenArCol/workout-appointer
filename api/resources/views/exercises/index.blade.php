@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-surface p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-black">Crear Nuevo Entrenamiento</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('exercises.store') }}" method="POST" class="space-y-5">
        @csrf

            <div>
                <label for="nombre" class="block mb-2 text-sm font-semibold text-black">Nombre del Entrenamiento</label>
                <input type="text" name="nombre" id="nombre"
                       class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
            </div>

            <div>
                <label for="grupo_muscular" class="block mb-2 text-sm font-semibold text-black">Grupo Muscular</label>
                <select name="grupo_muscular" id="grupo_muscular"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
                    <option value="pecho">Pecho</option>
                    <option value="espalda">Espalda</option>
                    <option value="piernas">Piernas</option>
                    <option value="hombro">Hombro</option>
                    <option value="brazos">Brazos</option>
                </select>
            </div>


            <div>
                <label for="descripcion" class="block mb-2 text-sm font-semibold text-black">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                          class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none"></textarea>
            </div>

            <div>
                <label for="duracion" class="block mb-2 text-sm font-semibold text-black">Duración (minutos)</label>
                <input type="number" name="duracion" id="duracion" min="1"
                       class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
            </div>

            <div>
                <label for="tipo" class="block mb-2 text-sm font-semibold text-black">Tipo de Entrenamiento</label>
                <select name="tipo" id="tipo"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-red-600 focus:outline-none">
                    <option value="fuerza">Fuerza</option>
                    <option value="definicion">Definición</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 transition font-semibold py-2 rounded-lg text-white shadow-md">
                    Crear Entrenamiento
                </button>
            </div>
        </form>
    </div>
@endsection
