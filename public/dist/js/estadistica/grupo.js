$('#tabla-grupo').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Grupo",
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
        "url": "/grupo/all",
        "type": "get",
        "dataSrc": ''
    },
    'columns':[
        {data: 'grupo'},
        {'orderable': true,
            render: function(data, type, row){
                return '<button class="btn btn-outline-primary btn-circle" onclick="estadistica(\''+row.grupo+'\');"><i class="fa fa-chart-bar"></i></button>';
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

function estadistica(grupo){
    $.ajax({
        url: '/registro/group/all/'+grupo,
        type: 'get',
        dataType: 'json',
        beforeSend: function(){
            $('.btn').addClass('d-none');
        },
        success: function(data){
            cargarGrafico(data.asistencia, data.inasistencia);
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('grupo')) toastr.error(errors['grupo'][0], 'Error');
        },
        complete: function(){
            $('.btn').removeClass('d-none');
            $('#div-tabla').slideToggle(1000, function(){
                $('#div-detalle').removeClass('d-none');
            });
        }
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
        backgroundColor: ['#4e73df', '#e74a3b'],
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