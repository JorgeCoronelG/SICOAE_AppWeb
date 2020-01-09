@extends('vigilante.layout.layout')

@section('title', 'Salida | Alumnos')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-estudiante" class="table table-bordered" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Referencia</th>
                    <th style="text-align:center;">Matrícula</th>
                    <th style="text-align:center;">Nombre del estudiante</th>
                    <th style="text-align:center;">Persona quien recoge</th>
                    <th style="text-align:center;">Teléfono tutor(es)</th>
                    <th style="width: 15%; text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="text-align:center;">20191125LMF83901</th>
                    <th style="text-align:center;">2016313027</th>
                    <th style="text-align:center;">Pedro Huerta Martinez</th>
                    <th style="text-align:center;">María Martínez Álvarez</th>
                    <th style="text-align:center;">4421223344</th>
                    <th style="width: 15%; text-align:center;">
                        <button class="btn btn-outline-primary btn-circle"><i class="fa fa-check"></i></button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('dist/js/referencia/salida.js') }}"></script>
@endsection