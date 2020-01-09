@extends('admin.layout.layout')

@section('title', 'Gestionar | Estudiantes')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-estudiante" class="table table-bordered" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">ID Tarjeta</th>
                    <th style="text-align:center;">Matrícula</th>
                    <th style="text-align:center;">Nombre completo</th>
                    <th style="text-align:center;">Fecha de nacimiento</th>
                    <th style="text-align:center;">CURP</th>
                    <th style="text-align:center;">Escolaridad</th>
                    <th style="text-align:center;">Tutor(es)</th>
                    <th style="width: 15%; text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="text-align:center;">123456789</th>
                    <th style="text-align:center;">2017113010</th>
                    <th style="text-align:center;">Jorge Coronel González</th>
                    <th style="text-align:center;">1998/08/29</th>
                    <th style="text-align:center;">COGJ980829HQTRNR08</th>
                    <th style="text-align:center;">1° A</th>
                    <th style="text-align:center;">Tutor <i class="fa fa-times"></i></th>
                    <th style="text-align:center;">
                        <button class="btn btn-outline-primary btn-circle"><i class="fa fa-users"></i></button>
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
    <script src="{{ asset('dist/js/estudiante/gestionar.js') }}"></script>
@endsection