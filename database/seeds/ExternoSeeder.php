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
            'nombre' => 'Externo 1',
            'telefono' => '4422334455',
            'fecha' => date('Y/m/d'),
            'motivo' => 'Motivo 1',
            'personas' => 2,
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        Externo::create([
            'nombre' => 'Externo 2',
            'telefono' => '4422334455',
            'fecha' => date('Y/m/d'),
            'motivo' => 'Motivo 2',
            'personas' => 2,
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
        Externo::create([
            'nombre' => 'Externo 3',
            'telefono' => '4422334455',
            'fecha' => date('Y/m/d'),
            'motivo' => 'Motivo 3',
            'personas' => 2,
            'hora_entrada' => date('G:i:s'),
            'hora_salida' => null
        ]);
    }
}
