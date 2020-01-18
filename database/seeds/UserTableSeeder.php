<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'correo' => 'administrador@gmail.com',
            'clave' => bcrypt('password'),
            'tipo_usuario' => 1,
            'remember_token' => '',
            'estatus' => 1
        ]);
    }
}
