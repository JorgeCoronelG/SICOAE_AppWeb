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
        $fecha = date('Y-m-d', strtotime('2020-03-09'));
        $hora_entrada = date('G:i:s', strtotime('08:00:00'));
        $hora_salida = date('G:i:s', strtotime('12:30:00'));
        //Estudiante 1
        Registro::create([
            'fecha' => $fecha,
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113001'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 1 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113001'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 2 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113001'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 3 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113001'
        ]);
        //Estudiante 2
        Registro::create([
            'fecha' => $fecha,
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113002'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 1 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113002'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 2 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113002'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 4 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113002'
        ]);
        //Estudiante 3
        Registro::create([
            'fecha' => $fecha,
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113003'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 1 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113003'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 2 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113003'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 3 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113003'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 4 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113003'
        ]);
        //Estudiante 4
        Registro::create([
            'fecha' => $fecha,
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113004'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 1 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113004'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 3 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113004'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 4 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113004'
        ]);
        //Estudiante 5
        Registro::create([
            'fecha' => $fecha,
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113005'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 1 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113005'
        ]);
        Registro::create([
            'fecha' => date("Y-m-d",strtotime($fecha."+ 2 days")),
            'hora_entrada' => $hora_entrada,
            'hora_salida' => $hora_salida,
            'matricula' => '2020113005'
        ]);
    }
}