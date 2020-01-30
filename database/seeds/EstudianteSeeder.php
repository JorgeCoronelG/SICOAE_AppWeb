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
        $estudiante = Estudiante::create([
            'matricula' => '2020113001',
            'tarjeta' => 'ABC001',
            'nombre' => 'Estudiante 1',
            'estatus' => 1,
            'grado' => 1,
            'grupo' => 'A',
            'tutor' => 1
        ]);
        $estudiante->getRegistro()->create([
            'fecha' => date('Y/m/d'),
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        $estudiante = Estudiante::create([
            'matricula' => '2020113002',
            'tarjeta' => 'ABC002',
            'nombre' => 'Estudiante 2',
            'estatus' => 1,
            'grado' => 2,
            'grupo' => 'B',
            'tutor' => 1
        ]);
        $estudiante->getRegistro()->create([
            'fecha' => date('Y/m/d'),
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        $estudiante = Estudiante::create([
            'matricula' => '2020113003',
            'tarjeta' => 'ABC003',
            'nombre' => 'Estudiante 3',
            'estatus' => 1,
            'grado' => 2,
            'grupo' => 'B',
            'tutor' => 2
        ]);
        $estudiante->getRegistro()->create([
            'fecha' => date('Y/m/d'),
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        Estudiante::create([
            'matricula' => '2020113004',
            'tarjeta' => 'ABC004',
            'nombre' => 'Estudiante 4',
            'estatus' => 1,
            'grado' => 1,
            'grupo' => 'A',
            'tutor' => 2
        ]);
        Estudiante::create([
            'matricula' => '2020113005',
            'tarjeta' => 'ABC005',
            'nombre' => 'Estudiante 5',
            'estatus' => 1,
            'grado' => 3,
            'grupo' => 'C',
            'tutor' => 3
        ]);
    }
}
