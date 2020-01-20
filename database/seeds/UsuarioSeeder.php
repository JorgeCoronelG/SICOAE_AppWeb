<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioSeeder extends Seeder
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
            'estatus' => 1
        ]);
        $usuario = Usuario::create([
            'correo' => 'tutor_1@gmail.com',
            'clave' => bcrypt('password'),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $usuario->tutor()->create([
            'nombre' => 'Tutor 1',
            'telefono' => '4421223344'
        ]);
        $usuario = Usuario::create([
            'correo' => 'tutor_2@gmail.com',
            'clave' => bcrypt('password'),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $usuario->tutor()->create([
            'nombre' => 'Tutor 2',
            'telefono' => '4421223344'
        ]);
        $usuario = Usuario::create([
            'correo' => 'tutor_3@gmail.com',
            'clave' => bcrypt('password'),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $usuario->tutor()->create([
            'nombre' => 'Tutor 3',
            'telefono' => '4421223344'
        ]);
    }
}
