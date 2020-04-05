<?php

use Illuminate\Database\Seeder;
use App\Estudiante;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estudiante::create([
            'matricula' => '2020113001',
            'tarjeta' => '9E0E3AD5',
            'nombre' => 'Alexa Coronel Salinas',
            'estatus' => 1,
            'grado' => 1,
            'grupo' => 'A',
            'tutor' => 1
        ]);
        Estudiante::create([
            'matricula' => '2020113002',
            'tarjeta' => 'D9308C98',
            'nombre' => 'David Coronel Salinas',
            'estatus' => 1,
            'grado' => 2,
            'grupo' => 'B',
            'tutor' => 1
        ]);
        Estudiante::create([
            'matricula' => '2020113003',
            'tarjeta' => 'ABC003',
            'nombre' => 'David Alejandro Gómez Luna',
            'estatus' => 1,
            'grado' => 2,
            'grupo' => 'B',
            'tutor' => 2
        ]);
        Estudiante::create([
            'matricula' => '2020113004',
            'tarjeta' => 'ABC004',
            'nombre' => 'Karina Fonseca Reyes',
            'estatus' => 1,
            'grado' => 1,
            'grupo' => 'A',
            'tutor' => 2
        ]);
        $estudiante = Estudiante::create([
            'matricula' => '2020113005',
            'tarjeta' => 'ABC005',
            'nombre' => 'Pablo Escobar Díaz',
            'estatus' => 1,
            'grado' => 3,
            'grupo' => 'C',
            'tutor' => 3
        ]);
        /*$estudiante->getReferencia()->create([
            'id' => '20200215LKSM',
            'fecha' => '2020-03-12',
            'persona' => 'Pedro Escobar Martínez',
            'estatus' => 1,
        ]);*/
    }
}
