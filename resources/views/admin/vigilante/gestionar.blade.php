@extends('admin.layout.layout')

@section('title', 'Gestionar | Vigilantes')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-vigilante" class="table table-bordered" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">Teléfono</th>
                    <th style="text-align:center;">Correo</th>
                    <th style="width: 15%; text-align:center;">Acciones</th>                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="text-align:center;">Juan Pérez</th>
                    <th style="text-align:center;">4530187860</th>
                    <th style="text-align:center;">vigilante@hotmail.com</th>
                    <th style="width: 15%; text-align:center;">
                        <button class="btn btn-outline-primary btn-circle"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-outline-danger btn-circle"><i class="fa fa-trash"></i></button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/vigilante/gestionar.js') }}"></script>
@endsection