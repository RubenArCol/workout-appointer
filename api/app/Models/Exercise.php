<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercise';

    protected $fillable = [
        'nombre',
        'tipo',
        'grupo_muscular',
        'descripcion',
    ];
}
