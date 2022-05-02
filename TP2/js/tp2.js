document.body.onload = function () {
    
    $('#lista_act').html('');
    $('#lista_act').html('<option selected="selected" disabled="disabled">Elija Actividad</option>');
    $.ajax({
        type: 'POST',
        url: 'http://localhost/PWA-2022/TP2/vista/accion/listar_actividad.php',
        success: function (data) {
            $('#lista_act').html($('#lista_act').html() + data);
        }
    });
}

$(function () {
    
    $('#lista_act').on('change', function () {
        $('#resultado_combo').html('');
        var id = $('#lista_act').val();
        var url = 'http://localhost/pwa-2022/TP2/vista/accion/cargar_beneficio.php';
        $('#lista_ben').html('<option selected="selected" disabled="disabled">Elija beneficio</option>');
        $.ajax({
            type: 'POST',
            url: url,
            data: 'id=' + id,
            success: function (data) {
                $('#lista_ben').html($('#lista_ben').html() + data);
            }
        });
        return false;
    });
     $('#lista_ben').on('change', function () {
         console.log("entra");
         $('#resultado_combo').html('');
         $('#resultado_combo').html($('#resultado_combo').html() + 
         'La actividad <strong>' + $("#lista_act option:selected").text() + '</strong>'
          + ' beneficia la/s: <strong>' + $("#lista_ben option:selected").text() + '</strong>');
        });
});






