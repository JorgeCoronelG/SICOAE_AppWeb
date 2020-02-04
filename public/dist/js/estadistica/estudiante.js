cargarEstudiantes();

function cargarEstudiantes(){
    var tabla = $('#tabla-estudiante').DataTable();
    tabla.destroy();
    $('#tabla-estudiante').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Estudiantes",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        'lengthMenu': [[5, 10, 15], [5, 10, 15]],
        'paging': true,
        'info': false,
        'filter': true,
        'stateSave': true,
        'ajax':{
            "url": "/estudiante/all",
            "type": "get",
            "dataSrc": ''
        },
        'columns':[
            {data: 'matricula'},
            {data: 'nombre'},
            {'orderable': true,
                render: function(data, type, row){
                    return row.grado+'° '+row.grupo;
                }
            },
            {'orderable': true,
                render: function(data, type, row){
                    return '<button class="btn btn-outline-primary btn-circle" onclick="estadistica(\''+row.matricula+'\');"><i class="fa fa-chart-bar"></i></button>';
                }
            }
        ],
        'columnDefs':[
            {
                'targets': '_all',
                'className': 'text-center'
            }
        ]
    });
}

function estadistica(matricula){
    $.ajax({
        url: '/registro/all/'+matricula,
        type: 'get',
        dataType: 'json',
        beforeSend: function(){
            $('.btn').addClass('d-none');
        },
        success: function(data){
            $('#estudiante').html(data.estudiante.nombre);
            $('#escolaridad').html(data.estudiante.grado+'° '+data.estudiante.grupo);
            tablaRegistros(data.registros);
            cargarGrafico(data.totalRegistros, (data.totalDias - data.totalRegistros));
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('estudiante')) toastr.error(errors['estudiante'][0], 'Error');
        },
        complete: function(){
            $('.btn').removeClass('d-none');
            $('#div-tabla').slideToggle(1000, function(){
                $('#div-detalle').removeClass('d-none');
            });
        }
    });
}

function tablaRegistros(registros){
    var content = '';
    $.each(registros, function(i, item){
        content += '<tr>';
        content += '<th style="text-align:center;">'+item.fecha+'</th>';
        content += '<th style="text-align:center;">'+item.hora_entrada+'</th>';
        content += '<th style="text-align:center;">'+item.hora_salida+'</th>';
        content += '</tr>';
    });
    $('#contenido-registros').html(content);

    $('#tabla-registros').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        'lengthMenu': [[5, 10, 15], [5, 10, 15]],
        'paging': true,
        'info': false,
        'filter': true,
        'stateSave': true,
        'columnDefs':[
            {
                'targets': '_all',
                'className': 'text-center'
            }
        ]
    });
}

function cargarGrafico(asistencias, inasistencias){
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("grafica");
    var grafica = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Asistencias", "Inasistencias"],
        datasets: [{
        data: [asistencias, inasistencias],//Datos a llenar
        backgroundColor: ['#4e73df', '#FF0000'],
        hoverBackgroundColor: ['#2e59d9', '#dd0000'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        },
        legend: {
        display: false
        },
        cutoutPercentage: 80,
    },
    });
}