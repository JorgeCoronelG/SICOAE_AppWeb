$('#tabla-externos').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Externos",
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
        "url": "/externo/all",
        "type": "get",
        "dataSrc": ''
    },
    'columns':[
        {data: 'nombre'},
        {data: 'telefono'},
        {data: 'fecha'},
        {'orderable': true,
            render: function(data, type, row){
                var output = row.hora_entrada;
                if(row.hora_salida != null){
                    output += ' a '+row.hora_salida;
                }
                return output;
            }
        },
        {data: 'personas'},
        {data: 'motivo'}
    ],
    'columnDefs':[
        {
            'targets': '_all',
            'className': 'text-center'
        }
    ]
});