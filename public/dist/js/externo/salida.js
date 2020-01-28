cargarTabla();

function cargarTabla(){
    var table = $('#tabla-externo').DataTable();
    table.destroy();

    $('#tabla-externo').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Personas",
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
            "url": "/externo/all/output",
            "type": "get",
            "dataSrc": ''
        },
        'columns':[
            {data: 'nombre'},
            {data: 'telefono'},
            {data: 'personas'},
            {data: 'hora_entrada'},
            {'orderable': true,
                render: function(data, type, row){
                    return '<button class="btn btn-outline-primary btn-circle" onclick="salida(\''+row.id+'\');"><i class="fa fa-check"></i></button>';
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

function salida(id){
    $.ajax({
        url: '/externo/output/'+id,
        method: 'get',
        dataType: 'json',
        beforeSend: function(){
            $('.btn').addClass('disabled');
        },
        success: function(data){
            cargarTabla();
            toastr.success('Salida registrada', '¡Éxito!')
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('externo')) toastr.error(errors['externo'][0], 'Error');
        },
        complete: function(){
            $('.btn').removeClass('disabled');
        }
    });
}