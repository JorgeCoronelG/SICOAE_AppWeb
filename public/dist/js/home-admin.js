$.get('/estudiante/count', function(data){
    $('#estudiantes').html(data.estudiantes);
});

$.get('/vigilante/count', function(data){
    $('#vigilantes').html(data.vigilantes);
});

$.get('/grupo/count', function(data){
    $('#grupos').html(data.grupos);
});

$.get('/registro/day/assistance', function(data){
    $('#asistencia').html(data.asistencia+'%');
    $('#porcentaje').css('width', data.asistencia+'%');
});