<?php

use Illuminate\Database\Seeder;
use App\Registro;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha_actual = date('Y-m-d');
        $hora_actual = date('G:i:s');
        Registro::create([
            'fecha' => $fecha_actual,
            'hora_entrada' => $hora_actual,
            'hora_salida' => $hora_actual,
            'matricula' => '2020113001'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha_actual."+ 1 days")),
            'hora_entrada' => $hora_actual,
            'hora_salida' => $hora_actual,
            'matricula' => '2020113001'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha_actual."+ 2 days")),
            'hora_entrada' => $hora_actual,
            'hora_salida' => $hora_actual,
            'matricula' => '2020113001'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha_actual."+ 3 days")),
            'hora_entrada' => $hora_actual,
            'hora_salida' => $hora_actual,
            'matricula' => '2020113001'
        ]);
    }
}