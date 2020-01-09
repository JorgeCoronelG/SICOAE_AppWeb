@extends('vigilante.layout.layout')

@section('title', 'Salida | Externo')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-externo" class="table table-bordered" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Nombre completo</th>
                    <th style="text-align:center;">Teléfono</th>
                    <th style="text-align:center;">Entrada</th>
                    <th style="width: 15%; text-align:center;">Salida</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="text-align:center;">Omar Pérez Ramírez</th>
                    <th style="text-align:center;">4429374019</th>
                    <th style="text-align:center;">09:00 hrs.</th>
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
    <script src="{{ asset('dist/js/externo/salida.js') }}"></script>
@endsection