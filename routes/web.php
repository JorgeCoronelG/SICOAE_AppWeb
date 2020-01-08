<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::resource('usuario', 'UsuarioController');

Route::get('admin', 'AdminViewController@index');

//Rutas de ejemplo
/*
Route::get('hola', function(){
    return 'Hola mundo';
});

Route::get('usuario/{nombre}', function($nombre){
    return $nombre;
});

Route::get('usuario/{nombre}', function($nombre){
    return $nombre;
})->where('nombre', '[A-Za-z]+');

Route::get('id/{id}', function($id){
    return $id;
})->where('id', '[0-9]+');

Route::get('usuario/{nombre}/{id}', function($nombre, $id){
    return $nombre.','.$id;
})->where([
    'nombre' => '[A-Za-z]+',
    'id' => '[0-9]+'
]);

Route::get('usuario/{nombre?}', function($nombre='Invitado'){
    return $nombre;
});

Route::get('usuario/{nombre}/comentario/{comentario}', function($nombre,$comentario){
    return $nombre.', '.$comentario;
});

Route::get('prueba', function(){
    return 'Prueba ruta con nombre';
})->name('prueba-route');

Route::get('redirigir', function(){
    return redirect()->route('prueba-route');
});

Route::get('usuario/{nombre}', function($nombre){
    return $nombre;
})->name('usuario-nombre');

Route::get('redirigir-usuario', function(){
    return redirect()->route('usuario-nombre',['nombre' => 'Jorge']);
});

Route::redirect('/prueba3', '/prueba');

Route::resource('usuario', 'UsuarioController')->only([
    'index', 'show'
]);

Route::resource('usuario', 'UsuarioController')->only([
    'index', 'show'])->names([
        'index' => 'usuario.inicio',
        'show' => 'usuario.mostrar'
        ]);

Route::resource('usuario', 'UsuarioController')->except([
    'create', 'store', 'update', 'destroy'
]);

Route::get('url', 'Controller@function');
*/