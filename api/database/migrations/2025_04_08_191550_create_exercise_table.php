<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exercise', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->string('grupo_muscular');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        DB::table('exercise')->insert([
            // PECHO - FUERZA
            ['nombre' => 'Press de banca', 'tipo' => 'fuerza', 'grupo_muscular' => 'pecho', 'descripcion' => 'Ejercicio básico de empuje con barra.'],
            ['nombre' => 'Press inclinado con mancuernas', 'tipo' => 'fuerza', 'grupo_muscular' => 'pecho', 'descripcion' => 'Trabaja la parte superior del pecho.'],
            ['nombre' => 'Press declinado', 'tipo' => 'fuerza', 'grupo_muscular' => 'pecho', 'descripcion' => 'Para enfocar el trabajo en la parte inferior.'],
        
            // PECHO - DEFINICIÓN
            ['nombre' => 'Aperturas con mancuernas', 'tipo' => 'definicion', 'grupo_muscular' => 'pecho', 'descripcion' => 'Ejercicio de aislamiento para definir el pecho.'],
            ['nombre' => 'Crossover en polea', 'tipo' => 'definicion', 'grupo_muscular' => 'pecho', 'descripcion' => 'Ejercicio de tensión continua para definición.'],
            ['nombre' => 'Flexiones', 'tipo' => 'definicion', 'grupo_muscular' => 'pecho', 'descripcion' => 'Ejercicio clásico de peso corporal.'],
        
            // PIERNA - FUERZA
            ['nombre' => 'Sentadilla con barra', 'tipo' => 'fuerza', 'grupo_muscular' => 'pierna', 'descripcion' => 'Ejercicio compuesto para fuerza en piernas.'],
            ['nombre' => 'Prensa de piernas', 'tipo' => 'fuerza', 'grupo_muscular' => 'pierna', 'descripcion' => 'Máquina para empuje pesado.'],
            ['nombre' => 'Peso muerto rumano', 'tipo' => 'fuerza', 'grupo_muscular' => 'pierna', 'descripcion' => 'Para femorales y glúteos.'],
        
            // PIERNA - DEFINICIÓN
            ['nombre' => 'Zancadas con mancuernas', 'tipo' => 'definicion', 'grupo_muscular' => 'pierna', 'descripcion' => 'Excelente para aislar y definir piernas.'],
            ['nombre' => 'Extensión de cuádriceps', 'tipo' => 'definicion', 'grupo_muscular' => 'pierna', 'descripcion' => 'Aislamiento de cuádriceps en máquina.'],
            ['nombre' => 'Curl femoral', 'tipo' => 'definicion', 'grupo_muscular' => 'pierna', 'descripcion' => 'Aísla la parte posterior del muslo.'],

            // HOMBRO - FUERZA
            ['nombre' => 'Press militar con barra', 'tipo' => 'fuerza', 'grupo_muscular' => 'hombro', 'descripcion' => 'Ejercicio principal de empuje vertical.'],
            ['nombre' => 'Press Arnold', 'tipo' => 'fuerza', 'grupo_muscular' => 'hombro', 'descripcion' => 'Variante para trabajar todos los deltoides.'],
            ['nombre' => 'Elevaciones frontales con barra', 'tipo' => 'fuerza', 'grupo_muscular' => 'hombro', 'descripcion' => 'Enfocado en deltoides anteriores.'],

            // HOMBRO - DEFINICIÓN
            ['nombre' => 'Elevaciones frontales con disco', 'tipo' => 'definicion', 'grupo_muscular' => 'hombro', 'descripcion' => 'Aislamiento frontal con carga continua.'],
            ['nombre' => 'Pájaros con mancuernas', 'tipo' => 'definicion', 'grupo_muscular' => 'hombro', 'descripcion' => 'Para deltoides posteriores.'],
            ['nombre' => 'Elevaciones laterales con mancuernas', 'tipo' => 'definicion', 'grupo_muscular' => 'hombro', 'descripcion' => 'Aislamiento de deltoides laterales.'],

            // BRAZOS - FUERZA
            ['nombre' => 'Curl con barra Z', 'tipo' => 'fuerza', 'grupo_muscular' => 'brazos', 'descripcion' => 'Fuerza en bíceps con barra curva.'],
            ['nombre' => 'Press francés con barra', 'tipo' => 'fuerza', 'grupo_muscular' => 'brazos', 'descripcion' => 'Trabajo de tríceps en banco plano.'],
            ['nombre' => 'Fondos en paralelas', 'tipo' => 'fuerza', 'grupo_muscular' => 'brazos', 'descripcion' => 'Ejercicio compuesto para fuerza en tríceps y pectoral.'],

            // BRAZOS - DEFINICIÓN
            ['nombre' => 'Curl concentrado', 'tipo' => 'definicion', 'grupo_muscular' => 'brazos', 'descripcion' => 'Aislamiento para definición de bíceps.'],
            ['nombre' => 'Extensiones de tríceps en cuerda', 'tipo' => 'definicion', 'grupo_muscular' => 'brazos', 'descripcion' => 'Alta activación para la cabeza lateral del tríceps.'],
            ['nombre' => 'Patada de tríceps con mancuerna', 'tipo' => 'definicion', 'grupo_muscular' => 'brazos', 'descripcion' => 'Ejercicio de aislamiento con control total.'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise');
    }
};
