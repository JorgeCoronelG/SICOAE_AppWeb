@extends('admin.layout.layout')

@section('title', 'Estadística | Grupos')

@section('content')
<div class="row justify-content-center" id="div-tabla">
    <div class="col-6">
        <div class="table-responsive">
            <table id="tabla-grupo" class="table table-bordered" cellspacing="0" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align:center;">Grupo</th>
                        <th style="width: 15%; text-align:center;">Estadísticas</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div class="row justify-content-center d-none" id="div-detalle">
    <!-- Donut Chart -->
    <div class="col-6" id="chart">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">Gráfica de asistencia</h6>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('admin.estadistica.grupo') }}"><i class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4">
                <canvas id="grafica"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Asistencias
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Inasistencias
                </span>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/estadistica/grupo.js') }}"></script>
@endsection