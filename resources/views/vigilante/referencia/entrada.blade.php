@extends('vigilante.layout.layout')

@section('title', 'Entradas | Alumnos')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-estudiante" class="table table-bordered" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Referencia</th>
                    <th style="text-align:center;">Matrícula</th>
                    <th style="text-align:center;">Nombre del estudiante</th>
                    <th style="width: 15%; text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/referencia/entrada.js') }}"></script>
@endsection