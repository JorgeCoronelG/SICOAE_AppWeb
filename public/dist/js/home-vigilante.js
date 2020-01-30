$.get('/estudiante/count', function(data){
    $('#estudiantes').html(data.estudiantes);
});

$.get('/vigilante/count', function(data){
    $('#vigilantes').html(data.vigilantes);
});

$.get('/grado/count', function(data){
    $('#grados').html(data.grados);
});

$.get('/grupo/count', function(data){
    $('#grupos').html(data.grupos);
});