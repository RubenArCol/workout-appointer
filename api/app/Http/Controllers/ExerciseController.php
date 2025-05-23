<?php

namespace App\Http\Controllers;

use App\Models\exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        $query = exercise::query();

        if ($request->has('meta')) {
            $query->where('tipo', $request->meta);
        }

        if ($request->has('grupo_muscular')) {
            $query->where('grupo_muscular', $request->grupo_muscular);
        }

        return response()->json($query->get());
    }

    public function generarEntrenamiento($meta)
    {
        $grupos = ['pecho', 'espalda', 'piernas', 'hombro', 'brazos'];
        $entrenamiento = [];

        foreach ($grupos as $grupo) {
            $ejercicio = \App\Models\Exercise::where('tipo', $meta)
                        ->where('grupo_muscular', $grupo)
                        ->inRandomOrder()
                        ->first();

            if ($ejercicio) {
                $entrenamiento[] = $ejercicio;
            }
        }

        return response()->json($entrenamiento);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'grupo_muscular' => 'required|string',
            'tipo' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        Exercise::create($validated);

        return redirect()->back()->with('success', 'Entrenamiento creado correctamente');
    }

    public function listView()
    {
        $ejercicios = Exercise::all();
        return view('exercises.list', compact('ejercicios'));
    }
}
