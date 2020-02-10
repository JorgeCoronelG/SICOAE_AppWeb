@extends('admin.layout.layout')

@section('title', 'Estadística | Estudiantes')

@section('content')
<div class="row justify-content-center" id="div-tabla">
    <div class="table-responsive">
        <table id="tabla-estudiante" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Matrícula</th>
                    <th style="text-align:center;">Nombre completo</th>
                    <th style="text-align:center;">Escolaridad</th>
                    <th style="width: 15%; text-align:center;">Estadísticas</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="row d-none" id="div-detalle">
    <div class="col-8 text-left">
        <h3>Estudiante: <u><span id="estudiante"></span></u> <a href="{{ route('admin.estadistica.estudiante') }}"><i class="fa fa-times"></i></a></h3>
    </div>
    <div class="col-4 text-right">
        <h3>Escolaridad: <u><span id="escolaridad"></span></u></h3>
    </div>
    <div class="col-8 justify-content-center">
        <hr />
        <div class="table-responsive">
            <table id="tabla-registros" class="table table-bordered" cellspacing="0" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align:center;">Fecha</th>
                        <th style="text-align:center;">Entrada</th>
                        <th style="text-align:center;">Salida</th>
                    </tr>
                </thead>
                <tbody id="contenido-registros"></tbody>
            </table>
        </div>
    </div>
    <!-- Donut Chart -->
    <div class="col-4" id="chart">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gráfica de asistencia</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4">
                <canvas id="grafica"></canvas>
            </div>
        </div>
        <div class="card-footer">
            <span id="porcentaje"></span>
        </div>
    </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/estadistica/estudiante.js') }}"></script>
@endsection