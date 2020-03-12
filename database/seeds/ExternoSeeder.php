<?php

use Illuminate\Database\Seeder;
use App\Externo;

class ExternoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Externo::create([
            'nombre' => 'Juan De Dios Pantoja',
            'telefono' => '4422334455',
            'fecha' => date('Y/m/d'),
            'motivo' => 'Motivo 1',
            'personas' => 2,
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        Externo::create([
            'nombre' => 'Íker Aguilar Pérez',
            'telefono' => '4422334455',
            'fecha' => date('Y/m/d'),
            'motivo' => 'Motivo 2',
            'personas' => 2,
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        Externo::create([
            'nombre' => 'Ignacio Pérez Rico',
            'telefono' => '4422334455',
            'fecha' => date('Y/m/d'),
            'motivo' => 'Motivo 3',
            'personas' => 2,
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
    }
}
