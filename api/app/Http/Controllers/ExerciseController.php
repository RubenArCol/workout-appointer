<?php

namespace App\Http\Controllers;

use App\Models\exercise;
use Illuminate\Http\Request;

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
}