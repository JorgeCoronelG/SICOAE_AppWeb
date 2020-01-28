@extends('admin.layout.layout')

@section('title', 'Histórico | Externos')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-externos" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Nombre completo</th>
                    <th style="text-align:center;">Telefono</th>
                    <th style="text-align:center;">Fecha</th>
                    <th style="text-align:center;">Horario</th>
                    <th style="text-align:center;">N° personas</th>
                    <th style="text-align:center;">Motivo</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/externo/historico.js') }}"></script>
@endsection