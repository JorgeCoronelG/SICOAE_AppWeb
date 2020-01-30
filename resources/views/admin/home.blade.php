@extends('admin.layout.layout')

@section('title', 'Inicio | Administrador')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inicio</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Estudiantes</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="estudiantes"></span></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vigilantes</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="vigilantes"></span></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-id-badge fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Grupos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="grupos"></span></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Asistencia de hoy</div>
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><span id="asistencia"></span></div>
                    </div>
                    <div class="col">
                    <div class="progress progress-sm mr-2">
                        <div id="porcentaje" class="progress-bar bg-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/home-admin.js') }}"></script>
@endsection