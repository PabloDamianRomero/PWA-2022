// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 1 - Combo Select Dinámico

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

// ------------------------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 2 - Tabs Dinámicos

$(function(){
    $('#tabs_dinamicas a').click(function(e){
        $('#tabs_dinamicas li').removeClass('on'); // remueve la clase 'on' a todos los elementos 'li' dentro de clase 'tabs_dinamicas'
        $(this).parent('li').addClass('on'); // this = elemento 'a'. Añade al padre 'li' la clase 'on'
        var page = this.hash.substr(1); // Eliminar simbolo '#' de la cadena
        // console.log(page);
        $.get(page+'.php', function(gotHtml){
            // console.log(html);
            $('#content').html(gotHtml);
        });
        // return false;
    });

    // La propiedad location.hash establece o devuelve la parte ancla de una URL, incluido el signo de almohadilla (#).
    if(location.hash){ // si existe la url de la pestaña
        $('a[href="'+ location.hash +'"]').click(); // click sobre el tab actual de la url
    }else{
        $('#tabs_dinamicas a:first').click();// click sobre el primer tab
    }
});

// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 3 - Modal Dinámico

$(function() {
    // Modal button click action
    $('.modal-button').click(function(e) {
         e.preventDefault();
         show_universal_modal($(this).attr('data-title'), $(this).attr('href'));
    });
});

function show_universal_modal($title, $link, $size = '') {
    // Checking if link is empty then return false
    if ($link == '') {
        alert("Content Link is null");
        return false;
    }
    $('#universal_modal').find('.modal-body').html("<center>Loading data. Please wait ...</center>");
    $('#universal_modal').find('.modal-title').html($title);
    $('#universal_modal').modal('show');

    // Fetching content via Ajax
    $.ajax({
        url: $link,
        error: err => {
            console.log(err);
            $('#universal_modal').find('.modal-body').html("<div class='alert alert-danger'>Error fetching content.</div>");
        },
        success: function(resp) {
            $('.modal-body').html('');
            var container = $('<div class="container-fluid">');
            container.html(resp);
            $('#universal_modal').find('.modal-body').html(container);
        }
    });
}



